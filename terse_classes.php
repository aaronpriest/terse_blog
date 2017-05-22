<?php

require("database_driver.php");


class TersePost
{
  public $poem_id; //int  - defined in context.inc
  public $written_date; //datetime from database used in sorting and ID
  public $display_date; //used for huiman readable display of date
  public $poem_content; //text from database
  public $taglist; //array of one-word strings
  public $archive_list; //array of poem names, dates, and poem_id's
  public $linkset; //array of links to poems

  public function get_poem($requested_poem_id){
      /*Step 1: include the file with the db info*/
      require("db.inc");
      /*Step 2: set poem_id*/
      $this->poem_id=$requested_poem_id;
      /*Step 3: run the query based on ID*/
      $database_poems = new db_driver($host, $user, $password, $database);
      $this_query="SELECT title,
                          written_date,
                          display_date,
                          poem_content,
                          tag_id_1, tag_id_2, tag_id_3, tag_id_4, tag_id_5, tag_id_6, tag_id_7, tag_id_8, tag_id_9, tag_id_10
                   FROM poems
                   WHERE poem_id='{$this->poem_id}'
                   LIMIT 1";
      $database_poems->db_query($this_query);
      /*Step 4: Assign class members info from the DB*/
      $this->title=$database_poems->col_values[0]["title"];
      $this->written_date=$database_poems->col_values[0]["written_date"];
      $this->display_date=$database_poems->col_values[0]["display_date"];
      $this->poem_content=$database_poems->col_values[0]["poem_content"];

      /*Step 5: Gather all the tags associated with the poem.*/
        /* 5-1. Need a new database connection/db_driver object*/
      $database_tags = new db_driver($host, $user, $password, $database);
        /* 5-2. Create an index for the number of tags*/
      $taglist_index=0;
      for($a=1; $a<=10; $a++){
        /* 5-3. Put the tag number into a variable*/
        $tag=$database_poems->col_values[0]["tag_id_{$a}"];
        if($tag!=NULL){
        /* 5-4. Use the variable for up to 10 separate queries*/
          $database_tags->db_query("SELECT tag_name FROM tags WHERE tag_id={$tag}");
          $tag_name=$database_tags->col_values[0]["tag_name"];
        /* 5-5. Create the tag list.*/
          $this->taglist[$taglist_index]=$tag_name;
          $taglist_index++;
        }
      }
      /*END: Step 5***/
  }

  /*get_tag_list() - simply a member function to display the list of tags stored in object->taglist[]*/
  public function get_tag_list(){
    for($b=0; $b<sizeof($this->taglist); $b++){
        if($b>0) echo ", ";
        echo $this->taglist[$b];
      }
  }

  public function get_archives(){
    require("db.inc");
    require("essentials.inc");
    $database_poem_list = new db_driver($host, $user, $password, $database);
    $this_query="SELECT poem_id,
                        title,
                        written_date,
                        display_date
                 FROM poems";
    $database_poem_list->db_query($this_query);
    $archive_list_index=0;
    for($c=0; $c<sizeof($database_poem_list->col_values); $c++){
      $archive_string=$database_poem_list->col_values[$c]["title"]." - ".$database_poem_list->col_values[$c]["display_date"];
      $this->archive_list[$archive_list_index]["poem_id"]=$database_poem_list->col_values[$c]["poem_id"];
      $this->archive_list[$archive_list_index]["display_date"]=$database_poem_list->col_values[$c]["display_date"];
      $this->archive_list[$archive_list_index]["title"]=$database_poem_list->col_values[$c]["title"];
      $archive_list_index++;
    }
  $this->linkset="";
  for($a=0; $a<sizeof($this->archive_list); $a++)
    {
      $dir_name=str_replace(" ", "-", $this->archive_list[$a]["title"]);
      $this->linkset= $this->linkset."<a href=\"{$base_url}Posts/$dir_name\">{$this->archive_list[$a]['title']}"." - ".$this->archive_list[$a]['display_date']."</a>";
    }
  /*End Test Data*/
}
    public function provide_test_data(){
    $this->archive_list= array("Cats - 5/5/17", "Dogs - 4/26/17", "Hats - 4/2/17");
    $this->linkset="";
    for($a=0; $a<sizeof($this->archive_list); $a++)
      {
        $this->linkset= $this->linkset."<a href=\"#\">{$this->archive_list[$a]}</a>";
      }
    /*End Test Data*/
  }

}
?>
