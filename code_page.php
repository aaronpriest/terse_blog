<?php
/*
index_code.php
Contents:
* Code to retrieve post information from database
* Include of the details.inc page
*/
require_once("terse_classes.php");
/*Code to retrieve post poem*/
$post_to_display = new TersePost($poem_status);
$post_to_display->provide_test_data();
$archive_retrieval =new TerseArchives('A');
$archive_retrieval->provide_archive_data();
/*End retrieve process*/
?>
