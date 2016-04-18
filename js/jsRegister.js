/*
	Document is responsible for handeling the 'post' functions 
	to the regPost.php and the post.php page to log new users details
	weather they register via Google OAuth or direct registration.	
*/


$(document).ready(function () {

	//When the Create Account button is pressed
	$('#submitForm').click(function () {

		//alert("Button is working");

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

		}, function (data) {

			alert(data);

		}); //end callback

		

	}); //end click
	//handels the post for the google register page
	$('#glSubmitForm').click(function () {

		alert("Button is working");

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

		}, function (data) {

			alert(data);

		}); //end callback

		

	}); //end click

});
