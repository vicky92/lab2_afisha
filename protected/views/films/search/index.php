<h1>Список Фильмов</h1>
<?php
    /*
     * Выводим список элементов на страницу
     */
?>
<table style = "width: 100%;">
    <tr>
        <td style = "width: 70%; vertical-align: top; padding-right: 50px;">
            <h2>Сейчас в кино</h2>
            <table style = "width: 100%;" border = "1">
                <thead>
                    <tr>
                        <td>Название</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item) { ?>
                        <?=$this->renderPartial("search/_item", array('item' => $item))?>
                    <?php } ?>
                </tbody>
            </table> <br />
            <a href = "<?=$this->createUrl('films/add')?>">Добавить фильм</a> <br />
        </td>
        <td style = "width: 30%; vertical-align: top;">
            <h2>Поиск по фильмам</h2>
            <form action = "" method = "POST">
                <input type = "text" name = "search[query]" placeholder = "Название фильма" />
                <input type = "submit" value = "искать" /> <br /><br />
                <i>Введите название название фильма</i>
            </form>
        </td>
    </tr>
</table>

