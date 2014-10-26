<?php
    $film = Film::model()->findByPK( $item->film_id );
    $cinema = Cinema::model()->findByPK( $item->cinema_id );
    $city = City::model()->findByPK( $cinema->city_id );
?>
<tr data-cinema-id = "<?=$item->id?>">
    <td>
        <a href = "<?=$this->createUrl("films/view", array("id" => $film->id))?>"><?=$film->title?></a>
	</td>
    <td>
        <a href = "<?=$this->createUrl("cinema/view", array("id" => $cinema->id))?>"><?=$cinema->title?></a>
	</td>
    <td>
        <?=$item->date?>
	</td>
	<td>
        <a href = "<?=$this->createUrl("cinema/search", array("city" => $city->city_id))?>"><?=$city->city_name?></a>
	</td>
	<td>
		<a href = "<?=$this->createUrl('relations/remove', array('id' => $item->id))?>">Удалить сеанс</a>
	</td>
</tr>