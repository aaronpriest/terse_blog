<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Terse. A quick word with you...</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="../allstyles.css" />
		<link rel="icon"   type="image/png"  href="../imgs/favicon.png" />
		<script type="text/javascript">
			/*function publish(){
				var resource=new XMLHttpRequest();
				var parameters="publisher.php?commentername="+name+"&comment="+message+"&pid="+pid;
				resource.open("POST", "basicform.php", true);
				resource.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				resource.send(parameters);
				
	
					
				resource.open("GET",parameters,false);
				resource.send();
	
			}*/
			
			function backToEdit(){
				window.history.back();
			}

		</script>
		
</head>

<body style="background-color:#CCCCCC">
<div class="top"></div>
<div class="middle" style="font-family:Arial, Helvetica, Sans">
<br/>

<?php
$full_text = addslashes($_POST['content']); 

$title = $_POST['title'];
echo "<b>{$title}</b>";
//echo "<br/>";
echo $full_text;
echo $_POST['pd'];
date_default_timezone_set('America/Chicago');
//These wierd assignments were needed when I was converting old posts to the new format
if(!$_POST['date']){$date = date('F j, Y');}
else $date = $_POST['date'];

$description = $_POST['pd'];


$full_text = str_replace("<", "(great)", $full_text);
$full_text = str_replace(">", "(less)", $full_text);
$full_text = str_replace("/", "(fwdslash)", $full_text);

if(!$_POST['postID']){$postID=date('MjY');}
else $postID = $_POST['postID'];

?>
<form name="sendToPublish" method="post" action="../posts/publish.php">
	<input type="hidden" value="<?php echo $title;?>" name="title"/>
	<input type="hidden" value="<?php echo $date;?>" name="date"/>
	<input type="hidden" value="<?php echo $full_text;?>" name="fulltext"/>
	<input type="hidden" value="<?php echo $postID;?>" name="postID"/>
	<input type="hidden" value="<?php echo $description;?>" name="pd"/>
	<input type='submit' value='Publish'/>
</form>


<input type="button" value="Revise" onclick="backToEdit()"/>
</div>
<div class="bottom"></div>
</body>
</html>