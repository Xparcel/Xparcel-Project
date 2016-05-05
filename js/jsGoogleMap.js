$(document).ready(function () {
  //function to create and set the options for the google map
	function geolocationSuccess(position) {
        //creates a new google map with users geolocation
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        //map options shown
        var myOptions = {
          zoom : 16,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP,
        };
        // Draw the map to the div
        var mapObject = new google.maps.Map(document.getElementById("liveTrack"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
      
      }
      //loading error handling
      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

      //gets the longatude and latitude of the users location
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
      //when the script loads get the users location
      window.onload = geolocateUser;
});