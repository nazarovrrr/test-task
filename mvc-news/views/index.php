<h2><?php echo 'кол-во ' . count($news);// . $title ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title'] . " " . $news_item['time_str']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['id']); ?>">Просмотреть новость.</a></p>

<?php endforeach; ?>

<p><a href="<?php echo site_url('news/create'); ?>">Создать новость</a></p>
<p><a href="<?php echo site_url('news/find'); ?>">Найти новость по title/id</a></p>
