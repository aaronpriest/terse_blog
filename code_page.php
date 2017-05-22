<?php
/*
index_code.php
Contents:
* Code to retrieve post information from database
* Include of the details.inc page
*/
require_once("terse_classes.php");
/*Code to retrieve post poem*/
$poem=new TersePost();
$poem->get_poem($poem_id);
$poem->get_archives();

//$poem->provide_test_data();
?>
