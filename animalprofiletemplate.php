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

<?php
$_SESSION["id_session"] = $id;
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
$current = 'none';
require 'includes/pagetop.php'; ?>
<?php
        if ($stmt = $db->prepare("SELECT *
									from master_animal WHERE record_id=?
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
      <p><strong>Current Animal Picture</strong></p>
      <img src=<?php echo $row['animalPictureFile']; ?> class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-8 text-left col-lg-10"> 
      <p><b>Animal Species: </b> <?php echo $row['species']; ?></p>
      <p><b>Current Size mm (Forearm Length if bat): </b><?php echo $row['size']; ?></p>
      <p><b>Address Found: </b><?php echo $row['address_1']; ?></p>
      <p><b>Date Found: </b><?php echo $row['date']; ?></p>
      <p>
      <a href="imageDB" class="btn btn-default">Update Size</a>

    <h4><strong>Animal Image Upload (.JPG Only)</strong></h4>
    <form action="upload.php?id=<?php echo $row['record_id']; ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
    <br></br>

    </div>

      
      
      	<?php } ?> 

<?php if($row['species'] == 'Bat') : ?>
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
