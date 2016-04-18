<!DOCTYPE html>
<html>
   <head>
     <meta charset="UTF-8">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
      <!-- font awesome css -->
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="css/userProfile.css">
      <script src="userPhotoUpload.js"></script>

   </head>
   <body>
      <!-- Nav -->
      <nav class="navbar navbar-default navbar-fixed-top">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <li class="Home"><a href="index.html">Home</a></li>
               <li><a href="#registrationPage">Sign Up</a></li>
               <li><a href="#contactUs">Contact Us</a></li>
               <li><a href="#aboutUs">About Us</a></li>
            </ul>
         </div>
      </nav>
      <!-- Title -->
      <div class="title">
         <h1> User Profile </h1>
      </div>

      <!-- Intro / explanation -->
      <div class="intro">
         <h5>Welcome to your profile. Please check if your information is correct or press edit to change them.</h5>
      </div>
      <br>
      
      <!-- Personal Information -->
      <!-- Title -->
      <div class="panel-group" id="accordion">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h4 class="panel-title">
                  Personal Information
               </h4>
            </div>
            <div class="panel-body">
               <br>
               <!-- Photo -->
               <div class="userPhoto">
                  <img src="img/Blue.png" class="img-thumbnail" alt="User profile" width="150" height="180">  
               </div>
               
               <!-- Upload button -->
               <!-- Standar Form -->
               <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
                  <div class="form-inline">
                     <div id="chooseF" class="form-group">
                        <input type="file" name="files[]" id="js-upload-files" multiple>
                     </div>
                     <div id="uploadBtn">
                        <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                     </div>
                  </div>
               </form>
               <!-- Info label -->
               
               <?php
                
        
                try {
                    $host = 'localhost';
                    $dbname = 'xParcel';
                    $user = 'root';
                    $pass = 'root';
                    # MySQL with PDO_MYSQL
                    $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
                } catch(PDOException $e) {echo 'Error';}  
            
                
                $sql = "SELECT * FROM `User` ;";
        
               
                $sth = $DBH->prepare($sql);
                
                $profileId   = $_POST['ProfileID'];
                $userId      = $_POST['UserID'];
                $username    = $_POST['Username'];
                $email       = $_POST['Email'];
                $dob         = $_POST['DOB'];

                    
                $sth->bindParam( ':ProfileID', $profileId );
                $sth->bindParam( ':UserID', $userId );
                $sth->bindParam( ':Username', $username );
                $sth->bindParam( ':Email', $email );
                $sth->bindParam( ':DOB', $dob );
                
                $sth->execute();
            

                echo "<table id='page' class='table-bordered' >";
                
                echo"<tr><th>ProfileID</th><th>UserID</th><th>Username</th><th>Email</th><th>DOB</th></tr>";
        
                foreach ($sth as $row)
                {
                
                        echo " <tr class='tb'>
                                       
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>$row[4]</td>

                                </tr>  ";  
                                
                }
                   
                echo "</table> </br></br>";
            
            ?>
               
      <!-- Term and Conditions -->
      <div class="bottomText">
         <p>By saving your details here, you agree with our <a href="#" >Terms & Conditions.</a></p>
      </div>
      <!-- Button - Create account -->
      <div class="createBtn">
         <a href="#" class="btn btn-block btn-lg btn-info">Save my details</a>
      </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>    
   </body>
</html>