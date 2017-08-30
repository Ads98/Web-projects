<?php 
  //require_once 'login.php';
  include "../db.php";
  
  $x = $_GET['s'];

  //$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  //if ($conn->connect_error) die($conn->connect_error);
  $query  = "SELECT cdTitle FROM CD WHERE cdTitle LIKE '$x%'";    
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $stmt->bind_result($name);
  
  $obj = array();
  $count = 0;
  while ($stmt->fetch()){
      $obj[$count] = $name;
      $count+=1;}
  
  $obj_j = json_encode($obj);
  echo $obj_j;

  $stmt->close(); 
  $conn->close();
?>



