<?php
include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';


$db = db_connect();



if (isset($_POST['Animal_Type'], $_POST['Animal_Species'], $_POST['Animal_Description'], $_POST['Animal_status'] )) {

	echo 'allset!';
	//exit;
    // Sanitize and validate the data passed in and set them.
	$Animal_Type = filter_input(INPUT_POST, 'Animal_Type', FILTER_SANITIZE_STRING);
	$Animal_Species = filter_input(INPUT_POST, 'Animal_Species', FILTER_SANITIZE_STRING);
	
	$Animal_Description = filter_input(INPUT_POST, 'Animal_Description', FILTER_SANITIZE_STRING);
	$Animal_status = filter_input(INPUT_POST, 'Animal_status', FILTER_SANITIZE_STRING);
	









        // Insert the new user into the database SHOPPER
        $insertstmt = $db->prepare("INSERT INTO animal (animalType, animialSpecies, animalDescription, animalStatus)
  											VALUES(?, ?, ?, ?);");
  											
            
	    $insertstmt->bindParam(1, $Animal_Type);
        $insertstmt->bindParam(2, $Animal_Species);
        $insertstmt->bindParam(3, $Animal_Description);
        $insertstmt->bindParam(4, $Animal_status);

            
        $insertstmt->execute();

			
			//get shopper_id from newly created table.

		


	
     
	header('Location: /profile2.php');
}
?>