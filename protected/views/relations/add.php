<h1>Добавить сеанс</h1>
<?php if (!empty($_GET['message']) and $_GET['message'] == "add_success") { ?>
    <div class = "success">
        Сеанс успешно добавлен
    </div>
<?php } ?>
<form action = "<?=$this->createUrl("relations/add")?>" method = "POST">
	
    <b>Кинотеатр:</b> <br />
		<?php 
            $cinemates = Cinema::model()->findAll();

            foreach ($cinemates as $cinemate) { 
        ?>
		    <label style = "display: block;">
		        <input type = "radio" name = "add[cinema_id]" value = "<?=$cinemate->id?>" <?=($model->cinema_id==$cinemate->id)?"checked":''?> />
                <?=$cinemate->title?> <br />
		        <small>
                    <i><?=$cinemate->adress?></i>
		        </small>
		    </label><br />
		<?php } ?>
		
    <?php if ($model->hasErrors("cinema_id")) { ?>
        <span><?=$model->getError("cinema_id")?></span> 
    <?php } ?><br />
	    
    <b>Фильм: </b> <br />
    <select name = "add[film_id]">
        <?php 
            $films = Film::model()->findAll();
            foreach ($films as $film) { 
        ?>
            <option value = "<?=$film->id?>"><?=$film->title?></option>
        <?php } ?>
    </select>
	<?php if ($model->hasErrors("film_id")) { ?>
        <span><?=$model->getError("film_id")?></span> 
    <?php } ?> <br /><br />
	
    <b>День проведения:</b>
    <?php if ($model->hasErrors("date")) { ?>
        <span><?=$model->getError("date")?></span> 
    <?php } ?>
    <br />
    <select name = "add[_date]">
        <?php 
            for ($i = 0; $i <= 10; $i++) { 
                // Получим день
                $timestamp = intval(intval(time()) + ((60*60)*24)*$i);
                
                // Отформатируем его на MYSQL DATETIME формат
                $date_format = date("Y-m-d", $timestamp);
        ?>
           
            <option value = "<?=$date_format?>"><?=$date_format?></option>
        <?php } ?>
    </select> <br /><br />
    
    <b>Время начала сеанса:</b>
    <br />
    <select name = "add[_time]">
        <?php for ($i = 0; $i <= 23; $i++) { ?>
           
            <option value = "<?=$i?>:00:00"><?=$i?>:00</option>
        <?php } ?>
    </select> <br /><br />
    
	<input type = "submit" value = "Добавить сеанс" /> <br />
</form>