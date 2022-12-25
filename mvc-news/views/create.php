<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>

    <label for="title">Титл</label>
    <input type="text" name="title" /><br />

    <label for="text">Текст новости</label>
    <textarea name="text"></textarea><br />
	
	<label for="announce">Анонс</label>
    <input type="text" name="announce"/><br />
	
	<label for="tags">Тэги через пробел</label>
    <input type="text" name="tags"/><br />

    <input type="submit" name="submit" value="Создать новость" />

</form>
