<?php
include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';


$db = db_connect();

sec_session_start();

if (login_check($db) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
//print_r($stmt);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sydney Wildlife</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
  
  <script type="text/JavaScript" src="js/sha512.js"></script>
  <script type="text/JavaScript" src="js/forms.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    
    html {
    position: relative;
    min-height: 100%;
}
body {
    margin: 0 0 150px; /* bottom = footer height */
    background: #a6db70;
}
footer {
    position: absolute;
    left: 0;
    bottom: 0;
    height: 150px;
    width: 100%;
}
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    

  
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #a6db70;
      height: 100%;
      
    }
    
   
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    
    
     
    

     
  
  
    
  </style>
</head>
<body>
<?php
	require 'includes/pagetop.php'; ?>
	
	 
	
<div class="container">
    <div class="row">
        <div class="span6 center">
            <h1>New Animal form</h1>
            <form method = "post" action="newanimal.php"
                <div class="form-group"><br>
   
    <input type="text" class="form-control" name="Animal_Type" id="Animal_Type" placeholder="Animal Type">
  </div>
  <div class="form-group">
   
    <input type="text" class="form-control" name="Animal_Species" id="Animal_Species" placeholder="Animal Species">
  </div>
  <div class="form-group">
   
    <input type="text" class="form-control" name="Animal_Description" id="Animal_Description" placeholder="Animal Description">
  </div>
  <div class="form-group">
   
    <input type="text" class="form-control" name="Animal_status" id="Animal_status" placeholder="Animal_status">
  </div>
  
 
  <button  type="submit" class="btn btn-default">Submit</button> 
            </form>
        </div>
    </div>
</div>


<footer class="container-fluid text-center">
  
  <?php include 'includes/footer.php'; ?>
  
</footer>

</body>
</html>