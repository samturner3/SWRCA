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
  <title> Example </title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <link href="css/bootstrap.css" rel="stylesheet">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
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
</div><br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
