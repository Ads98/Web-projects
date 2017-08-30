<?php
include "../header.php";

include "../db.php";
include "TrackFormEdit.php";
require_once "../Albumvalidation.php";
$output_message = "";
$err = "";
$fail = "";

$Title = "";
$Number=0;
if (isset($_POST['Title']) && isset($_POST['Number'])){
    
    $Title =  sterlise($_POST['Title']);
    $Number = sterlise($_POST['Number']);

    $fail  = validate_TrackTitle($Title);
    $fail .= validate_Number($Number);
    if ($fail == ""){
    $sq = "UPDATE Tracks set TrackTitle=?, TrackNum=? WHERE TrackID =?";
    $stmt = $conn->prepare($sq);
    $stmt->bind_param('sii', $Title, $Number, $_GET['edit']);
    $stmt->execute();
	header('Location: Tracks.php');
  }
  
   else {
        $output_message = ""; 
        $err = "PHP validation failed, try again";
      
        echo "<tr><td> <p> $fail </p> </td></tr> ";}



}
echo "<hr />";
/*
Fucntion sterlise($input)
{
	return htmlentities($input);
}
*/

//include "TrackFormEdit.php";
include "TrackTable.php";
include "../footer.php";
