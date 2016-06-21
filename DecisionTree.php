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
	
$current = 'Decision Tree';
	require 'includes/pagetop.php'; ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Decision Tree</h1>      
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">  
</div>
  <div class="row content">
	<div class="col-sm-8 text-center col-lg-10" style="width:100%;"> 
      	<iframe width="100%" height="100%" frameborder="0" seamless src="http://zingtree.com/deploy/tree.php?tree_id=635889977&style=panels&persist_names=Restart&persist_node_ids=1">
		</iframe>
		<script type="text/javascript" src="js/iframeResizer.js"></script>
	 	<script type="text/javascript">iFrameResize();</script>
      	<hr>
    </div>
  </div>
  
<br>

<footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>