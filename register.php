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
 
  <?php include_once 'includes/HeadScrips.php';?>
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
<body>
    <div class="row content">
<?php
$current = 'Register';
	require 'includes/pagetop.php'; ?>

<div class="container-fluid text-center">    
  <div class="row content">
    
    <h1>Admin Add User</h1>
         <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <div id="error">
        <?php
		//Value Missing Errors
		if (!empty($error_MissingValues_array)) {
			echo "<div class=\"isa_error\">";
			echo "<i class=\"fa fa-times-circle\"></i>";
			echo " Please ensure you provide all fields. The following values are missing: <br>";
			foreach ($error_MissingValues_array as $name => $error) {
				echo $name . '<br>';
				//print $error;
			};
			echo "</div>";
		}
		
		//Normal Errors
		else if (!empty($error_array)) {
			echo "<div class=\"isa_error\">";
			
			foreach ($error_array as $error) {
				echo "<i class=\"fa fa-times-circle\"></i>";
				echo " Error: ". $error . "<br>";
				//print $error;
			};
			echo "</div>";
		}
		
		//Warning Message
		if (!empty($warning_msg)) {
			echo "<div class=\"isa_warning\">";
				echo "<i class=\"fa fa-warning\"></i>";
				echo $warning_msg ;
				//print $error;
			echo "</div>";
		}
		
		
		?>
        </div>
        <div id="regContent">
        <div id="regInstruction">
        
        <ul>
            <li>Usernames must contain only letters, numbers and underscores (no spaces), and be between 3 and 16 characters long.</li>
            <li>Emails must have a valid email format</li>
            
            <li>Passwords must be at least 6 characters and maximum of 20.</li>
            
            <li>Your password and confirmation must match exactly</li>
        </ul>
        
                     
        </div>
        <div id="regBox">
        
        <form id="myform" action="includes/register_new.php" 
                method="post" 
                name="registration_form"
             	>
                
            First Name: <input type="text" name="fname" id="fname" size="35" <?php if (isset($_POST['fname'])) echo 'value="'.$_POST['fname'].'"';?>/><br>
            Last Name: <input type="text" name="lname" id="lname" size="35" <?php if (isset($_POST['lname'])) echo 'value="'.$_POST['lname'].'"';?>/><br><br>
            
            Address: <br>
           
           Address line 1: <input type="text" name="addr1" id="addr1" size="35" <?php if (isset($_POST['addr1'])) echo 'value="'.$_POST['addr1'].'"';?>/><br>
           Address line 2: <input type="text" name="addr2" id="addr2" size="35" <?php if (isset($_POST['addr2'])) echo 'value="'.$_POST['addr2'].'"';?>/><br>
            Surburb/City: <input type="text" name="hcity" id="hcity" size="35" <?php if (isset($_POST['hcity'])) echo 'value="'.$_POST['hcity'].'"';?>/><br>
            State: <input type="text" name="hstate" id="hstate" size="35" <?php if (isset($_POST['hstate'])) echo 'value="'.$_POST['hstate'].'"';?>/><br>
            Country: <input type="text" name="hcountry" id="hcountry" size="35" <?php if (isset($_POST['hcountry'])) echo 'value="'.$_POST['hcountry'].'"';?>/><br>
                    Postcode: <input type="text" name="hcode" id="hcode" size="35" <?php if (isset($_POST['hcode'])) echo 'value="'.$_POST['hcode'].'"';?>/><br><br>
           
            
                
            Username: <input type='text' 
                name='username' 
                id='username' 
                size="35"
                <?php if (isset($_POST['username'])) echo 'value="'.$_POST['username'].'"';?>
                /><br>
                
            Email: <input type="email" name="email" id="email" size="35" <?php if (isset($_POST['email'])) echo 'value="'.$_POST['email'].'"';?>/><br><br>
            
           
            Password: <input type="password"
                             name="password" 
                             id="password" size="35"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" size="35"/><br><br>
            <input type="button" 
                   value="Register" 
                   onclick="return regformhash(this.form,
                   				   this.form.fname,
                                   this.form.lname,
                                   
                                   this.form.addr1,
                                   this.form.addr2,
                                   this.form.hcity,
                                   this.form.hstate,
                                   this.form.hcountry,
                                   this.form.hcode,
                                   
                                   
                                   
                                   this.form.username,
                                   this.form.email,
                                   
                                   
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
        </form>
        
     
        <script>
		
      		
  		<?php
		if (!empty($warning_msg)) { ?>	
			scrollAndShake();
        <?php } ?>
		
		
		$(document).ready(function(){
		
		
		$( "#myform" ).validate({
			errorClass: "my-error-class",
  			rules: {
			fname: {required: true, lettersonly: true},
			lname: {required: true, lettersonly: true},
			
			addr1: {required: true},
			addr2: {required: false},
			hcity: {required: true, lettersonly: true},
			hcode: {required: true, maxlength: 8, minlength: 3},
			/*ccard: {required: true, number: true, maxlength: 10, minlength: 10},*/
   			email: {required: true, email: true },
			username: {required: true},
			password: {required: true},
			confirmpwd: {required: true, equalTo: "#password"}
                   },
				   
			messages: {
			fname: {required: "Missing First Name", lettersonly: "Name can only contain letters"},
			lname: {required: "Missing Last Name", lettersonly: "Name can only contain letters"},
			
			addr1: {required: "Missing Address Line 1"},
			
			hcity: {required: "Missing City / Suburb Name", lettersonly: "May only contain letters"},
			hcode: {required: "Missing Postcode", maxlength: "Must under 9 characters", minlength: "Must be at least 3 characters"},
			/*ccard: {required: "Missing credit card number", number: "May only contain numbers", maxlength: "Must be 10 digits in length", minlength: "Must be 10 digits in length"},*/
   			email: {required: "Missing Email", email: "Incorrect email format" },
			username: {required: "Missing Username"},
			password: {required: "Missing Password"},
			confirmpwd: {equalTo: "Passwords Don't Match"}
                   },   
				   
			});
	});
	
		
	
		</script>
        </div>
        
        </div><br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer> 
       



</body>
</html>
