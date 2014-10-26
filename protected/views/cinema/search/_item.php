<tr data-cinema-id = "<?=$item->id?>">
	<td>
	    <a href = "<?=$this->createUrl("cinema/view", array("id" => $item->id))?>">
	        <?=$item->title?>
        </a>
	</td>
	<td>
        <a href = "<?=$this->createUrl("cinema/search", array("city" => $item->city_id))?>"><?=$item->city->city_name?></a>
    </td>
	<td>
        <?=$item->adress?>
    </td>
	<td>
		<a href = "<?=$this->createUrl('cinema/remove', array('id' => $item->id))?>">Удалить</a> | 
		<a href = "<?=$this->createUrl('cinema/edit', array('id' => $item->id))?>">Редактировать</a>
	</td>
</tr>