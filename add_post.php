<?php
/*Step 1: the new post will be put in a directory named the same as the title.
Check to see that "title" was in the paramters and only create the dir if it is.*/
if(isset($_GET["title"])){
  $new_post_title=$_GET["title"]=$_GET["title"];
  //Replace any spaces with dashes, set the path
  $new_post_title=str_replace(" ", "-", $new_post_title);
  $new_dir_path="Posts\\".$new_post_title;
  if(!file_exists($new_dir_path)) {
    mkdir($new_dir_path, 0755);
    //if it can make the new path provide the user wtih that new link for testing
    echo "<a href=\"{$new_dir_path}\">{$new_dir_path}</a>";

    /*Step 2: copy the small files we need for the new post*/
    copy("default_template.php", $new_dir_path."\default.php");
    copy("page_code_template.php", $new_dir_path."\page_code.php");
    copy("post_details_template.inc", $new_dir_path."\post_details.inc");

    /*Step 3: append the details file with the poem ID*/
    $details_file_hndl = fopen($new_dir_path."\post_details.inc", "a") or die("Unable to open the Post Details file!");
    $poem_id='Ermagherd:Errkerves';
    $dets = "<?php \$poem_id='{$poem_id}';?>";
    fwrite($details_file_hndl, $dets);
    fclose($details_file_hndl);
  }
  else echo "Warning: Directory called {$new_post_title} already exists. No new directory created.";
}
else echo "No title provided.";
?>
