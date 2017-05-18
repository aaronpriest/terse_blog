<?php
/*page_code_template.php
Copied to any new dir as code for posts*/
require("post_details.inc");

require("../../terse_classes.php");
/*Code to retrieve post poem*/
$post_to_display = new TersePost('A');
$post_to_display->provide_test_data();
$archive_retrieval =new TerseArchives('A');
$archive_retrieval->provide_archive_data();
/*End retrieve process*/

?>
