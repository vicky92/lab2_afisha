<h1>Кинотеатр "<?=$model->title?>"</h1>
<table style = "width: 100%;">
    <tr>
        <td style = "width: 70%; padding-right: 50px;">
            <h2>Список сеансов</h2>
            <a href = "<?=$this->createUrl("relations/add", array("cinema_id" => $model->id))?>">Добавить сеанс</a>

            <?php 
                // Сгруперуем все сеансы кинотеатра по датам
                $criteria = new CDbCriteria();
                $criteria->select = '*, DATE_FORMAT(date,"%d.%m.%Y") as date_format';
                $criteria->condition = "cinema_id=:cinema";

                $criteria->params = array (":cinema" => $model->id);
                $criteria->group='DATE(date)';

                $relations = Relation::model()->findAll( $criteria );

                // Пробежимся по сеансам
                foreach ($relations as $relation) {

                    // Получим список сенсов на день из текущей итерации
                    $criteria = new CDbCriteria();
                    $criteria->select = '*, DATE_FORMAT(date,"%d.%m.%Y") as date_format, DATE_FORMAT(date,"%H:%i") as time';
                    $criteria->condition = 'cinema_id=:cinema and DATE_FORMAT(date,"%d.%m.%Y")=:date';

                    $criteria->params = array (
                        ":cinema" => $relation->cinema_id,
                        ":date" => $relation->date_format
                    );
                    $criteria->order = 'time ASC';

                    $relations_date = Relation::model()->findAll( $criteria );
                    ?>
                        <h4><?=$relation->date_format?></h4>
                        <table style = "width: 100%;" border = "1">
                            <?php 
                                foreach ($relations_date as $item) { 
                                $film = Film::model()->findByPK($item->film_id);
                            ?>
                            <tr>
                                <td style = "width: 200px;"><a href = "<?=$this->createUrl('films/view', array("id" => $film->id))?>"><?=$film->title?></a></td>
                                <td style = "width: 200px;"><?=$item->time?></td>
                                <td style = "width: 200px;">
                                    <a href="<?=$this->createUrl('relations/remove', array("id" => $item->id))?>">удалить сеанс</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    <?php
                }
            ?>
        </td>
        <td style = "width: 30%; vertical-align: top;">
            <h2>Информация</h2>
            <?php
                // Определим город
                $city = City::model()->findByPK( $model->city_id );
            ?>

            <b>Город:</b> <br >
            <a href = "<?=$this->createUrl("cinema/search", array("city" => $city->city_id))?>"><?=$city->city_name?></a> 
            <br /><br />

            <b>Адрес:</b> <br />
            <i><?=$model->adress?></i>
        </td>
    </tr>
</table>
