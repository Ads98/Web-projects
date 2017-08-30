<?php
include "../header.php";

include "../db.php";

// delete an album
if (isset($_GET['delete'])) 
{
  echo "<p>deleting</p>";
  $stmt = $conn->prepare("DELETE FROM CD WHERE cdID =?");
  $stmt->bind_param('i', $_GET['delete']);
  $stmt->execute();
  header('Location: Albums.php');
}
  
include "displayTable.php";
include "AddForm.php";
include "../footer.php";


