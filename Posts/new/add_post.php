<?php
require("../../terse_classes.php");
require("../../db.inc");
/* add_post.php
Create a directory for the post, add an index file to it, and
create an include file with details about that specific post_to_display
add new post information to the database.*/
/*Step 1 - Create new post object and input all variables.*/
$new_poem= new TersePost();
/*public $poem_id; //int  - defined in context.inc
public $written_date; //datetime from database used in sorting and ID
public $display_date; //used for huiman readable display of date
public $poem_content; */
$new_poem->get_new_poem_id();
// $written_date will use the database's CURRENT_TIMESTAMP
$new_poem->display_date=$_POST["write_date"];
$new_poem->poem_content=$_POST["content"];
/*Step 1: Verify that title is set*/
if(isset($_POST["title"])){
/*Step 2: Decode*/
  $new_post_title=urldecode($_POST["title"]);
/*Step 3: Turn spaces into dashes*/
  $new_post_title=str_replace(" ", "-", $new_post_title);
/*Step 4: record the new path for the new dir*/
  $new_dir_path="../".$new_post_title;
/*Step 5: check to see that it is a new dir*/
  if(!file_exists($new_dir_path)) {
/*Step 6: create the dir*/
    mkdir($new_dir_path, 0755);
/*Step 7: create a link to it [for testing purposes]*/
    $link_to_post= "<a href=\"{$new_dir_path}\">{$new_dir_path}</a>";
/*Step 8: Copy the important includes*/
    /* This is not needed any longer.copy("essentials.inc", $new_dir_path."/essentials.inc");*/
    copy("../../post_index_template.php", $new_dir_path."/index.php");
/*Step 9: Create context.inc for this specific directory*/
    $file_hndl = fopen($new_dir_path."/context.inc", "a") or die("Unable to open the new context.inc file!");
    $file_content = "<?php\n";
    $file_content = $file_content."\$poem_id='{$new_poem->poem_id}';\n";
    $file_content = $file_content."require_once(\"../../code_page.php\");\n";
    $file_content = $file_content."?>";
    fwrite($file_hndl, $file_content);
    fclose($file_hndl);
/*Step 10: INSERT into the database*/
    $db_insert_post_context= new db_driver($host, $user, $password, $database);
    $insert_query="INSERT INTO poems (poem_id, title, written_date, display_date, poem_content) VALUES
                  ({$new_poem->poem_id}, '{$_POST["title"]}', CURRENT_TIMESTAMP, '{$new_poem->display_date}',
                  '{$new_poem->poem_content}')";
                  //ADD CODE FOR TAGS...
    $db_insert_post_context->db_query($insert_query);
/*Step 11: Change context.inc to reflect new post. */
$file_hndl_context_inc = fopen("../../context.inc", "w") or die("Unable to reopen context.inc file!");
$file_content2 = "<?php\n";
$file_content2 = $file_content2."\$poem_id='{$new_poem->poem_id}';\n";
$file_content2 = $file_content2."require_once(\"code_page.php\");\n";
$file_content2 = $file_content2."?>";
fwrite($file_hndl_context_inc, $file_content2);
fclose($file_hndl_context_inc);
    echo $link_to_post;
  }
  else echo "Warning: Directory called {$new_post_title} already exists. No new directory created.";
}
else echo "No title provided or no Poem ID.";
?>
