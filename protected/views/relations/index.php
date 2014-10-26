<h1>Список сеансов</h1>

<h2><?=$_POST['start']?> - <?=$_POST['end']?> </h2>

<table style = "width: 100%;">
    <tr>
        <td style = "width: 70%; vertical-align: top; padding-right: 50px;">
            <table style = "width: 100%;" border = "1">
                <thead>
                    <tr>
                        <td>Фильм</td>
                        <td>Кинотеатр</td>
                        <td>Время</td>
                        <td>Город</td>
                        <td>Действие</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item) { ?>
                        <?=$this->renderPartial("_item", array('item' => $item))?>
                    <?php } ?>
                </tbody>
            </table>
        </td>
        <td style = "width: 70%; vertical-align: top;">
            <i>
                Введите диапазон даты/времени для отображения сеансов проводящих в удобное для вас время. <br />
                Обратите внимание, что формат даты должен соответствовать след. шаблону: <br />
                <b><?=date("Y-m-d H:i:s", time())?></b>
               
            </i> <br /><br />
            <form action = "" method = "POST">
                <input type="text" name = "start" placeholder = "от" style = "width: 130px;"> - 
                <input type="text" name = "end" placeholder = "до" style = "width: 130px;"> <br /><br />
                <input type = "submit" value = "Продолжить" />
            </form>
            
        </td>
    </tr>
