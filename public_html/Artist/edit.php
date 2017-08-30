<?php
include "../header.php";

include "../db.php";
include "AddForm.php";
//include "AddForm.php";
//edit
if (isset($_POST['name'])) {
  $forename = $_POST['name'];

  if (strlen($forename) < 3) {
    echo "Your name is too short.";
  } 
	else {
	$str1=htmlentities($forename);
    $sq = "UPDATE Artist set artName=? WHERE artID=?";
	echo "<p>here</p>";
    $stmt = $conn->prepare($sq);
    $stmt->bind_param('si', $str1,$_GET['edit']);
    $stmt->execute();
	header('Location: artist.php');
  }

}
echo "<hr/>";
//include "AddForm.php";
include "displayTable.php";
include "../footer.php";
