// Scroll
$(window).scroll(function(){
  	var sticky = $('#myheader'),
      scroll = $(window).scrollTop();

  	if (scroll >= 100) sticky.addClass('fixed-top');
  	else sticky.removeClass('fixed-top');
});

//Tooltip
jQuery(document).ready(function($) {
   $('[data-toggle="tooltip"]').tooltip();
});


//Login 
jQuery(document).ready(function($) {
	$('#js-login-form').on('submit', function(e) {
		e.preventDefault();

		$.ajax({
			url: BASE_URL+'/customlogin',
           	type: 'POST',
           	data: new FormData(this),
           	contentType: false,
           	cache: false,
           	processData:false,
           	success:function(response) {
           		
           		if(response.status == 'failed') {

           			$('#InputEmail1').addClass('border-danger');
           			$('#InputPassword1').addClass('border-danger');
           			$('.js-message').html(response.message);

           		} else window.location.href=BASE_URL+'/'+response.redirect;
           	}
		});
	});
});


//Search Property
jQuery(document).ready(function($) {
	$('#js-search-form').on('submit', function(e) {
		e.preventDefault();

		var offer = $('.js-search-offer:checked').val();
		var type = $('.js-search-type').val();
		var queue = $('.js-search-queue').val();

		var directory = BASE_URL+'/properties/'+offer;

		if(queue != '') {

			if(type != null) window.location.href = directory+'?type='+type+'&q='+queue;
			else window.location.href = directory+'?q='+queue;

		} else if(type != null) {

		 	window.location.href = directory+'?type='+type;

		} else window.location.href = directory;
	});
});



// Agent Lead
jQuery(document).ready(function($) {
	$('.js-hidden-1').hide();
	$('.js-hidden-0').show();
	$('.js-is_teamlead').on('click', function() {

		$('.js-teamlead_id').val('');

		if($(this).is(":checked")) {

			$('.js-teamlead-row').hide();
			$('.js-teamlead_id').val('');

        } else if($(this).is(":not(:checked)")) $('.js-teamlead-row').show();
	});

});


jQuery(document).ready(function($) {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.file-upload-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    $(".file-upload-btn").on('click', function() {
       $(".file-upload").click();
    });
});

// Sudmenu sidebar
jQuery(document).ready(function($) {

   $('.nav-mailer').on('click', function() {
      $('.subm-mailer').toggle();
   });
   
   $('.nav-restore').on('click', function() {
      $('.subm-restore').toggle();
   });

});

// date range
jQuery(document).ready(function($) {
	$(".form_datetime").datetimepicker({
		  format: "MM dd, yyyy",
      autoclose: true,
      minView: 2, 
      pickTime: false
  });
}); 
