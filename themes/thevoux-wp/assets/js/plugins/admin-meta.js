jQuery(document).ready(function($){

	var importBtn = $('#import-demo-content');
	
	importBtn.on("click", function(e){
		e.preventDefault();
		var revImport = $('input#thb_revslider_import').prop('checked'),
				fetch_images = $('input#thb_fetch_images').prop('checked'),
				demo = $('input[name="option_tree[demo-select]"]:checked').val();

		
		importBtn.addClass('disabled').attr('disabled', 'disabled').unbind('click');
		
		jQuery.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'thb_import_ajax',
				'revslider' : revImport,
				'fetch_images' : fetch_images,
				'demo': demo
			},
			success: function(data){
				jQuery('#option-tree-header-wrap').before('<div id="message" class="updated below-h2"><p>Theme Options updated.</p></div>');
			},
			complete: function(){
				window.location.href=window.location.href;
			}
		});
	
	});
});