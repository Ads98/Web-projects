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

  $query  = "SELECT * FROM CD where cdTitle = $forename";
  //echo $query;
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $stmt->bind_result($cdID ,$forename);
  $stmt->fetch();
  
  $obj = [$cdID,$forename];
 
  $obj_j = json_encode($obj);
  echo $obj_j;
  
  $stmt->close(); 
  $conn->close();
?>



