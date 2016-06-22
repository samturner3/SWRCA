<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql = "INSERT INTO master_animal (`date`, `species`, `animal_age`, `size`, `caller_name`, `address_1`, `address_2`, `suburb`, `UBD`, `phone_mob`, `phone_home`, `phone_work`, `location`, `caller_to_vet`, `vet_name`, `vet_phone`, `vet_enquiry`, `referral`, `injuries`, `sws`, `rescuer_name`, `rescuer_phone`, `rescuer_id`, `carer_name`, `carer_phone`, `carer_id`, `fate`) 
 VALUES ('$_POST[date]', '$_POST[species]', '$_POST[animal_age]', '$_POST[size]', '$_POST[caller_name]', '$_POST[address_1]', '$_POST[address_2]', '$_POST[suburb]', '$_POST[UBD]', '$_POST[phone_mob]', '$_POST[phone_home]', '$_POST[phone_work]', '$_POST[location]', '$_POST[caller_to_vet]', '$_POST[vet_name]', '$_POST[vet_phone]', '$_POST[vet_enquiry]', '$_POST[referral]', '$_POST[injuries]', '$_POST[sws]', '$_POST[rescuer_name]', '$_POST[rescuer_phone]', '$_POST[rescuer_id]', '$_POST[carer_name]', '$_POST[carer_phone]', '$_POST[carer_id]', '$_POST[fate]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//header("Location: eForm.php");
?>