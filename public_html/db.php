<?php
// Provide more information if something is wrong with your code:
error_reporting(-1);
ini_set(
// Settings used to connect to the database:
$db_host = 'mysql.cs.nott.ac.uk';
$db_user = 'psyadst';
$db_pass = 'Sturgie55';
$db_name ='psyadst';
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_errno) echo "failed to connect to database";
?>