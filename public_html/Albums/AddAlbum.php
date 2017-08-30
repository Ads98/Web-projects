<?php
include "../header.php";

include "../db.php";
include "AlbumForm.php";
require_once "../Albumvalidation.php";
$output_message = "";
$err = "";
$fail = "";

$Title = $Genre= $Artist = "";
$Price=0;
if (isset($_POST['Title']) && isset($_POST['Genre']) && isset($_POST['price']) && isset($_POST['Art'])){
    
    $Title = sterlise($_POST['Title']);
    $Genre = sterlise($_POST['Genre']);
    $Price = sterlise($_POST['price']);
	$Artist =sterlise($_POST['Art']);

    $fail  = validate_Title($Title);
    $fail .= validate_Genre($Genre);
    $fail .= validate_Price($Price);
	$fail .= validate_Artist($Artist);

    if ($fail == ""){
    $q = "INSERT INTO CD (artID, cdTitle, cdGenre, cdPrice) VALUES
    ((SELECT artID from Artist WHERE artName = ?), ?, ?, ?)";
    $stmt = $conn->prepare($q);
    $stmt->bind_param('sssd', $Artist, $Title, $Genre, $Price);
    $stmt->execute();
	header('Location: Albums.php');
  }
  else {
        $output_message = ""; 
        $err = "PHP validation failed, try again";
      
        echo "<tr><td> <p> $fail </p> </td></tr> ";}

}
echo "<hr />";

//include "AlbumForm.php";
include "AlbumTable.php";
include "../footer.php";
	