$(document).ready(function () {
<<<<<<< HEAD

	function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        
=======
  //function to create and set the options for the google map
	function geolocationSuccess(position) {
        //creates a new google map with users geolocation
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        //map options shown
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
        var myOptions = {
          zoom : 16,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP,
        };
<<<<<<< HEAD
        // Draw the map
=======
        // Draw the map to the div
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
        var mapObject = new google.maps.Map(document.getElementById("liveTrack"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
      
      }
<<<<<<< HEAD

=======
      //loading error handling
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

<<<<<<< HEAD
=======
      //gets the longatude and latitude of the users location
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
      function geolocateUser() {
        // If the browser supports the Geolocation API
        if (navigator.geolocation){
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }
<<<<<<< HEAD

=======
      //when the script loads get the users location
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
      window.onload = geolocateUser;
});