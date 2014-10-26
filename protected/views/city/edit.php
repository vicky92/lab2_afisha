<h1>Редактировать город</h1>
<form action = "<?=$this->createUrl("city/edit", array("id" => $model->city_id))?>" method = "POST">
	<label>
		Город: <br />
		<input type = "text" name = "edit[city_name]" value = "<?=$model->city_name?>" />
		<?php if ($model->hasErrors("city_name")) { ?>
			<span><?=$model->getError("city_name")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	
	<input type = "submit" value = "Изменить" /> <br />
</form>