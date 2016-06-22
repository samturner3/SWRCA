<?php
include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';


$db = db_connect();

sec_session_start();

if (login_check($db) == true) {
    $logged = 'in';
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sydney Wildlife</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
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
    /*background: #a6db70;*/
}
footer {
      background-color: #f2f2f2;
      padding: 25px;
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
   /*   background-color: #a6db70;*/
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
$current = 'contacts';
require 'includes/pagetop.php'; ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Contact</h1>      
    <!--<h2>Currently in care of / has status of / all view</h2>-->
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <p>Contact Info.</p>
  <div class="row">
  
<a href="url">Wild Apricot </a><br>
<a href="url">Batchgeo</a><br>
<br>
<br>
<p>Mailing Address: PO Box 78, Lindfield NSW 2070<br>
Email: info@sydneywildlife.org.au<br>
Phone: (02) 9413 4300<br>
Fax: (02) 9413 4399</p>

   </div>
</div>

<?php
} else {
    $logged = 'out';
	echo 'Please <a href="index.php">login</a> to access this page';
}
//print_r($stmt);
?>

<br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
