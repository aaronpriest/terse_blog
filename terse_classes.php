<?php

require("database_driver.php");

class TersePost
{
  public $poem_id; //int  - defined in context.inc
  public $written_date; //datetime from database
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
      $database = new db_driver($host, $user, $password, $database);
      $this_query="SELECT title,
                          written_date,
                          poem_content,
                          tag_id_1, tag_id_2, tag_id_3, tag_id_4, tag_id_5, tag_id_6, tag_id_7, tag_id_8, tag_id_9, tag_id_10
                   FROM poems
                   WHERE poem_id='{$this->poem_id}'
                   LIMIT 1";
      $database->db_query($this_query);
      /*Step 4: Assign class members info from the DB*/
      $this->title=$database->col_values[0]["title"];
      $this->written_date=$database->col_values[0]["written_date"];
      $this->poem_content=$database->col_values[0]["poem_content"];

      /*Step 5: Gather all the tags associated with the poem.*/
      $taglist_index=0;
      for($a=1; $a<=10; $a++){
        $tag=$database->col_values[0]["tag_id_{$a}"];
        if($tag!=NULL){
          $this->taglist[$taglist_index]=$tag;
          $taglist_index++;
        }
      }
      /*END: Step 5***/
  }
  public function get_tag_list(){
    for($b=0; $b<sizeof($this->taglist); $b++){
        if($b>0) echo ", ";
        echo $this->taglist[$b];
      }
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
