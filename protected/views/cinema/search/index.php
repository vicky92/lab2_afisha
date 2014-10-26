<h1>Кинотеатры</h1>
<table style = "width: 100%;">
    <tr>
        <td style = "width: 70%; padding-right: 50px; vertical-align: top;">
            <h2>Список кинотеатров</h2>
            <table style = "width: 100%;" border = "1">
                <thead>
                    <tr>
                        <td>Название кинотеатра</td>
                        <td>Город</td>
                        <td>Адрес</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item) { ?>
                        <?=$this->renderPartial("search/_item", array('item' => $item))?>
                    <?php } ?>
                </tbody>
            </table>
            <br />
            <a href = "<?=$this->createUrl('cinema/add')?>">Добавить кинотеатр</a> <br />
        </td>
        <td style = "width: 30%; vertical-align: top;">
            <?php
                $items = City::model()->findAll();
            ?>
            <h2>Поиск кинотеатра</h2>
            <form action = "" method = "POST">
                <input type = "text" name = "search[query]" placeholder = "Название кинотеатра" />
                <input type = "submit" /> <br /><br />
                <i>Введите название кинотеатра или найдите его в своем городе</i>
            </form>
            <table style = "width: 100%;" border = "1">
                <thead>
                    <tr>
                        <td>Город</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href = "<?=$this->createUrl("cinema/search")?>"><b>Все города</b></a></td>
                        <td></td>
                    </tr>
                    <?php foreach($items as $item) { ?>
                        <?=$this->renderPartial("//city/search/_item", array('item' => $item))?>
                    <?php } ?>
                </tbody>
            </table> <br />
            <a href = "<?=$this->createUrl('city/add')?>">Добавить город</a> <br />
        </td>
    </tr>
</table>
