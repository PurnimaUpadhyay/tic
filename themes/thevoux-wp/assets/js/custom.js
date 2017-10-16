jQuery(function ($) {
        $(".grid").masonry({
            itemSelector: ".grid-item",
            columnWidth: ".grid-item",
            percentPosition: !0,
            
        });
    });


if (jQuery('.popup-gallery').length) {


	jQuery(function ($){


		var $gallery = $('.popup-gallery a').simpleLightbox();
		 // $('body').css({'position':'fixed', 'width':'100%'});
		
		$gallery.on('show.simplelightbox', function(){
			console.log('Requested for showing');
			 $('body').css({'position':'fixed', 'width':'100%'});
		})
		.on('shown.simplelightbox', function(){
			console.log('Shown');
			 $('body').css({'position':'fixed', 'width':'100%'});
		})
		.on('close.simplelightbox', function(){
			console.log('Requested for closing');
			 $('body').css({'position':'static'});
		})
		.on('closed.simplelightbox', function(){
			console.log('Closed');
			$('body').css({'position':'static'});
		})
		.on('change.simplelightbox', function(){
			console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			console.log('No image found, go to the next/prev');
			console.log(e);
		});
	});



}

