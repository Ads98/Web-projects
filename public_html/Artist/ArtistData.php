<?php
include "../header.php";

include "../db.php";


// delete an artist
if (isset($_GET['delete'])) 
{
  echo "<p>deleting</p>";
  $stmt = $conn->prepare("DELETE FROM Artist WHERE artID=?");
  $stmt->bind_param('i', $_GET['delete']);
  $stmt->execute();
  header('Location: artist.php');
}
  
include "displayTable.php";
include "AddForm.php";
include "../footer.php";


