<tr data-cinema-id = "<?=$item->city_id?>">
	<td>
        <a href = "<?=$this->createUrl("cinema/search", array("city" => $item->city_id))?>"><?=$item->city_name?></a>
	</td>
	<td>
		<a href = "<?=$this->createUrl('city/remove', array('id' => $item->city_id))?>">Удалить</a> |
		<a href = "<?=$this->createUrl('city/edit', array('id' => $item->city_id))?>">Редактировать</a>
	</td>
</tr>