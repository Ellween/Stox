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

	// View GLossary
	$('.view_glossary').click(function(){
		var id = $(this).attr('id');
		$.ajax ({
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			},

			url: "/admin/show_glossary/" + id,
			type : 'GET',

			success: function(data)
			{
				$('.glossary_header').text(data.title);
				$('.glossary_body').text(data.text)
				
			},

			error: function()
			{
				console.log('nope');
			}
		});
	});

	// Edit Glossary
	$('.edit_glossary').click(function(){
		var id= $(this).attr("id");
		$(this).parent().parent().parent().attr('data-id',id);
		
	});

	$('.edit_submit-glossary').click(function(){
		var title = $('#edit_glossary_title').val();
		var text = $('#edit_glossary_text').val();
		var id = $('.amas').attr('data-id');	
		console.log(id);
		$.ajax ({
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			},

			url: "/admin/update_glossary/" + id,
			type : 'POST',
			data: {title:title , text:text},

			success: function(data)
			{
				var text = data.text;
				var sub = text.substr(0,80);
				$('.edit_glossary').parent().parent().parent().find("tr[table-id = " + id + "]").find('.glossary_title').text(data.title);	
				$('.edit_glossary').parent().parent().parent().find("tr[table-id = " + id + "]").find('.glossary_text').text(sub + "...");	
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


	// Delte Glossary

	$('#ViewModal').on('hidden.bs.modal', function (e) {
		$('.card-header h5').text("");
		$('.card-body p').text("");
	  });

	  $('#exampleModal').on('hidden.bs.modal', function (e) {
		$('form input,textarea').val("");
	  });

	  $('#EditModal').on('hidden.bs.modal', function (e) {
		$('form input,textarea').val("");
	  });


	  $('.fa-trash').click(function(){
		$(this).next().trigger('click');
	  });

});