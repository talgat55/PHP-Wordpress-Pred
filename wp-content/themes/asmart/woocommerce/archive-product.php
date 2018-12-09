<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;


?>

<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked wc_print_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

    woocommerce_product_loop_start();

    global $query;
    $addparams = [];
    $addparams1 = [];


    if (!$_REQUEST['SET_PRICE_SORT']) {
        $_REQUEST['SET_PRICE_SORT'] = 'ASC';
    }
    if (!$_REQUEST['SET_BY_DATE']) {
        $_REQUEST['SET_BY_DATE'] = 'ASC';
    }
    if (!$_REQUEST['SET_BY_NAME']) {
        $_REQUEST['SET_BY_NAME'] = 'ASC';
    }



//    'orderby' => 'meta_value_num',
//    'meta_key' => '_price',
//    'order' => 'asc'
    $argArray = [];
    $tmpArray = [];
    if($_REQUEST['SET_BY_RAZMER']){
        $tmpArray = array(
            array(
                'taxonomy' => 'pa_size',
                'field' => 'slug',
                'terms' => $_REQUEST['SET_BY_BREND'],
                'operator' => 'AND',
            ),
        );
        array_push($argArray, $tmpArray);
    }
/*
        $tmpArray = array(
            array(
                'key'     => '_product_attributes',
                'value'   => $serialized_value,
                'compare' => 'LIKE',
            ),
        );*/

    if ($_REQUEST['SET_BY_BREND']) {
        $tmpArray =  array(
            'taxonomy' => 'product_tag',
            'field' => 'slug',
            'terms' => $_REQUEST['SET_BY_BREND'],
            'operator' => 'AND',
        );
        array_push($argArray, $tmpArray);
    }


    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;


    $args = [
        'post_type' => 'product',
        'post_status' => 'publish',
        'orderby' => array(
            'title' => $_REQUEST['SET_BY_NAME'], 'date' => $_REQUEST['SET_BY_DATE']
        ),
        'orderby' => 'meta_value_num',
        'order'   => $_REQUEST['SET_PRICE_SORT'],
        'meta_key'  => '_price',
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_tag',
                'field' => 'slug',
                'terms' => $_REQUEST['SET_BY_BREND'],
                'operator' => 'AND',
            ),
            array(
                'taxonomy' => 'pa_size',
                'field' => 'slug',
                'terms' => $_REQUEST['SET_BY_RAZMER'],
                'operator' => 'AND',
            ),

        ),
        'paged' => $paged
    ];

    $query = new WP_Query($args);
    echo '  <ul class="products">';
    while ($query->have_posts()) {
        $query->the_post();
        /**
         * Hook: woocommerce_shop_loop.
         *
         * @hooked WC_Structured_Data::generate_product_data() - 10
         */
        do_action('woocommerce_shop_loop');

        wc_get_template_part('content', 'product');
    }
    echo '</ul>';

    woocommerce_product_loop_end();

    if ($query->max_num_pages <= 1) {
        return;
    }
    $pages = '';
    $max = $query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 4; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = ' <i class="fas fa-long-arrow-alt-left"></i> Предыдущая страница ';
    $a['next_text'] = 'Следующая страница <i class="fas fa-long-arrow-alt-right"></i>'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="pagination">';
    //if ($total == 1 && $max > 1) $pages = '<div class="center-pagination">  ' . $current . '  <span>...</span> ' . $max . '</div>'."\r\n";
    echo $pages . paginate_links_custom($a);
    if ($max > 1) echo '</div>';

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    //do_action( 'woocommerce_after_shop_loop' );
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
