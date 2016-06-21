



<?php


include_once 'includes/db_connect_PDO.php';
include_once 'includes/functions2.php';


$db = db_connect();


if (isset($_FILES['myFile'])) {
    
     
    $filename = $_FILES["myFile"]["name"];

	$file_ext = substr($filename, strripos($filename, '.')); // get file name
    
    $temp = explode(".", $_FILES["myFile"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
   
    $path = './images/testAnimals/' . $newfilename;
    // Example:
   
    move_uploaded_file($_FILES['myFile']['tmp_name'], $path);
    
   
    $insert_stmt = $db->prepare("update animal set animalPictureFile = './images/testAnimals/'  WHERE animalID='11'");
  											
  										
            $insert_stmt->bindParam(1, $path);
	  
	  ////$insert_stmt->bindParam(1, $path);

     
        $insert_stmt->execute();
        

    
    echo 'successful';
   
    
}
?>