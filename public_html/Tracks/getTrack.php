<?php 
  //require_once 'login.php';
  include "../db.php";
  if (isset($_GET['forename']))
    $forename =  $_GET['forename'];
  
  if (isset($_POST['forename']))
    $forename =  $_POST['forename'];
  
  
  //$forename = "Jon";
  //$surname = "Garibaldi";

  $forename = "\"". $forename. "\"" ; 

   //$forename = " \"Jon\" ";
   //$surname = " \"Garibaldi\" ";
  
  //$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  //print_r($conn);
 // if ($conn->connect_error){ 
   //   die($conn->connect_error);}

  $query  = "SELECT * FROM Tracks where TrackTitle = $forename";
  //echo $query;
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $stmt->bind_result($TrackID ,$forename);
  $stmt->fetch();
  
  $obj = [$TrackIDID,$forename];
 
  $obj_j = json_encode($obj);
  echo $obj_j;
  
  $stmt->close(); 
  $conn->close();
?>



