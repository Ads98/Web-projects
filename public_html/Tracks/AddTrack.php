<?php
include "../header.php";

include "../db.php";
include "TrackForm.php";
require_once "../Albumvalidation.php";
$output_message = "";
$err = "";
$fail = "";

$Title = $Album = "";
$Number=0;
if (isset($_POST['Title']) && isset($_POST['Number']) && isset($_POST['Album'])){
    
    $Title = sterlise($_POST['Title']);
    $Number = sterlise($_POST['Number']);
    $Album = sterlise($_POST['Album']);

    $fail  = validate_TrackTitle($Title);
    $fail .= validate_Number($Number);
    $fail .= validate_Title($Album);

    if ($fail == ""){
    $q = "INSERT INTO Tracks (cdID, TrackTitle, TrackNum) VALUES
    ((SELECT cdID from CD WHERE cdTitle = ?), ?, ?)";
    $stmt = $conn->prepare($q);
    $stmt->bind_param('ssi', $Album, $Title, $Number);
    $stmt->execute();
	header('Location: Tracks.php');
  }

   else {
        $output_message = ""; 
        $err = "PHP validation failed, try again";
      
        echo "<tr><td> <p> $fail </p> </td></tr> ";}

}
echo "<hr />";

//include "TrackForm.php";
include "TrackTable.php";
include "../footer.php";
	