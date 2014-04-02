<?php
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
 include "../db_rc.inc";  
    $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
    $rssfeed .= '<rss version="2.0">';
    $rssfeed .= '<channel>';
    $rssfeed .= '<title>Terse - Aaron Priest</title>';
    $rssfeed .= '<link>{$mainURL}/feed</link>';//$mainURL is assigned in db_rc
    $rssfeed .= '<description>Regular posting of poetry, short stories, and musings.</description>';
    $rssfeed .= '<language>en-us</language>';
    $rssfeed .= '<copyright>Copyright (C) 2011 Aaron Priest</copyright>';
 
    $connection = @mysql_connect($mysql_host, $mysql_user, $mysql_password)
        or die('Could not connect to database');
    mysql_select_db($mysql_database, $connection)
        or die ('Could not select database');
 
    $query = "SELECT * FROM feeds ORDER BY date DESC";
    $result = mysql_query($query, $connection) or die ("Could not execute query");
 
    while($row = mysql_fetch_array($result)) {
        extract($row);
 	$link=str_replace('Q63','?', $link);
        $rssfeed .= '<item>';
        $rssfeed .= '<title>' . $title . '</title>';
        $rssfeed .= '<description>' . $description . '</description>';
        $rssfeed .= '<link>' . $mainURL . $link . '</link>';
        $rssfeed .= '<pubDate>' . date("D, d M Y H:i:s O", strtotime($date)) . '</pubDate>';
        $rssfeed .= '</item>';
    }
 
    $rssfeed .= '</channel>';
    $rssfeed .= '</rss>';
 
    echo $rssfeed;
?>
