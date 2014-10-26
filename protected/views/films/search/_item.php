<tr data-cinema-id = "<?=$item->id?>">
	<td>
        <a href = "<?=$this->createUrl("films/view", array("id" => $item->id))?>"><?=$item->title?></a>
	</td>
	<td>
		<a href = "<?=$this->createUrl('films/remove', array('id' => $item->id))?>">Удалить</a> |
		<a href = "<?=$this->createUrl('films/edit', array('id' => $item->id))?>">Редактировать</a>
	</td>
</tr>