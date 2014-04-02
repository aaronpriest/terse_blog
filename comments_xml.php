<?php
header("Content-Type: text/xml; charset=ISO-8859-1");
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
include "db_rc.inc";

$mysqli = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database");

/* check connection */
if (mysqli_connect_errno()) {
    echo "Connect failed: \n".mysqli_connect_error();
    exit();
}

$query = "SELECT commenterName, commentText, commentDate, commentNum FROM comment WHERE postID='{$_GET['pid']}' ORDER BY commentnum ASC";
if(!$result = $mysqli->query($query))	echo "Query failed.";
//Build XML
echo "<comments>";

while($row = $result->fetch_array(MYSQLI_ASSOC)){
extract($row);

echo "<comment>";
	echo "<commenterName>{$commenterName}</commenterName>";
	echo "<commentText>{$commentText}</commentText>";
	echo "<commentDate>{$commentDate}</commentDate>";
	echo "<commentNum>{$commentNum}</commentNum>";
echo "</comment>";
			
}
echo "</comments>";	


/* close connection */
$mysqli->close();

?>