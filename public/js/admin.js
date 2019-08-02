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