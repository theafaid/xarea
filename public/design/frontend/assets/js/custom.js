$(function(){
	// meke header background is equal to browser height . 
   $('#header').css({ 'height': $(window).height() });
   $(window).on('resize', function() {

        $('header').css({ 'height': $(window).height() });
        $('body').css({ 'width': $(window).width() })
   });
	// show change password form > profile page 
	$('.changePass').on('click', function(){
		$(this).addClass('hidden');
		$('.rm-changePass').show();
		$('#changePassForm').removeClass('hidden');
	});

	$('.rm-changePass').on('click', function(){
		$("#changePassForm").addClass('hidden');
		$(this).hide();
		$('.changePass').removeClass('hidden');
	});

	// add m2 after on space field searching 
	$('#search-space-field').focus(function(){
		$("#space-info").hide();
	});

	$('#search-space-field').blur(function(){
		$("#space-info").show();
	});

	$('#price-range').on('change', function(){
		console.log($(this).val());
	});
	
});