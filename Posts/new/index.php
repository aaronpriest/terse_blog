<?php //see Code Standards.txt
require("../../essentials.inc");
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
 <link rel="stylesheet" href="<?php echo $base_url;?>Styles/core_styles.css?rf=<?php echo rand();?>" / >
   <script src="<?php echo $base_url;?>Scripts/devtools.js"></script>
   <script src="<?php echo $base_url;?>Scripts/page_actions.js"></script>
   <link rel="icon" href="<?php echo $base_url;?>Images/favicon.ico" />

   <script type="text/javascript" src="./tinymce/js/tinymce/tinymce.js"></script>
   <script type="text/javascript">
         tinymce.init({
       selector: 'textarea',  // change this value according to your HTML
       max_width: 500
      });
   </script>
<!--End: Styles and scripts-->

  </head>
  <body>
    <header><h1>Terse.</h1> <p>A blog in verse.</p></header>
    <!--Top Menu-->
    <nav>
    <button id="Item1" onclick="showMenu()" class="menu_item">Poems</button>
        <div id="MainDropDownMenu" class="dropdown_guts">
              <?php echo $poem->linkset;?>
          </div>
    <button id="Item2" class="menu_item">About</button>
    </nav>
    <!--End: Top Menu-->
    <main style="width:70%">
                    <form method="post" action="add_post.php">
                      <p>Title:</p> <input type="text" name="title" />
                      <p>Display Date:</p> <input type="text" name="write_date" />
                      <p>Poem:</p> <textarea rows="15" cols="50" name="content"></textarea>
                      <br/>
                      <input type="submit" value="Create" />
                    </form>
                  </article>
      </main>


      <!--Hidden inputs with meta-information about the poem or page-->
      <input type="hidden" name="tags" value="<?php echo $poem->get_tag_list();?>" />
      <input type="hidden" name="PoemID" value="<?php echo $poem->poem_id;?>" />

      <!--End: Hidden inputs-->


  <!--Dev Tools-->
<!--<input type="button" name="ShowBorders" value="See Borders" onclick="markAllBorders()"/>-->
  <!--End: Dev Tools-->
  	</body>
</html>
