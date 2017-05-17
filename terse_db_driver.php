<?php
class db_driver
{
  var $mysql_host=""; //string
  var $mysql_user=""; //string
  var $mysql_password=""; //string
  var $mysql_database=""; //string

  function __construct($host, $user, $password, $database)
  {
    $this->mysql_host=$host;
    $this->mysql_user=$user;
    $this->mysql_password=$password;
    $this->mysql_database=$database;
  }

  function db_query($query_string)
  {
    $mysqli = new mysqli("$this->mysql_host", "$this->mysql_user", "$this->mysql_password", "$this->mysql_database");

/* check connection */
      if ($mysqli->connect_errno) {
          echo "Database connection failed: \n".$mysqli->connect_error;
          exit();
      }


      if(!$result = $mysqli->query($query_string))	{echo "<b>Query failed:</b><br/> {$mysqli->error}"; exit();}

//fetch_array returns one row at a time, so we need to do this
      $i=0;//each $i is a row
      while($row = $result->fetch_array(MYSQL_ASSOC))
      {
//do something here
         $i++;
      }

  }
}
 ?>
