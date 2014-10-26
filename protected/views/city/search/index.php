<h1>Список городов</h1>
<?php
    /*
     * Выводим список элементов на страницу
     */
?>

<a href = "<?=$this->createUrl('city/add')?>">Добавить город</a> <br />
<table style = "width: 100%;" border = "1">
	<thead>
		<tr>
			<td>Город</td>
			<td>Действие</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($items as $item) { ?>
			<?=$this->renderPartial("search/_item", array('item' => $item))?>
		<?php } ?>
	</tbody>
</table>