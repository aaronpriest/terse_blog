
<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe ";
fwrite($myfile, $txt);
echo "The text, \"{$txt}\" has been written to the file.";
$txt = "and Jane Doe";
fwrite($myfile, $txt);
echo "The text, \"{$txt}\" has been written to the file.";
echo "Here is the file:";
fclose($myfile);
include "newfile.txt";
?>
