$(document).ready(function () {
    $('input[name="phone"]').keyup(function (e) {
      if (/[^0-9 +]/g.test(this.value)) {
        // Filter non-digits from input value.
        this.value = this.value.replace(/[^0-9 +]/g, '');
      }
    });

    
    var input = $("input[name='phone']"),
        errorMsg = $(".error-msg"),
        validMsg = $(".valid-msg"); // here, the index maps to the error code returned from getValidationError - see readme
  
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
  
    var reset = function reset() {
      input.removeClass("error");
      errorMsg.html('');
      /*errorMsg.addClass("d-none");
      validMsg.addClass("d-none");*/
    }; // on keyup / change flag: reset
  
  
    

    input.on('change keyup input', reset);
    var phone_input = document.querySelector("#phone");
  
    if (phone_input) {
      intlTelInput(phone_input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        autoPlaceholder: "off",
        utilsScript: 'detect.js',
        separateDialCode: true,
        // dropdownContainer: "body",
        // excludeCountries: ["us"],
        formatOnDisplay: false,
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              success(countryCode);
            });
          },
        // hiddenInput: "full_number",
        initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/15.1.2/js/utils.js"
      });
    }
  

    $('.hamburger').click(()=> {
        $('.hamburger').toggleClass("is-active");
    });


    
    //   Glossary Search System

    $('#search').on('keyup',function(){
      console.log($(this).val());
      var word = $(this).val();

      $.ajax ({
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
  
        url: "/search",
        type : 'POST',
        data: {word:word},
  
        success: function(data)
        {

          console.log(data);

          if(data.length > 0)
          {
            var html="";

            for(let i = 0; i< data.length; i++)
            {
              html +=  
              `
              <div class="single-item">
                <h4>`+ data[i].title +`</h4>
                <p>- ` + data[i].text + ` </p>
              </div>
  
              `;
  
              $('.glossary_items').html(html);
            }
          } else {
            $('.glossary-detail').css({'width':'100%', 'overflow':'hidden'});
            $('.glossary_items').html("Item Not Found").css({'width': '1163px', 'font-weight': 500 , 'font-size': '36px', 'color': '#02033D;' });
          }
          

          console.log(html);
        },
  
        error: function()
        {
          console.log('nope');
        }
      });

    });

    $('.sign-up-p').click(function(){
      $('.log-in-p').removeClass('active');
      $('.login-form').removeClass('active');
      $(this).addClass('active');
      $('.sing-up-block').addClass('active');
    });

    $('.log-in-p').click(function(){
      $('.sing-up-block').removeClass('active');
      $('.sign-up-p').removeClass('active');
      $(this).addClass('active');
      $('.login-form').addClass('active');
    });


    $("#myform").validate({
      rules: {
        // no quoting necessary
        name: "required",
        // quoting necessary!
        last_name: "required",
        email: "required",
        phone: "required",
        country: "required",
        password: "required",
        password_confirm :{
          equalTo: "#password"
        }
      }
    });



    $('.login-in-form').on('submit',function(e){
      e.preventDefault();
      var email = $('#email').val();
      var pass = $('#password').val(); 

      $.ajax ({
        headers: {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
  
        url: $(this).attr('action'),
        type : 'POST',
        data: {email:email, password:pass },
  
        success: function(data)
        {
          top.location.href = '/dashboard';

         console.log(data.message);
        },
  
        error: function()
        {
          $('.invalid').text("Email or Password is incorrect");
          $('.invalid-text').css('display','flex');
          console.log('Data was invalid');
        }
      });
    });
      
  });


  