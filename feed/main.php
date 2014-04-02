<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Terse. A quick word with you...</title>
	<meta http-equiv="content-type"  content="text/html;charset=utf-8" />
		<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="allstyles.css" / >
		<link rel="icon"   type="image/png"  href="./imgs/favicon.png" />
		<link href="http://terse.zxq.net/feed" rel="alternate" type="application/rss+xml" title="Terse: Posts" /> 
		<script src="comment_process.js" type="text/javascript"></script>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
		
</head>

<body style="background-color:#CCCCCC">

     <div id="allContent" class="main">
		<div id="banner">
			<div class="top"></div>
			<div class="middle">
					<div id="bannerpic">
					<br/>
						<span class="mainTitle">Terse.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
						<span class="plainText" style="background-color:white;float:right;">"In a moment, there is time...", T.S. Eliot</span>
						
						
					</div>
				</div>
			<div class="bottom">
			<span id="stats" class="plainText"  style="color:#0958AB; font-size:15px"><b>Posts: </b></span><span id="stats" class="plainText"  style="color:#0958AB; font-size:15px;padding-bottom:2px;font-weight:600"><a href="./main.php?postID=about">About</a></span>
			<div id="toplinks">
			
			<a href='./feed' target='_blank'><img  id='feedlink' src='http://terse.zxq.net/feed/feed-icon.png' alt='subscribe to the terse feed'/></a>
			<a rel="nofollow" href="http://www.facebook.com/share.php?u=<;url>" class="fb_share_button" onclick="return fbs_click()" target="_blank" style="text-decoration:none;"></a>
			<a style="position: relative; float:right" href="https://twitter.com/share" class="twitter-share-button" data-lang="en"></a>
			</div>
			</div>			
		</div>
		
		<div id="body">
			
			<div class="top"></div>
			
			<div class="middle">
				<div class="post">
					<div class="sidebar">
							<?php 
										if($_GET['postID']!="current") echo "<a href='../'><b>Current Post</b></a><br/><br/>";										
							?>
							 <span class="title">Archive:</span><br/><?php include "post_retrieve.php";?>
							 </div>
					
							<?php 
								if($_GET['postID']=="current")
									{
										$display = "./posts/{$current}";//$current assigned in post_retreive.php
										$comment_postID = str_replace(".html", "", $current);
									}
								else 
									{
									$display = "./posts/".$_GET['postID'].".html";
									$comment_postID = $_GET['postID'];
									}
								include $display;
								echo "<input type='hidden' value='{$num_posts}' id='num_posts' />";
								echo "<input type='hidden' value='{$revised_date}' id='updated' />";
								
								
							?>
								<br/>&#169;2012 Aaron Priest
							  
												<!--This "main-bottom-padding" is needed to keep comments form from being orphaned until I fgure this out-->
					<!--<div id="main-bottom-padding1"></div>-->
				</div>
			</div>
				<div class="bottom" style="text-align:center"></div>	
		</div>
		
		<div id="commentPortion">
			<div class="top"></div>
		
				<div id="innerComments" class="middle">
					
				
					<div id="commentsForm" >
						<form name="userComment" id="commentInputs">
								
							<?php 
							
								/*$postID is assigned within the post file included above*/
								echo "<input type='hidden' name='pid' value='{$comment_postID}' />";
								/*it is used in js function addComment to add the comment to the database*/
							?>
							<label class="inputlabels" for="commentername">Name:</label><br/>
							<input type="text" name="commentername" maxlength="20"/><br/>
							<label class="inputlabels" for="comment">Comment:</label><br/>
							<textarea name="comment" rows="7" cols="40"></textarea><br/>
							<input  name="submitComment" type="button" value="Comment"/>
						</form>
					</div><!--commentsForm -->
					<div id="comments">
					
						<span class="title">Comment:</span>
						<br/><br/>
						<div id="storedComments">
							<div style=" width: 250px; border-top-style: solid; border-top-width: 2px; border-top-color: #7F95AA;" class='commentcells'><br/>Be the first to comment on this post.</div>
						</div>
					</div>
					<!--This "main-bottom-padding" is needed to keep comments form from being orphaned until I fgure this out-->
					<div id="main-bottom-padding"></div>
				</div><!--innerComments-->
		</div><!--commentPortion-->
			<div class="bottom"></div>	
		</div><!--All Content-->

</body>
</html>