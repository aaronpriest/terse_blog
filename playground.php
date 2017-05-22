<?php /*playground.php*/

$query[0]="SELECT * blah blah blah";
$query[1]="UPDATE blah blah blah";
$query[2]="INSERT INTO blah blah blah";
$query[3]="DELETE FROM blah blah blah";

$i=0;
WHILE($i!=4){
  echo "<br/>Query is: ".$query[$i];

  echo "<br/><br/>if(strpos(\$query[\$i], \"SELECT\"))";
  echo "<br/>Result:";
  if(!strpos($query[$i], "SELECT")) echo ": TRUE.";
  else echo "FALSE";

  echo "<br/><br/>if(strpos(\$query[\$i], \"SELECT\")===FALSE)";
  echo "<br/>Result:";
  if(strpos($query[$i], "SELECT")===FALSE) echo ": TRUE.";
  else echo "FALSE";

  echo "<br/><br/>if(!strpos(\$query[\$i], \"SELECT\")===FALSE)";
  echo "<br/>Result:";
  if(!strpos($query[$i], "SELECT")===FALSE) echo ": TRUE.";


  $i++;
}


?>
