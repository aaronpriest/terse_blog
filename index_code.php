<?php
/*index_code.php
logical statements
and variable assignments for index pages
*/
$title="ThePoemsTitle";
$written_date=date("F j, Y");
//Just for fun. Feel free to delete it
$post_content="";
for($line=0; $line<15; $line++)
{
    $post_content=$post_content."<p>Line {$line}.</p>";
}
$taglist='city, urban, weariness, Spring';
$poem_id=date('mdY').'-1';
$poem_status='C';
$archive_list= array("Cats - 5/5/17", "Dogs - 4/26/17", "Hats - 4/2/17");
$linkset="";
for($a=0; $a<sizeof($archive_list); $a++){
    $linkset= $linkset."<a href=\"#\">{$archive_list[$a]}</a>";
}

?>
