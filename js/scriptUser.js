$(function() {

	$("#name_error_message").hide();
	$("#pass_error_message").hide();
	$("#email_error_message").hide();
	$("#username_error_message").hide();

	var error_name = false;
	var error_pass = false;
	var error_email = false;
	var error_username = false;
		

	$("#form_name").focusout(function() {

		check_name();
	});

	$("#form_username").focusout(function() {

		check_username();
	});

	$("#form_pass").focusout(function() {

		check_pass();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});

	function check_name() {
	
		var name_length = $("#form_name").val().length;
		
		if(name_length == 0) {
			$("#name_error_message").html("Enter your name");
			$("#name_error_message").show();
			error_name = true;
		} else {
			$("#name_error_message").hide();
		}
	
	}

	function check_username() {
	
		var username_length = $("#form_username").val().length;
		
		if(username_length < 6 || username_length > 20) {
			$("#username_error_message").html("Should be between 6-20 characters");
			$("#username_error_message").show();
			error_username = true;
		} else {
			$("#username_error_message").hide();
		}
	
	}

	function check_pass() {
	
		var pass_length = $("#form_pass").val().length;
		
		if(pass_length < 8) {
			$("#pass_error_message").html("At least 8 characters");
			$("#pass_error_message").show();
			error_pass = true;
		} else {
			$("#pass_error_message").hide();
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
		error_pass = false;
		error_email = false;
		error_username = false;
											
		check_name();
		check_pass();
		check_email();
		check_username();
		
		if(error_name == false && error_pass == false && error_email == false && error_username == false) {
			return true;
		} else {
			return false;	
		}

	});

});