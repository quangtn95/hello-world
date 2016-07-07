$(function() {

	$("#password_error_message").hide();
	$("#passnew_error_message").hide();
	$("#retype_password_error_message").hide();

	var error_password = false;
	var error_retype_password = false;
	var error_passnew = false;


	$("#form_password").focusout(function() {

		check_password();
		
	});

	$("#form_passnew").focusout(function() {

		check_passnew();
		
	});

	$("#form_retype_password").focusout(function() {

		check_retype_password();
		
	});

	

	function check_password() {
	
		var password_length = $("#form_password").val().length;
		
		if(password_length == 0) {
			$("#password_error_message").html("Enter your current password");
			$("#password_error_message").show();
			error_password = true;
		} else {
			$("#password_error_message").hide();
		}
	
	}

	function check_passnew() {

		var passnew_length = $("#form_passnew").val().length;
		
		if(passnew_length < 8 ) {
			$("#passnew_error_message").html("At least 8 characters");
			$("#passnew_error_message").show();
			error_password = true;
		} else {
			$("#passnew_error_message").hide();
		}
	
	}

	function check_retype_password() {
	
		var password = $("#form_passnew").val();
		var retype_password = $("#form_retype_password").val();
		
		if(password !=  retype_password) {
			$("#retype_password_error_message").html("Passwords don't match");
			$("#retype_password_error_message").show();
			error_retype_password = true;
		} else {
			$("#retype_password_error_message").hide();
		}
	
	}

	

	$("#registration_form").submit(function() {
											
		error_password = false;
		error_retype_password = false;
		error_passnew = false;
											
		check_password();
		check_retype_password();
		check_passnew();
		
		if(error_password == false && error_retype_password == false && error_passnew == false) {
			return true;
		} else {
			return false;	
		}

	});

});