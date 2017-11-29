<?php
$server = "localhost";
$username = "root";
$password = "";
$db="userinfo";
$conn = mysql_connect($server,$username,$password);

if (!$conn)
  {
    die('Could not connect: ' . mysql_error());
  }
mysql_select_db($db, $conn);
//echo "Connected successfully";
?>
