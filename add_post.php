<?php
require("database_driver.php");
require("db.inc");
/* add_post.php
Create a directory for the post, add an index file to it, and
create an include file with details about that specific post_to_display
*/

/*Step 1: Verify that title is set*/
if(isset($_GET["title"])&& isset($_GET["poemid"])){
/*Step 2: Decode*/
  $new_post_title=urldecode($_GET["title"]);
/*Step 3: Turn spaces into dashes*/
  $new_post_title=str_replace(" ", "-", $new_post_title);
/*Step 4: record the new path for the new dir*/
  $new_dir_path="Posts/".$new_post_title;
/*Step 5: check to see that it is a new dir*/
  if(!file_exists($new_dir_path)) {
/*Step 6: create the dir*/
    mkdir($new_dir_path, 0755);
/*Step 7: create a link to it [for testing purposes]*/
    $link_to_post= "<a href=\"{$new_dir_path}\">{$new_dir_path}</a>";
/*Step 8: Copy the important includes*/
    copy("essentials.inc", $new_dir_path."/essentials.inc");
    copy("post_index_template.php", $new_dir_path."/index.php");
/*Step 9: Create context.inc for this specific directory*/
    $file_hndl = fopen($new_dir_path."/context.inc", "a") or die("Unable to open the new context.inc file!");
    $file_content = "<?php\n";
    /*more to come here*/
    $file_content = $file_content."\$poem_id='{$_GET["poemid"]}';\n";
    $file_content = $file_content."require_once(\"../../code_page.php\");\n";
    $file_content = $file_content."?>";
    fwrite($file_hndl, $file_content);
    fclose($file_hndl);
    $db_insert_post_context= new db_driver($host, $user, $password, $database);
    $insert_query="INSERT INTO poems VALUES
                  ({$_GET["poemid"]}, '{$_GET["title"]}', CURRENT_TIMESTAMP, 'May 22, 2017',
                  '<p>Give me flesh and give me wine</p><p>Bring me pine logs hither</p>',
                  '1', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
    $db_insert_post_context->db_query($insert_query);

    echo $link_to_post;
  }
  else echo "Warning: Directory called {$new_post_title} already exists. No new directory created.";
}
else echo "No title provided or no Poem ID.";
?>
