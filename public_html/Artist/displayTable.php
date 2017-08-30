<h3>Current Artist's</h3>

<table border="2">
  <tr>
    <td>Artist ID</td>
    <td>Artits name</td>
    <td>Options</td>
  </tr>

  <?php
  include "../db.php";
 if (isset($_GET['Art']))
 {
	 $stmt = $conn->prepare("SELECT artID, artName FROM Artist WHERE artName=?");
	 $stmt->bind_param('s', $_GET['Art']);
	$stmt->execute();
	//$stmt->bind_result($artId, $name);
	$stmt->bind_result($artId, $name);
 }
 else
 {
 	$stmt = $conn->prepare("SELECT artID, artName FROM Artist");
	$stmt->execute();
	$stmt->bind_result($artId, $name);
 }
  while ($stmt->fetch()) {
    echo "<tr>";
    echo "  <td>$artId</td>";
	echo "  <td>$name</td>";
    echo "  <td><a href=\"ArtistData.php?delete=$artId\">delete</a> |   <a href=\"edit.php?edit=$artId\">edit</a> </td>";
    echo "</tr>\n";
}

?>


</table>

<a href="AddArtist.php">Add Artist</a>