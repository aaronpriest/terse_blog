<?php //see Code Standards.txt
include "index_code.php";
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo $title;?>: Terse. A blog in verse. The first poetry blog to blog using poems.</title>
 <!--All Meta-content-->
    <meta name=viewport content='width=500'>
    <meta name="description" content="A blog where posts are short, terse poems reacting to ordinary current events.">
    <meta name="keywords" content="terse, poem, poetry, poet, blog, writing, current, <?php echo $taglist;?>">
    <meta name="author" content="Aaron B. Priest">

 <!--Styles, scripts, other functional header content-->
 	<link rel="stylesheet" type="text/css" href="./styles-original.css?rf=<?php echo rand();?>" / >
    <script src="./devtools.js" type="text/javascript"></script>
    <script src="./page_actions.js" type="text/javascript"></script>
    <link rel="icon" href="favicon.ico" />
<!--End: Styles and scripts-->

  </head>
  <body>
    <div id="NamePlate"><h1 class="nameplate_text">Terse.</h1> <p class="nameplate_text">A blog in verse.</p></div>
    <!--Top Menu-->
    <div id="BannerWithMenus" class="dropdown_main">
    <button id="Item1" onclick="showMenu()" class="menu_item">Poems</button>
        <div id="MainDropDownMenu" class="dropdown_guts">
              <?php echo $linkset;?>
          </div>
    </div>
    <!--End: Top Menu-->
    	<div id="ThePoemContainer">
    		<h2 id="ThePoemsTitle"><?php echo $title;?></h2><p class="dates_and_other_small_text" id="date"> - <?php echo $written_date;?></p>
    			<span id="PoemBody">
                    <?php
                    //Just the inner part of the poem
                    echo $post_content;
                    ?>
                <br/>
  				<p>&#169;2017 Aaron B. Priest</p>
  			</span><!--End: PoemBody-->

            <!--Hidden inputs with meta-information about the poem-->
            <input type="hidden" name="tags" value="<?php echo $taglist;?>" />
            <input type="hidden" name="PoemID" value="<?php echo $poem_id;?>" />
            <input type="hidden" name="PoemStatus" value="<?php echo $poem_status;?>"/><!--"C" for "Current" other possible value: "A" for "Archived"-->
            <!--End: Hidden inputs-->
      </div><!--End: ThePoemContainer-->



  <!--Dev Tools-->


  <!--End: Dev Tools-->
  	</body>
</html>
