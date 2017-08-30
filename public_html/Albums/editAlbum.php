<?php
include "../header.php";

include "../db.php";
include "AlbumFormEdit.php";
require_once "../Albumvalidation.php";
$output_message = "";
$err = "";
$fail = "";

$Title = $Genre = "";
$Price=0;
if (isset($_POST['Title']) && isset($_POST['Genre']) && isset($_POST['price'])){
    
    $Title = sterlise($_POST['Title']);
    $Genre = sterlise($_POST['Genre']);
    $Price = sterlise($_POST['price']);

    $fail  = validate_Title($Title);
    $fail .= validate_Genre($Genre);
    $fail .= validate_Price($Price);

    if ($fail == ""){
    $sq = "UPDATE CD set cdTitle=?, cdGenre=?,cdPrice=? WHERE cdID =?";
    $stmt = $conn->prepare($sq);
    $stmt->bind_param('ssdi', $Title, $Genre, $Price, $_GET['edit']);
    $stmt->execute();
	header('Location: Albums.php');
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

//include "AlbumFormEdit.php";
include "AlbumTable.php";
include "../footer.php";
