$(document).ready(function(){
    $('.posts-click').click(function(){
        $('.posts-child').slideToggle();
        $('.fa-chevron-down').toggleClass('active');
    });

    $('.search').on('keydown', function(e) {
        if(e.keyCode == 13){
          
          $('.search_btn').trigger('click');
          return false;
        }
      });
});

$(document).ready(function() {
	var showChar = 100;
	var ellipsestext = "...";
	$('.more').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span>';

			$(this).html(html);
		}

	});
});

// AJAX

$(document).ready(function(){

	$('.submit-glossary').click(function(e){
		var title = $('#glossary_title').val();
		var text = $('#glossary_text').val();
	
		e.preventDefault();

		$.ajax ({
				headers: {
					'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
				},

				url: "/admin/add_glossary",
				type : 'POST',
				data: {title:title , text:text},

				success: function(data)
				{

					console.log(data);
					var html ="";
					html += data ;
					$('.amas').prepend(html);

					Swal.fire({
						position: 'top-end',
						type: 'success',
						title: 'Your work has been saved',
						showConfirmButton: false,
						timer: 1500,
					})

					$('.swal2-popup').css('font-size','0.5rem');
					  
				},

				error: function()
				{
					console.log('nope');
				}
			});
	});
});