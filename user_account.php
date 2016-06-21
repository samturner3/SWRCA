<?php
include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';
sec_session_start();
$db = db_connect();

if (login_check($db) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

if(login_check($db) == true) {
        // Add your protected page content here!
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
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
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

<body class="no_col_2">
<div id="site">
<?php require 'includes/pagetop.php'; ?>

<?php
/* $siteroot points to the development folder.
   Reset it to an empty string when deploying the live site. */
//$siteroot = '/hanselandpetal';
//date_default_timezone_set('Australia/Sydney');
//print_r($_SESSION);
?>
    <div id="content">
        <div id="col_1" role="main">
            <h1>Your Account</h1>
           <?php
        if (login_check($db) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
						echo '<p>Your name is: ' . htmlentities($_SESSION['fname']) . ' ' . htmlentities($_SESSION['lname']) . '.</p>';
					
						echo '<p>Your Address is: ' . htmlentities($_SESSION['addr1']) . ', ' . htmlentities($_SESSION['addr2']) . ', ' . htmlentities($_SESSION['hcity']) . ', ' . htmlentities($_SESSION['hstate']) . '. ' . htmlentities($_SESSION['hcode']) . ', ' . htmlentities($_SESSION['hcountry']) . '</p>';
 //' . htmlentities($_SESSION['hnumber']) . '
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>
            </div>



</div>
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/scripts.js"></script>
<footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>
</body>
</html>
<?php
} else {
        echo 'You are not authorized to access this page, please login.';
}
?>
