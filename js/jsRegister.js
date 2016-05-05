/*
	Document is responsible for handeling the 'post' functions 
	to the regPost.php and the post.php page to log new users details
	weather they register via Google OAuth or direct registration.	
*/


$(document).ready(function () {

	//When the Create Account button is pressed
<<<<<<< HEAD
	$('#submitForm').click(function () {

		//alert("Button is working");
=======
	$('#submitForm').click(function() {
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722

		$.post('/xparcel/php/regPost.php', {

			firstName 	: $('#FirstName').val(),
			lastName  	: $('#LastName').val(),
			mobileNum 	: $('#MobileNum').val(),
			DOB_Day   	: $('#DOB_Day').val(),
			DOB_Mon   	: $('#DOB_Mon').val(),
			DOB_Yr    	: $('#DOB_Yr').val(),

			prim_Street : $('#Prim_Street').val(),
			prim_City 	: $('#Prim_City').val(),
			prim_Count 	: $('#Prim_Count').val(),

			sec_Street  : $('#Sec_Street').val(),
			sec_City 	: $('#Sec_City').val(),
			sec_Count 	: $('#Sec_Count').val(),

			email 		: $('#email').val(),
			pwd 		: $('#pwd').val(),

			method 		: "test"

<<<<<<< HEAD
		}, function (data) {

			alert(data);

=======
		}, function() {
			window.location ="http://localhost/xparcel/manageParcel.php";
			
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
		}); //end callback

		

	}); //end click
<<<<<<< HEAD

	$('#glSubmitForm').click(function () {

		alert("Button is working");
=======
	//handels the post for the google register page
	$('#glSubmitForm').click(function() {
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722

		$.post('/xparcel/php/regPost.php', {

			firstName 	: $('#FirstName').val(),
			lastName  	: $('#LastName').val(),
			mobileNum 	: $('#MobileNum').val(),
			DOB_Day   	: $('#DOB_Day').val(),
			DOB_Mon   	: $('#DOB_Mon').val(),
			DOB_Yr    	: $('#DOB_Yr').val(),

			prim_Street : $('#Prim_Street').val(),
			prim_City 	: $('#Prim_City').val(),
			prim_Count 	: $('#Prim_Count').val(),

			sec_Street  : $('#Sec_Street').val(),
			sec_City 	: $('#Sec_City').val(),
			sec_Count 	: $('#Sec_Count').val(),

			method 		: "test1"

<<<<<<< HEAD
		}, function (data) {

			alert(data);

		}); //end callback

		

=======
		}, function() {
			
			window.location = "http://localhost/xparcel/manageParcel.php";
		}); //end callback

>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
	}); //end click

});
