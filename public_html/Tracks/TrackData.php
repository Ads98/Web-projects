<?php
include "../header.php";

include "../db.php";

// delete a track
if (isset($_GET['delete'])) 
{
  echo "<p>deleting</p>";
  $stmt = $conn->prepare("DELETE FROM Tracks WHERE TrackID =?");
  $stmt->bind_param('i', $_GET['delete']);
  $stmt->execute();
  header('Location: Tracks.php');
}
  
include "TrackTable.php";
include "TrackForm.php";
include "../footer.php";


