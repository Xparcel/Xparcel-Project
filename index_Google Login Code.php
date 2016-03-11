<?php

//*********************************defining*************************************

//this stores the google client credentails and the vender path location for updates
require_once __DIR__.'/gplus_lib/vendor/autoload.php';
const CLIENT_ID = '782605975680-81lcv2pm6voi6hk7andb7fig4ksqmi5h.apps.googleusercontent.com';
const CLIENT_SECRET = 's7DMIT8sKXEtrvVxEZS5tVFy';
const REDIRECT_URI = 'http://localhost/Xparcel_GoogleSignin/index.php';

session_start();
//****************************Initialization******************************
//Application client details and authenication
$client = new Google_Client();

//
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);


//*********************Actual process**********************************

//checking  for logout action
if(isset($_REQUEST['logout'])){
	session_unset();
}
//check for google URL written from the Google server
else if(isset($_GET['code'])){
	$client->authenticate($_GET['code']);
	//get the access token
	$_SESSION['access_token'] = $client->getAccessToken();

	$redirect = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	header('location:'.filter_var($redirect,FILTER_SANITIZE_URL));

}

if(isset($_SESSION['access_token']) && $_SESSION['access_token']){
	$client->setAccessToken($_SESSION['access_token']);
	$me = $plus->people->get('me');

    //stores all the available variables provided by the google+ account
	$id = $me['id'];
	$name = $me['displayName'];
	$email = $me['emails'][0]['value'];
	$profile_image_url = $me['image']['url'];
	$cover_image_url = $me['cover']['coverphoto']['url'];
	$profile_url = $me['url'];

}
else{
	$authUrl=$client->createAuthUrl();
}

?>

<div>
	<?php
		//if the auth account is not set go back to the sign in button.
		if(isset($authUrl)){
			echo "<a class = 'login' href = '".$authUrl."'><img src='gplus_lib/signin_button.png' height = '50px'/>";
		}else{
			//else print the users details
			print "ID: {$id} <br>";
			print "Name: {$name} <br>";
            print "Email: {$email} <br>";
            print "Image: {$profile_image_url} <br>";
            print "Cover:  {$cover_image_url} <br>";
            print "Url: {$profile_url} <br><br>";

            echo "<a class = 'logout' href = '?logout'><button>Logout</button></a>";
		}
		?>
</div>