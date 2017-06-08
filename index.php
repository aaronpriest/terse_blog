<?php //see Code Standards.txt
require("essentials.inc");
require("context.inc");
?>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php echo $poem->title;?> - Terse. A blog in verse. The first poetry blog to blog using poems.</title>
 <!--All Meta-content-->
    <meta name=viewport content='width=640'>
    <meta name="description" content="A blog where posts are short, terse poems reacting to ordinary current events.">
    <meta name="keywords" content="terse, poem, poetry, poet, blog, writing, current, <?php echo $poem->taglist;?>">
    <meta name="author" content="Aaron B. Priest">

 <!--Styles, scripts, other functional header content-->
 <!--jQuery from Google-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <link rel="stylesheet" href="<?php echo $base_url;?>Styles/core_styles.css?rf=<?php echo rand();?>" / >
   <script src="<?php echo $base_url;?>Scripts/devtools.js"></script>
   <script src="<?php echo $base_url;?>Scripts/page_actions.js"></script>


   <link rel="icon" href="<?php echo $base_url;?>Images/favicon.ico" />
<!--End: Styles and scripts-->

  </head>
  <body>
    <header><h1 class="center">Terse.</h1> <p>A blog in verse.</p></header>
    <!--Top Menu-->
    <nav>
      <div class="center" >
    <button id="Item1" onclick="showMenu()" class="menu_item">Poems</button>
        <div id="MainDropDownMenu" class="dropdown_guts">
              <?php echo $poem->linkset;?>
          </div>
    <button id="Item2" class="menu_item">About</button>
    </div>
    </nav>
    <!--End: Top Menu-->
    	<main  class="center">
        <section>
          <aside>
            <h3>Previous</h3>
            <?php echo $poem->linkset;?>
          </aside>
    		<h2><?php echo $poem->title;?></h2><time> - <?php echo $poem->display_date;?></time>
                  <article>
                    <?php
                    //Just the inner part of the poem
                    echo $poem->poem_content;
                    ?>
                  </article>
                <br/>
  				<p>&#169;2017 Aaron B. Priest</p>

      </section>
      </main><!--End: ThePoemContainer-->

      <!--Hidden inputs with meta-information about the poem or page-->
      <input type="hidden" name="tags" value="<?php echo $poem->get_tag_list();?>" />
      <input type="hidden" name="PoemID" value="<?php echo $poem->poem_id;?>" />

      <!--End: Hidden inputs-->


  <!--Dev Tools-->
<!--<input type="button" name="ShowBorders" value="See Borders" onclick="markAllBorders()"/>-->
  <!--End: Dev Tools-->
  	</body>
</html>
