<?php //<p><a href="echo site_url('delete?id=' . $news_item['id']);">Удалить новость</a></p> ?>
<p><a href="<?php echo "http://nazarov.rf.gd/mvc_news/news/delete?id=" . $news_item['id']; ?>">Удалить новость</a></p>
<p><?php echo "содержимое news_item array"; ?></p>
<p><?php echo implode(" --- ", ["id", "title", "slug", "text", "announce", "time", "time_str"]); ?></p>
<?php


echo implode(" --- ", $news_item);
