
$(function() {

	$("#image_error_message").hide();
	$("#name_error_message").hide();
	$("#date_error_message").hide();
	$("#address_error_message").hide();
	$("#job_error_message").hide();
	$("#phone_error_message").hide();
	$("#email_error_message").hide();

	var error_image = false;
	var error_name = false;
	var error_date = false;
	var error_address = false;
	var error_job = false;
	var error_phone = false;
	var error_email = false;
		

	$("#form_image").focusout(function() {

		check_image();
	});

	$("#form_name").focusout(function() {

		check_name();
	});

	$("#form_date").focusout(function() {

		check_date();
	});

	$("#form_address").focusout(function() {

		check_address();
	});

	$("#form_job").focusout(function() {

		check_job();
	});

	$("#form_phone").focusout(function() {

		check_phone();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});


	function check_image() {
	
		var image_length = $("#form_image").val().length;
		
		if(image_length == 0) {
			$("#image_error_message").html("Please choose file");
			$("#image_error_message").show();
			error_image = true;
		} else {
			$("#image_error_message").hide();
		}
	
	}

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

	function check_date() {
	
		var date_length = $("#form_date").val().length;
		
		if(date_length == 0) {
			$("#date_error_message").html("Enter your birthday");
			$("#date_error_message").show();
			error_date = true;
		} else {
			$("#date_error_message").hide();
		}
	
	}

	function check_address() {
	
		var address_length = $("#form_address").val().length;
		
		if(address_length == 0) {
			$("#address_error_message").html("Enter your address");
			$("#address_error_message").show();
			error_address = true;
		} else {
			$("#address_error_message").hide();
		}
	
	}

	function check_job() {
	
		var job_length = $("#form_job").val().length;
		
		if(job_length == 0) {
			$("#job_error_message").html("Enter your job title");
			$("#job_error_message").show();
			error_job = true;
		} else {
			$("#job_error_message").hide();
		}
	
	}

	function check_phone() {
	
		var phone_length = $("#form_phone").val().length;
		
		if(phone_length < 10 || phone_length > 11) {
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
		
		error_image = false;									
		error_name = false;
		error_date = false;
		error_address = false;
		error_job = false;
		error_phone = false;
		error_email = false;
						
		check_image();									
		check_name();
		check_date();
		check_address();
		check_job();
		check_phone();
		check_email();
		
		if(error_image == false && error_name == false && error_date == false &&  error_address == false && error_job == false && error_phone == false && error_email == false) {
			return true;
		} else {
			return false;	
		}

	});

});