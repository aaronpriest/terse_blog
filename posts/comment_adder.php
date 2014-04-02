<?php
include "db_rc.inc";

date_default_timezone_set('America/Chicago');
$today=date("F j, Y @ g:i a");
function remove_escape_unwanted($string){
$string = str_replace('%', '', $string);
$string = str_replace('^', '', $string);
$string = str_replace('`', '', $string);
$string = str_replace('@', '&#64;', $string);
$string = str_replace('$', 'USD ', $string);
$string = str_replace('%', '', $string);
//$string = str_replace('#', ' no. ', $string);
$string = str_replace('+', '', $string);

$string = str_replace('/' , '//', $string);//forward slashes
$string = str_replace('\' , '/\', $string);//back slashes

$string = str_replace("'", "\'", $string);//single quotes
$string = str_replace('"', '\"', $string);//double quotes

$string = str_replace('<', ' is less than ', $string);//html tags
$string = str_replace('>', ' is greater than ', $string);//html tags






return $string;
}

$commenter_name = remove_escape_unwanted($_GET["commentername"]);//escape single quotes
$comment_text = remove_escape_unwanted($_GET["comment"]);
echo $commenter_name;
echo $comment_text;




$postID=$_GET["pid"];// Solves a scope issue with this variable "pid" is set via hidden input

$mysqli = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database");

/* check connection */
if (mysqli_connect_errno()) {
    echo "Connect failed: \n".mysqli_connect_error();
    exit();
}

$query_rows = "SELECT * FROM comment WHERE postID='{$postID}'";

if(!$result_rows=$mysqli->query($query_rows))	echo "SELECT query failed.";

$comment_num=$result_rows->num_rows + 1;
$query_insert = "INSERT INTO comment VALUES('{$postID}', '{$commenter_name}', '{$today}', {$comment_num},'{$comment_text}',NULL)";

if(!$mysqli->query($query_insert))	echo " INSERT query failed.";
/* close connection */
$mysqli->close();
echo $query_insert;
?>
