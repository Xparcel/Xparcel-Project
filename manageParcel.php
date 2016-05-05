<html>
   <head>
      <?php
        //load the php to handle the users table contents
        include "php/loadPackages.php";
        //Session start included in loadPackages.php
      ?> 
<<<<<<< HEAD

=======
      <title>Xparcel</title>
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
      <!-- font awesome css  + Latest Bootstrap JS and CSS-->
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script type ="text/javascript" src="js/jsAdd.js"></script>
      <link rel="stylesheet" type="text/css" href="css/manageParcelCSS.css">
      <link href="css/jquery-ui.min.css" rel="stylesheet">
      <script src="js/jquery-ui.min.js"></script>
      <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXuYRxUQIzziPIRh6N6Fij_r3POQqTcQk
        &libraries=visualization&callback=initMap"></script>
      <script type="text/javascript" src="js/jsGoogleMap.js"></script>

   </head>
   <body>
      <!-- Nav -->
        <nav id='testDialog'class="navbar navbar-default navbar-fixed-top">
          <div class="navbar-header">
          <img  id = "logo200" src='img/xparcelLogo200px.png' alt=''>
          <label id="userName"><strong>Hello </strong> <?php echo $_SESSION['firstName']?> </label>
          
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="userProfile.php"><a href="userProfile.php">Profile</a></li>
              <li><a href="php/logout.php">Log out</a></li>
            </ul>
          </div>
       </nav>
       
       <!-- Container / Table and contents display -->
        <div id="table" class = 'container'>
            <ul>
             <li><a href="#packages" title="Manage your packages here">Packages</a></li>
             <li><a href="#liveTrack" title="track your package here">Live Tracking</a></li>
            </ul>
            <div id ="packages" class='table-responsive'>
        
              <!-- Table Titles -->        
<<<<<<< HEAD
              <table class='table'>
=======
              <table  class='table'>
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
                      <thead>  
                      <tr>
                      <th>DeliveryDate</th>
                      <th>Status</th>
                      <th>TrackingNumber</th>
                    </tr>
                  </thead>
              
                  <!-- Table Contents -->   
<<<<<<< HEAD
                <tbody>
=======
                <tbody id = 'tableBody'>
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
                  <tr>
                  
                   <?php  
                      //called from the loadPackages.php
                      getProfileID();
                   ?>
                
                  </tr>
               </tbody> 
              </table>  

              <div  id='addForm'>  
                <div id='addFormHeader'>
                  <h4>Enter a tracking number below</h4>
                </div>
                <div id='addFormBody'>
                  <form >
                    <input id='yesBtn' type="image" class="yesNoBtn" src="img/y-button.png">
                  </form> 

                </div>
              </div>
<<<<<<< HEAD
=======
              <!-- Success messge if package is found-->
              <div id="PackSuccess" class="alert alert-success fade in">
                <a href="#"  class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Your Package has been added
             </div>
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
             
             <!-- Buttons EDIT / UPDATE / DELETE -->
             <!-- EDIT  -->
              <div class="button">
                  <button href="JavaScript:void(0)" id='btnAdd' type="button" class="btn btn-success">Add</button>                      
                  <!-- UPDATE  -->
                  <button  id = "btnEdit"type="button" class="btn btn-info">Edit</button> 
                  
                  <!-- DELETE -->
                  <button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger">Delete</button>
              </div>
             </div>

         <div id="liveTrack">
         </div> 
        </div>
<<<<<<< HEAD

=======
        <?php
          echo $_SESSION['$profileID'];
        ?>
        
>>>>>>> 8f8ff44f8d8c7070ecb27194f8f0d9689bc3c722
        <!-- Modal for collecting tracking data-->
        <div id ="Cdialog" title ="Check for Packages">
          <form class="form-horizontal" method="post">
            <div class="form-group form-group-sm">
              <p>Please enter the tracking number linked to the package you wish to add</p>
              <input class="form-control" type="text" id="trackingNum" placeholder="Enter your tracking number here ">
            </div>
          </form>  
        </div>
   </body>
</html>