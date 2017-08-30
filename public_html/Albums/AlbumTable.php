<h3>Current Entries</h3>

<table border="2">
  <tr>
    <td>ID</td>
    <td>Title</td>
	<td>Price</td>
	<td>Genre</td>
	<td>No.Tracks</td>
    <td>Options</td>
  </tr>

  <?php
  include "../db.php";
  if (isset($_GET['Title']))
 {
	 $stmt = $conn->prepare("select CD.cdID,CD.cdTitle, CD.cdPrice, CD.cdGenre ,count(Tracks.cdID)  from  CD 
							left outer join  Tracks 
							on CD.cdID = Tracks.cdID WHERE cdTitle=?
							group by CD.cdID
							order by CD.cdID;");
	 $stmt->bind_param('s', $_GET['Title']);
	 $stmt->execute();
	//$stmt->bind_result($artId, $name);
	$stmt->bind_result($cdID, $cdTitle, $cdPrice, $cdGenre, $cdNumTracks);
	
 }
 else
 {
	$stmt = $conn->prepare("select CD.cdID,CD.cdTitle, CD.cdPrice, CD.cdGenre ,count(Tracks.cdID)  from  CD left outer join  Tracks
							on CD.cdID = Tracks.cdID
							group by CD.cdID
							order by CD.cdID;");
	$stmt->execute();
	$stmt->bind_result($cdID, $cdTitle, $cdPrice, $cdGenre, $cdNumTracks);
 }
  while ($stmt->fetch()) {
    echo "<tr>";
    echo "  <td>$cdID</td>";
	echo "  <td>$cdTitle</td>";
	echo "  <td>$cdPrice</td>";
	echo "  <td>$cdGenre</td>";
	echo "  <td>$cdNumTracks</td>";
    echo "  <td><a href=\"AlbumData.php?delete=$cdID\">delete</a> |   <a href=\"editAlbum.php?edit=$cdID\">edit</a> </td>";
    echo "</tr>\n";
  
}

?>


</table>
<a href="AddAlbum.php">Add Album</a>