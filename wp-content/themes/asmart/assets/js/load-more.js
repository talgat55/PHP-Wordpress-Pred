	jQuery(function($){

	//$('.list-load-more').append( '<a href="#" class="btn btn-link-insta load-more"><img src="<?php  echo get_theme_file_uri( '/assets/images/left-arrow.png' ) ?>"> Подписаться</a>' );
	var button = $('.load-more-news');
	var page = 2;
	var loading = false;
	$('body').on('click', '.load-more-news', function(e){
		e.preventDefault();
		if( ! loading ) {
			loading = true;
			var data = {
				action: 'be_ajax_load_more',
				page: page,
				query: 'post'
			}; 

			$('.load-more-news i').addClass(' rotating ');

			$.post(beloadmore.url, data, function(res) {
				 
				if( res.success) {
					if(res.data == ''){
                        button.hide();
						$('.block-load-more').append( '<p class="no-more-load-posts opacity-zero">Нет больше записей</p>' );
						$('.no-more-load-posts').addClass(' show-no-posts-load ');

						$('.no-more-load-posts').delay(2000).fadeOut();
					}else{
					$('.news-list').append( res.data );

					page ++;
					loading = false;
					$('.load-more-news i').removeClass('rotating');

                        $('.news-count').html(' ').html($('.news-item').length);
                    	var date =     $('.news-item').last().find('.date').html();
                    	var redydate = date.slice(0, 5);
                    	console.log(redydate);
                        $('.news-date-end').html(' ').html(redydate);

                    }
				} else {
					 console.log(res);
				}
			}).fail(function(xhr, textStatus, e) {
				// console.log(xhr.responseText);
			});
		}

	});
		
});