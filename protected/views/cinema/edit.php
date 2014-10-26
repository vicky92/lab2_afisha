<h1>Редактировать кинотеатр</h1> <br />

<form action = "<?=$this->createUrl("cinema/edit", array("id" => $model->id))?>" method = "POST">
	<label>
		Название кинотеатра: <br />
		<input type = "text" name = "edit[title]" value = "<?=$model->title?>" />
		<?php if ($model->hasErrors("title")) { ?>
			<span><?=$model->getError("title")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	
	<label>
		Город: <br />
		<select name = "edit[city_id]" value = "<?=$model->city_id?>">
		    <?php
                $cities = City::model()->findAll();

                foreach($cities as $city) {
                    ?>
                        <option <?=($model->city_id==$city->city_id)?"selected='selected'":''?> value = "<?=$city->city_id?>">
                            <?=$city->city_name?>
                        </option>
                    <?php
                }
            ?>
        </select>
		<?php if ($model->hasErrors("city_id")) { ?>
			<span><?=$model->getError("city_id")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	
	<label>
		Адрес: <br />
        <textarea name = "edit[adress]"><?=$model->adress?></textarea>
		<?php if ($model->hasErrors("adress")) { ?>
			<span><?=$model->getError("adress")?></span> 
		<?php } ?>
	</label>
	<br /><br />
	
	<input type = "submit" value = "Изменить" /> <br />
</form>