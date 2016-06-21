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
  
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>eForm</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Date</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Species</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="animalAge">Animal Age</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="animalAge-0">
      <input type="radio" name="animalAge" id="animalAge-0" value="Baby" checked="checked">
      Baby
    </label> 
    <label class="radio-inline" for="animalAge-1">
      <input type="radio" name="animalAge" id="animalAge-1" value="Juv">
      Juv
    </label> 
    <label class="radio-inline" for="animalAge-2">
      <input type="radio" name="animalAge" id="animalAge-2" value="Adult">
      Adult
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Size</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="cm / mm " class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="callerName">Caller's name</label>  
  <div class="col-md-4">
  <input id="callerName" name="callerName" type="text" placeholder="Name of Caller" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Address Line 1" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address2"></label>  
  <div class="col-md-4">
  <input id="address2" name="address2" type="text" placeholder="Address Line 2" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="suburb">Suburb</label>  
  <div class="col-md-4">
  <input id="suburb" name="suburb" type="text" placeholder="" class="form-control input-md" required="">
    
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
  <input id="phone" name="phone" type="text" placeholder="(Mobile)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="homePhone"></label>  
  <div class="col-md-4">
  <input id="homePhone" name="homePhone" type="text" placeholder="(Home)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="workPhone"></label>  
  <div class="col-md-4">
  <input id="workPhone" name="workPhone" type="text" placeholder="(Work)" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="locationFound">Location Found (if different to above)</label>  
  <div class="col-md-5">
  <input id="locationFound" name="locationFound" type="text" placeholder="Full Address" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="callerTakeToVet">Caller will take to vet?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="callerTakeToVet-0">
      <input type="radio" name="callerTakeToVet" id="callerTakeToVet-0" value="Y" checked="checked">
      Yes
    </label> 
    <label class="radio-inline" for="callerTakeToVet-1">
      <input type="radio" name="callerTakeToVet" id="callerTakeToVet-1" value="N">
      No
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vet">Vet</label>  
  <div class="col-md-4">
  <input id="vet" name="vet" type="text" placeholder="Vet Name" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vetPh"></label>  
  <div class="col-md-4">
  <input id="vetPh" name="vetPh" type="text" placeholder="Vet Phone" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="enquiryOnly"></label>  
  <div class="col-md-4">
  <input id="enquiryOnly" name="enquiryOnly" type="text" placeholder="Vet enquiry only?" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="vetReferred"></label>  
  <div class="col-md-4">
  <input id="vetReferred" name="vetReferred" type="text" placeholder="Referred to" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="other">Injuries or other circumstances:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="other" name="other"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="referal">How did the caller hear of SWS?</label>  
  <div class="col-md-4">
  <input id="referal" name="referal" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuer">Rescuer:</label>  
  <div class="col-md-4">
  <input id="rescuer" name="rescuer" type="text" placeholder="Name of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuerPh"></label>  
  <div class="col-md-4">
  <input id="rescuerPh" name="rescuerPh" type="text" placeholder="Phone of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="rescuerID"></label>  
  <div class="col-md-4">
  <input id="rescuerID" name="rescuerID" type="text" placeholder="ID of Rescuer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="vetName">Vet:</label>  
  <div class="col-md-4">
  <input id="vetName" name="vetName" type="text" placeholder="Name of Vet" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="vetName"></label>  
  <div class="col-md-4">
  <input id="vetPh" name="vetPh" type="text" placeholder="Phone of Vet" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerName">Carer:</label>  
  <div class="col-md-4">
  <input id="carerName" name="carerName" type="text" placeholder="Name of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerPh"></label>  
  <div class="col-md-4">
  <input id="carerPh" name="carerPh" type="text" placeholder="Phone of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="carerID"></label>  
  <div class="col-md-4">
  <input id="carerID" name="carerID" type="text" placeholder="ID of carer" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="fate">Fate</label>  
  <div class="col-md-4">
  <input id="fate" name="fate" type="text" placeholder="Fate of animal" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="dateToday">Today's Date</label>  
  <div class="col-md-4">
  <input id="dateToday" name="dateToday" type="text" placeholder="DD/MM/YYYY" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>  
  <div class="col-md-4">
  <input id="submit" name="submit" type="submit" value="Submit" class="form-control input-md" required="">
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
