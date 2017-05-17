<?php //see Code Standards.txt
include "page_code.php";
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo $post_to_display->title;?> - Terse. A blog in verse. The first poetry blog to blog using poems.</title>
 <!--All Meta-content-->
    <meta name=viewport content='width=640'>
    <meta name="description" content="A blog where posts are short, terse poems reacting to ordinary current events.">
    <meta name="keywords" content="terse, poem, poetry, poet, blog, writing, current, <?php echo $post_to_display->taglist;?>">
    <meta name="author" content="Aaron B. Priest">

 <!--Styles, scripts, other functional header content-->
 <link rel="stylesheet" href="<?php echo $base_url;?>Styles/core_styles.css?rf=<?php echo rand();?>" / >
   <script src="<?php echo $base_url;?>Scripts/devtools.js"></script>
   <script src="<?php echo $base_url;?>Scripts/page_actions.js"></script>
   <link rel="icon" href="<?php echo $base_url;?>Images/favicon.ico" />
<!--End: Styles and scripts-->

  </head>
  <body>
    <header><h1>Terse.</h1> <p>A blog in verse.</p></header>
    <!--Top Menu-->
    <nav>
    <button id="Item1" onclick="showMenu()" class="menu_item">Poems</button>
        <div id="MainDropDownMenu" class="dropdown_guts">
              <?php echo $post_to_display->linkset;?>
          </div>
    <button id="Item2" class="menu_item">About</button>
    </nav>
    <!--End: Top Menu-->
    	<main>
        <section>
    		<h2><?php echo $post_to_display->title;?></h2><time> - <?php echo $post_to_display->written_date;?></time>

                    <?php
                    //Just the inner part of the poem
                    echo $post_to_display->post_content;
                    ?>
                <br/>
  				<p>&#169;2017 Aaron B. Priest</p>

      </section>
      </main><!--End: ThePoemContainer-->

      <!--Hidden inputs with meta-information about the poem or page-->
      <input type="hidden" name="tags" value="<?php echo $post_to_display->taglist;?>" />
      <input type="hidden" name="PoemID" value="<?php echo $post_to_display->poem_id;?>" />
      <input type="hidden" name="PoemStatus" value="<?php echo $post_to_display->poem_status;?>"/><!--"C" for "Current" other possible value: "A" for "Archived"-->
      <!--End: Hidden inputs-->


  <!--Dev Tools-->
<!--<input type="button" name="ShowBorders" value="See Borders" onclick="markAllBorders()"/>-->
  <!--End: Dev Tools-->
  	</body>
</html>
