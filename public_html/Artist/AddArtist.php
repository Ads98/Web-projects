<?php
include "../header.php";

include "../db.php";
include "AddForm.php";
// add the message to the database if it exists
if (isset($_POST['name'])) {
  $name = $_POST['name'];
  if (strlen($name) < 3) {
    echo "<p>Error the name is too short.</p>";
  } 
	else {
	$str1=htmlentities($name);
    $q = "INSERT INTO Artist (artName) VALUES (?)";
    $stmt = $conn->prepare($q);
    $stmt->bind_param('s', $str1);
    $stmt->execute();
	header('Location: artist.php');
  }

}
echo "<hr>";

include "displayTable.php";
include "../footer.php";