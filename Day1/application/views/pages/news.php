<h2><?php echo $title; ?></h2>
<?php
    foreach ($news as $news_item):
        echo "<h3>".$news_item['title']."<h3>";
    endforeach;
?>