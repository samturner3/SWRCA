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
$current = 'Profiles';
require 'includes/pagetop.php'; ?>
<?php
		   ///Get All Profiles
		   //$shopper_id = $_SESSION['user_id'];
        if ($stmt = $db->prepare("SELECT *
									from animal
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
       	<img src="<?php echo $row['animalPictureFile']; ?>" alt="" height="200px" width="200px">
       
       <div class="caption">
                        <h3><?php echo $row['animialSpecies']; ?></h3>
                        <h4><?php echo $row['animalType']; ?></h4>
                        <p><?php echo $row['animalDescription']; ?></p>
                        <h5><strong>Status: </strong><?php echo $row['animalStatus']; ?></h5>
                        <h5><strong>Animial ID: </strong><?php echo $row['animalID']; ?></h5>
                        <h5><strong>Capture ID: </strong><?php echo $row['captureID']; ?></h5>
                        <h5><strong>Injury ID: </strong><?php echo $row['injuryID']; ?></h5>
                        <p>
                            <a href="animalprofiletemplate.php?id=<?php echo $row['animalID']; ?>" class="btn btn-primary">Go to full profile</a> <a href="imageDB.php" class="btn btn-default">Upload image</a>
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
