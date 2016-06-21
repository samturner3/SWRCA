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
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 1800px}
    
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
<body>
<?php
	require 'includes/pagetop.php'; ?>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#">Search</a></p>
      <p><a href="#">Transfer</a></p>
    </div>
   </div>
  </div>
    <h1>Animal Profiles</h1>
    
        <div id="content">
        
        <div class="container-fluid text-center">    
 		<div class="row content">
        
        
        
        
        <div id="col_1" role="main">
            <h2>Currently in care of / has status of / all view</h2>
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
        
        
        <h3 style="margin:20px">Title 3</h3>

			
			<?php 
			$i = -1;
			foreach($animals as $row) {
			$i++;
		  	
			?>
			</div>
			<div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="<?php echo $row['animalPictureFile']; ?>" alt="" width="200px">
                    <div class="caption">
                        <h3><?php echo $row['animialSpecies']; ?></h3>
                        <h4><?php echo $row['animalType']; ?></h4>
                        <p><?php echo $row['animalDescription']; ?></p>
                        <h5><strong>Status: </strong><?php echo $row['animalStatus']; ?></h5>
                        <h5><strong>Animial ID: </strong><?php echo $row['animalID']; ?></h5>
                        <h5><strong>Capture ID: </strong><?php echo $row['captureID']; ?></h5>
                        <h5><strong>Injury ID: </strong><?php echo $row['injuryID']; ?></h5>
                        <p>
                            <a href="#" class="btn btn-primary">Go to full profile</a> <a href="#" class="btn btn-default">Report Transfer</a>
                        </p>
                    </div>
                </div>
            </div>
			
			<?php
		  	
			
			
			
			//foreach($row as $cell) {
			//	echo('<td>' . $cell . '</td>');
		  	//}

			} ?>            
	    
            </div>   
           <!-- Page Features -->
        </div>
        <!-- /.col -->
        </div>
        </div>
        </div> <!--end content-->
    
    
	</div>
</div>

<footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
