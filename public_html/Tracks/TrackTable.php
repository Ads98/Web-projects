<h3>Current Entries</h3>

<table border="2">
  <tr>
    <td>Track ID</td>
    <td>Track title</td>
	<td>Track Number</td>
	<td>Album</td>
    <td>Options</td>
  </tr>

  <?php
  include "../db.php";
  if (isset($_GET['Track']))
 {
	 $stmt = $conn->prepare("SELECT Tracks.TrackID, Tracks.TrackTitle, Tracks.TrackNum, CD.cdTitle
							FROM Tracks 
							INNER JOIN CD ON Tracks.cdID=CD.cdID WHERE Tracks.TrackTitle=?;");
	$stmt->bind_param('s', $_GET['Track']);
	$stmt->execute();
	$stmt->bind_result($TrackID, $TrackTitle, $TrackNum, $Album);
	 
	 
 }
 else
 {
	$stmt = $conn->prepare("SELECT Tracks.TrackID, Tracks.TrackTitle, Tracks.TrackNum, CD.cdTitle
							FROM Tracks
							INNER JOIN CD ON Tracks.cdID=CD.cdID;");
	$stmt->execute();
	$stmt->bind_result($TrackID, $TrackTitle, $TrackNum, $Album);
	
	
 }
  while ($stmt->fetch()) {
    echo "<tr>";
    echo "  <td>$TrackID</td>";
	echo "  <td>$TrackTitle</td>";
	echo "  <td>$TrackNum</td>";
	echo "  <td>$Album</td>";
    echo "  <td><a href=\"TrackData.php?delete=$TrackID\">delete</a> |   <a href=\"editTrack.php?edit=$TrackID\">edit</a> </td>";
    echo "</tr>\n";
  
}

?>


</table>
<a href="AddTrack.php">Add Track</a>