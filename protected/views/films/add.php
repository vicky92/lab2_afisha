<h1>Добавить Фильм</h1>
<?php if (!empty($_GET['message']) and $_GET['message'] == "add_success") { ?>
    <div class = "success">
        Фильм успешно добавлен
    </div>
<?php } ?>
<form action = "<?=$this->createUrl("films/add")?>" method = "POST">
	<label>
		Название: <br />
		<input type = "text" name = "add[title]" value = "<?=$model->title?>" />
		<?php if ($model->hasErrors("title")) { ?>
			<span><?=$model->getError("title")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	<input type = "submit" value = "Добавить" /> <br />
</form>