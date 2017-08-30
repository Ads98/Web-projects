<html>
<body>
<h1>Home</h1>
<br>
<?php
include "navbarMain.php";
echo "<hr>";
echo"<h3>Database overview</h3>";
include 'db.php'; // database connection
$sqll = "SELECT COUNT(*) FROM Artist";
$sql2 = "SELECT COUNT(*) FROM CD";
$sql3=  "SELECT COUNT(*) FROM Tracks";
//$sql3 = "SELECT * FROM Tracks";
$stmt = $conn->prepare($sqll);
$stmt->execute();
$stmt->bind_result($numl);
echo '<ul>';
while ($stmt->fetch()) {
echo '<li> Number of Artists: ' .htmlentities($numl). '</li>';
}
echo '<br>';
$stmt = $conn->prepare($sql2);
$stmt->execute();
$stmt->bind_result($num2);
while ($stmt->fetch()) {
echo '<li> Number of Albums: ' .htmlentities($num2). "</li>";
}
echo '<br>';
$stmt = $conn->prepare($sql3);
$stmt->execute();
$stmt->bind_result($num3);
while ($stmt->fetch()) {
echo '<li> Number of Tracks: ' .htmlentities($num3). '</li>';
echo "<br>";
}
echo '</ul>';
?>
<hr>