<?php
include "../db_rc.inc";
//echo $_POST['postID'];

$postbody=stripslashes($_POST['fulltext']);
$postbody = str_replace("(great)", "<", $postbody);
$postbody = str_replace("(less)", ">", $postbody);
$postbody = str_replace("(fwdslash)", "/", $postbody);

$HTMLHEAD="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'><html xmlns='http://www.w3.org/1999/xhtml'><head><title>Terse. A quick word with you...</title><meta http-equiv='content-type' content='text/html;charset=utf-8' /></head><body>";
$HTMLBODY="<span class='title'>".$_POST['title']."</span>"."<span class='date'>"." - ".$_POST['date']."</span>"."<br/>"."<span class='postbodytext'>".$postbody."</span>";
$HTMLFOOT="</body></html>";

echo $HTMLHEAD."<p>Here is what your post will looklike:</p>".$HTMLBODY.$HTMLFOOT;
$content = $HTMLHEAD.$HTMLBODY.$HTMLFOOT;
$filename=$_POST['postID'].".html";
//Remove "Test" above when done
$file_handle = fopen($filename, 'w') or die("Cannot open file.");
fwrite($file_handle, $content);
fclose($file_handle);
//Add File name to DB
$mysqli = new mysqli("$mysql_host", "$mysql_user", "$mysql_password", "$mysql_database");

/* check connection */
if (mysqli_connect_errno()) {
    echo "Connect failed: \n".mysqli_connect_error();
    exit();
}
//Clear out any other posts marked as current
$query_update = "UPDATE post SET current_post=FALSE";
if(!$mysqli->query($query_update))	echo "Update query failed.";
//Insert post and set it as current
$query = "INSERT INTO post (title, date, postID, current_post, sysdate) VALUES('{$_POST['title']}', '{$_POST['date']}', '{$_POST['postID']}', TRUE, CURRENT_TIMESTAMP)";
if(!$mysqli->query($query))	echo "Insert into post query failed.";
/* $mainURL was added for when the entire site URL is needed. Is  defined in db_rc.inc*/
	$link = $mainURL ."/main.php?postID={$_POST['postID']}";
$query_feeds = "INSERT INTO feeds (title, description, link, date) VALUES('{$_POST['title']}', '{$_POST['pd']}', '{$link}', CURDATE())";
if(!$mysqli->query($query_feeds))	echo "Insert into feeds query failed.";

/* close connection */
$mysqli->close();


?>
