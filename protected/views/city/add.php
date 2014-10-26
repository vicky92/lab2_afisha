<h1>Добавить Город</h1>
<?php if (!empty($_GET['message']) and $_GET['message'] == "add_success") { ?>
    <div class = "success">
        Город успешно добавлен
    </div>
<?php } ?>
<form action = "<?=$this->createUrl("city/add")?>" method = "POST">
	<label>
		Город: <br />
		<input type = "text" name = "add[city_name]" value = "<?=$model->city_name?>" />
		<?php if ($model->hasErrors("city_name")) { ?>
			<span><?=$model->getError("city_name")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	<input type = "submit" value = "Добавить" /> <br />
</form>