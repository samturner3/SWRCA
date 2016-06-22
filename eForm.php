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
$current = 'eform';
require 'includes/pagetop.php'; ?>

<div class="jumbotron">
  <div class="container text-center">
    <h1>eForm</h1>      
    <!--<h2>Currently in care of / has status of / all view</h2>-->
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <p>Enter info for rescue here.</p>
  <div class="row">
  
<form class="form-horizontal" action="send_post.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Animal Submission Form</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Date</label>  
  <div class="col-md-4">
  <input id="textinput" name="date" type="text" placeholder="DD/MM/YYYY" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Species</label>  
  <div class="col-md-4">
  <input id="textinput" name="species" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="animalAge">Animal Age</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="animalAge-0">
      <input type="radio" name="animal_age" id="animalAge-0" value="Baby" checked="checked">
      Baby
    </label> 
    <label class="radio-inline" for="animalAge-1">
      <input type="radio" name="animal_age" id="animalAge-1" value="Juv">
      Juv
    </label> 
    <label class="radio-inline" for="animalAge-2">
      <input type="radio" name="animal_age" id="animalAge-2" value="Adult">
      Adult
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Size</label>  
  <div class="col-md-4">
  <input id="textinput" name="size" type="text" placeholder="cm / mm " class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="callerName">Caller's name</label>  
  <div class="col-md-4">
  <input id="callerName" name="caller_name" type="text" placeholder="Name of Caller" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address_1" type="text" placeholder="Address Line 1" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address2"></label>  
  <div class="col-md-4">
  <input id="address2" name="address_2" type="text" placeholder="Address Line 2" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="suburb">Suburb</label>  
  <div class="col-md-4">
  <input id="suburb" name="suburb" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="UBD">UBD</label>  
  <div class="col-md-2">
  <input id="UBD" name="UBD" type="text" placeholder="UBD Ref" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone">Phone</label>  
  <div class="col-md-4">
  <input id="phone" name="phone_mob" type="text" placeholder="(Mobile)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="homePhone"></label>  
  <div class="col-md-4">
  <input id="homePhone" name="phone_home" type="text" placeholder="(Home)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="workPhone"></label>  
  <div class="col-md-4">
  <input id="workPhone" name="phone_work" type="text" placeholder="(Work)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="locationFound">Location Found (if different to above)</label>  
  <div class="col-md-5">
  <input id="locationFound" name="location" type="text" placeholder="Full Address" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="callerTakeToVet">Caller will take to vet?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="callerTakeToVet-0">
      <input type="radio" name="caller_to_vet" id="callerTakeToVet-0" value="Yes" checked="checked">
      Yes
    </label> 
    <label class="radio-inline" for="callerTakeToVet-1">
      <input type="radio" name="caller_to_vet" id="callerTakeToVet-1" value="No">
      No
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vet">Vet</label>  
  <div class="col-md-4">
  <input id="vet" name="vet_name" type="text" placeholder="Vet Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vetPh"></label>  
  <div class="col-md-4">
  <input id="vetPh" name="vet_phone" type="text" placeholder="Vet Phone" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="enquiryOnly"></label>  
  <div class="col-md-4">
  <input id="enquiryOnly" name="vet_enquiry" type="text" placeholder="Vet enquiry only?" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vetReferred"></label>  
  <div class="col-md-4">
  <input id="vetReferred" name="referral" type="text" placeholder="Referred to" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="other">Injuries or other circumstances:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="other" name="injuries"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="referal">How did the caller hear of SWS?</label>  
  <div class="col-md-4">
  <input id="referal" name="sws" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuer">Rescuer:</label>  
  <div class="col-md-4">
  <input id="rescuer" name="rescuer_name" type="text" placeholder="Name of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuerPh"></label>  
  <div class="col-md-4">
  <input id="rescuerPh" name="rescuer_phone" type="text" placeholder="Phone of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuerID"></label>  
  <div class="col-md-4">
  <input id="rescuerID" name="rescuer_id" type="text" placeholder="ID of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerName">Carer:</label>  
  <div class="col-md-4">
  <input id="carerName" name="carer_name" type="text" placeholder="Name of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerPh"></label>  
  <div class="col-md-4">
  <input id="carerPh" name="carer_phone" type="text" placeholder="Phone of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerID"></label>  
  <div class="col-md-4">
  <input id="carerID" name="carer_id" type="text" placeholder="ID of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="fate">Fate</label>  
  <div class="col-md-4">
  <input id="fate" name="fate" type="text" placeholder="Fate of animal" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>  
  <div class="col-md-4">
  <input id="submit" name="submit" type="submit" value="Submit" class="form-control input-md">
  </div>
</div>







</fieldset>
</form>

   </div>
</div><br>

<!-- Footer -->
       <footer class="container-fluid text-center">
  <?php include 'includes/footer.php'; ?>
</footer>

</body>
</html>
