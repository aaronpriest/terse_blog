<?php
include "db_rc.inc";

$mysqli = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database");

/* check connection */
if (mysqli_connect_errno()) {
    echo "Connect failed: \n".mysqli_connect_error();
    exit();
}

$query = "SELECT postID, title, date, current_post FROM post ORDER BY sysdate DESC";
if(!$result = $mysqli->query($query))	echo "Query failed.";
$num_posts = $result->num_rows;
//Archive count
$i=0;
while($row = $result->fetch_array(MYSQLI_ASSOC)){
extract($row);
	if($current_post){ $current = "{$postID}.html"; $revised_date = $date;}
	else $archive [$i]= "<a class='postLink' id='{$postID}' href='./main.php?postID={$postID}'><b>{$title}</b><br/>{$date}</a><br/><br/>";
	$i++;
}

foreach($archive as $output){
	echo $output;
}
?>