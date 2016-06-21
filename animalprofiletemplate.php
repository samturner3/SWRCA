<?php
include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';

//$id = 1;
$id= $_GET['id'];

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
  <title> Example Profile </title>
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
$current = 'none';
require 'includes/pagetop.php'; ?>
<?php
        if ($stmt = $db->prepare("SELECT *
									from animal_desc WHERE Animal_ID_PF=?
		")) {
		$stmt->bindParam(1,$id);
        $stmt->execute();    // Execute the prepared query.

        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	
	 if ($stmt = $db->prepare("SELECT *
									from DatPoints WHERE AnimalFK=?
		")) {
		$stmt->bindParam(1,$id);
        $stmt->execute();    // Execute the prepared query.

        $datapoints = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	
?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Animal Profile</h1>      
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <div class="row">
  
    
      
      <?php 
			$i = -1;
			foreach($animals as $row) {
			$i++;
		  	
			?>
            
     <div class="col-sm-3 center-block">
      <p><strong>Initial Animal Picture</strong></p>
      <img src=<?php echo $row['animalPictureFile_PF']; ?> class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-8 text-left col-lg-10"> 
      <p><b>Animal Species: </b> <?php echo $row['Species_PF']; ?></p>
      <p><b>Animal Species ID: </b> <?php echo $row['Species_ID_PF']; ?></p>
      <p><b>Current Size (Forearm Length if bat): </b><?php echo $row['Current_size']; ?></p>
      <p><b>Current Weight: </b><?php echo $row['Current_weight']; ?></p>
      <p><b>Address Found: </b><?php echo $row['Address_found']; ?></p>
      <p><b>Time Found: </b><?php echo $row['Time_found']; ?></p>
      <p><b>Date Found: </b><?php echo $row['Date_found']; ?></p>
    </div>

      
      
      	<?php } ?> 

<?php if($id == 1 || $id == 8) : ?>
          <div class="col-sm-8 text-left col-lg-10"> 
            <img src='includes/batplotweight.php' class="img-responsive">
            <br></br>
            <img src='includes/batplotsize.php' class="img-responsive">
    </div>
<?php endif; ?>


      
   
   
   
   
   </div>
</div><br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
