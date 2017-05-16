<?php
$new_id=1;
if($new_post_title=$_GET["title"]){
    $new_post_title=str_replace(" ", "-", $new_post_title);
    $new_dir_path="Posts\\".$new_post_title;
    echo "<a href=\"{$new_dir_path}\">{$new_dir_path}</a>";
    if(!file_exists($new_dir_path)) {
        mkdir($new_dir_path, 0755);
        copy("index.php", $new_dir_path."\default.php");
        copy("page_code.php", $new_dir_path."\page_code.php");

    }
    else echo "Warning: Directory called {$new_post_title} already exists. No new directory created.";
}
else echo "No title provided.";
?>
