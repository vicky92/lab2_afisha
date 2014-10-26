<h1>Добавить кинотеатр</h1> <br />
<?php if (!empty($_GET['message']) and $_GET['message'] == "add_success") { ?>
    <div class = "success">
        Кинотеатр успешно добавлен
    </div>
<?php } ?>

<form action = "<?=$this->createUrl("cinema/add")?>" method = "POST">
	<label>
		Название кинотеатра: <br />
		<input type = "text" name = "add[title]" value = "<?=$model->title?>" />
		<?php if ($model->hasErrors("title")) { ?>
			<span><?=$model->getError("title")?></span> 
		<?php } ?>
	</label> 
	<br /><br />
	<label>
		Город: <br />
		
		<select name = "add[city_id]" value = "<?=$model->city_id?>">
		    <?php
                $cities = City::model()->findAll();

                foreach($cities as $city) {
                    ?>
                        <option value = "<?=$city->city_id?>"><?=$city->city_name?></option>
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
        <textarea name = "add[adress]"><?=$model->adress?></textarea>
		<?php if ($model->hasErrors("adress")) { ?>
			<span><?=$model->getError("adress")?></span> 
		<?php } ?>
	</label>
	<br /><br />
	
	<input type = "submit" value = "Добавить" /> <br />
</form>