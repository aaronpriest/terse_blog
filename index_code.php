<?php
/*
index_code.php
Contents:
* Code to retrieve post information from database
* Include of the details.inc page
*/

include "index_details.inc";

require "terse_classes.php";
/*Code to retrieve post poem*/
$post_to_display = new TersePost('C');
$post_to_display->provide_test_data();
/*End retrieve process*/
?>
