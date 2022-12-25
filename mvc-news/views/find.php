<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/find'); ?>

    <label for="title">Найти новость id || по части title</label>
    <input type="text" name="title" /><br />

    <input type="submit" name="submit" value="Найти" />

</form>
