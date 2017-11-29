<?php
// connect to mysql server
$link = mysql_connect('localhost', 'root', '') or die('Not connected : ' . mysql_error());
// connect to database
$db_selected = mysql_select_db('userinfo', $link) or die ('Database error : ' . mysql_error());
// create the query
$id = filter_input(INPUT_GET, 'id');
$result = mysql_query("select * from eng_imgs where id ='$id'");

// If successful, fetch the row as an array and store the data from the "image" column into a variable.

if ($result) {
    if ($row = mysql_fetch_array($result)) {
       $img = $row["pic"];
    }
}

header("Content-type: image/jpeg");
echo "$img";

//echo "$pic";
?>