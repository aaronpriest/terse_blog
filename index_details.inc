<?php
$HTTP_S=isset($_SERVER['HTTPS']) ? "https" : "http" . "://";
$base_url=$HTTP_S."localhost:81/terse_builder/";
//Not test data. Index will always retrieve only the most current poem-post
$poem_status='C';
/*Get content for poem from $post_id in details page.*/
?>
