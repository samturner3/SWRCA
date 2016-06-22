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
$current = 'Profiles';
require 'includes/pagetop.php'; ?>
<?php
		   ///Get All Profiles
		   //$shopper_id = $_SESSION['user_id'];
        if ($stmt = $db->prepare("SELECT *
									from master_animal
		")) {
        //$stmt->bindParam(1, $shopper_id);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.

        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	
?>
<div class="jumbotron">
  <div class="container text-center">
    <h1>Animal Profiles</h1>      
    <h2>Currently in care of / has status of / all view</h2>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <p>All profiles below are pulled from a database, and will be sortable based on query etc.<br>We will also implement a list view etc.</p><br>
  <div class="row">
  
  
  
  
    
      
      <?php 
			$i = -1;
			foreach($animals as $row) {
			$i++;
		  	
			?>
      
      <div class="col-sm-6 col-md-4 col-lg-3 hero-feature">
       <div class="thumbnail">
       	
       
       <div class="caption">
                        <h3><?php echo $row['species']; ?></h3>
                        <h5><strong>Animial ID: </strong><?php echo $row['record_id']; ?></h5>
                        <h5><strong>Animal Age: </strong><?php echo $row['animal_age']; ?></h5>
                        <h5><strong>Carer: </strong><?php echo $row['carer_name']; ?></h5>
                        <h5><strong>Injury: </strong><?php echo $row['injuries']; ?></h5>
                        <p>
                            <a href="animalprofiletemplate.php?id=<?php echo $row['record_id']; ?>" class="btn btn-primary">Go to full profile</a> <a href="imageDB.php" class="btn btn-default">Upload image</a>
                        </p>
                    </div>
      </div>
    </div>
      
      
      
      	<?php } ?> 
      
  
   
   
   
   
   
   </div>
</div><br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
