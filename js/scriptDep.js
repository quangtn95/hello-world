$(function() {

	$("#name_error_message").hide();
	$("#phone_error_message").hide();
	$("#email_error_message").hide();

	var error_name = false;
	var error_phone = false;
	var error_email = false;
		

	$("#form_name").focusout(function() {

		check_name();
	});

	$("#form_phone").focusout(function() {

		check_phone();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});

	function check_name() {
	
		var name_length = $("#form_name").val().length;
		
		if(name_length < 5 || name_length > 20) {
			$("#name_error_message").html("Should be between 5-20 characters");
			$("#name_error_message").show();
			error_name = true;
		} else {
			$("#name_error_message").hide();
		}
	
	}

	function check_phone() {
	
		var phone_length = $("#form_phone").val().length;
		
		if(phone_length < 6 || phone_length > 11) {
			$("#phone_error_message").html("Invalid office phone");
			$("#phone_error_message").show();
			error_phone = true;
		} else {
			$("#phone_error_message").hide();
		}
	
	}

	function check_email() {

		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	
		if(pattern.test($("#form_email").val())) {
			$("#email_error_message").hide();
		} else {
			$("#email_error_message").html("Invalid email address");
			$("#email_error_message").show();
			error_email = true;
		}
	
	}

	$("#registration_form").submit(function() {
											
		error_name = false;
		error_phone = false;
		error_email = false;
											
		check_name();
		check_phone();
		check_email();
		
		if(error_name == false && error_phone == false && error_email == false) {
			return true;
		} else {
			return false;	
		}

	});

});