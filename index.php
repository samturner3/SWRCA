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
      /*background-color: #a6db70;*/
      height: 100%;
      
    }
    
   
    /* Set black background color, white text and some padding */
    footer {
      background-color: rgba(0, 0, 0, 0); ;
      color: white;
      padding: 15px;
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

$current = 'Home';

	require 'includes/pagetop.php'; ?>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="animalform.php">Animal form</a></p>
      <p><a href="#">Transfer</a></p>
    </div>

    <h1>Login</h1>

    <img src="images/Logo-HorozontalLarge.png" width="500" height="144" alt=""/>
<h1></h1>

    
    <div id="content">
    <div id="logonBox">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
		if (login_check($db) == false) {
        ?>
         <form action="includes/process_login.php" method="post" name="login_form">
            Email: <center><input type="text" name="email" size="35" /></center><br>
            
            Password: <center><input type="password"
                             name="password"
                             id="password"
                             size="35"/> <br></center> <br>

            <input type="button"
                   value="Login"
                   onclick="formhash(this.form, this.form.password);" />
        </form>
 		<br>
<?php }
        if (login_check($db) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='#'>register</a></p>";
						echo '<a href="#">Forgot Password?</a>';
                }
?>
</div>
</div>
    
    
</div>
</div>

<footer class="container-fluid text-center">
  
  <?php include 'includes/footer.php'; ?>
  
</footer>

</body>
</html>
