<?php
class TersePost
{
  public $poem_id="";
  public $poem_status="";
  public $written_date;
  public $post_content;
  public $taglist;

  public function __construct($poem_status){
    if($poem_status=="") $this->poem_status="X";
    $this->poem_status=$poem_status;
  }
  public function provide_test_data(){
    /*Test data in place of DB data
    IF the poem_id is not set, it means its the index which does not care about the ID
    IF the poem_status is not set, it means its an achive file and status will naturally be 'A'*/
    if($this->poem_status=='C') {$this->poem_id=date('mdY').'-1'; $this->title="IndexFile";}
    elseif ($this->poem_status=='A') {$this->poem_id=date('mdY').'-1'; $this->poem_status='A'; $this->title="ArchiveFile";}
    else {echo "Error:\$this->status is not set to A or C. Check class definition.";
      $this->title="Error.";}
    /*More test data in place of DB data*/
    $this->written_date=date("F j, Y");
    $this->post_content="";
    for($line=0; $line<15; $line++)
    {
        $display_number=$line+1;
        $this->post_content=$this->post_content."<p>Line {$line}.</p>";
    }
    $this->taglist='city, urban, weariness, Spring';
    }
    /*End Test Data*/
  }


  class TerseArchives extends TersePost {
public $archive_list;
public $linkset;

public function provide_archive_data(){
  $this->archive_list= array("Cats - 5/5/17", "Dogs - 4/26/17", "Hats - 4/2/17");
  $this->linkset="";
  for($a=0; $a<sizeof($this->archive_list); $a++){
      $this->linkset= $this->linkset."<a href=\"#\">{$this->archive_list[$a]}</a>";
      }


  }
}






?>
