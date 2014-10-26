<?php
class Cinema extends CActiveRecord {
	public $title = null;
	public $city_id = null;
    public $adress = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'cinema'; }

	public function primaryKey () { return 'id'; }

	public function rules () {
		return array(
			array ('title, city_id, adress', 'required'), 
			array ('title', 'length', 'min' => 3, 'max' => 120, ),
            array ('adress', 'length', 'min' => 3, 'max' => 180, ),
        );
	}

	public function attributeLabels () {
		return array(
			array ('title', 'Название кинотеатра'),
			array ('city_id', 'Город'),
            array ('adress', 'Адрес'),
		);
	}
    
    public static function getSessionsByFilm ( $cinema_id, $film_id ) {
        $film_model = Film::model()->findByPK( $film_id );
        
        $criteria = new CDbCriteria();
        
        $criteria->select = '*, DATE_FORMAT(date,"%d.%m.%Y") as date_format';

        $criteria->condition = "cinema_id=:cinema_id AND film_id=:film_id";
        $criteria->params = array( 
            ":cinema_id" => $cinema_id,
            ":film_id" => $film_id,
        );
        $criteria->group = "cinema_id";
        
        $criteria->group='DATE(date)';
        
        $relations = Relation::model()->findAll( $criteria );
        
        $items = array();
        
        foreach ($relations as $relation) {
            // Получим список сенсов на день из текущей итерации
            $criteria = new CDbCriteria();
            $criteria->select = '*, DATE_FORMAT(date,"%d.%m.%Y") as date_format, DATE_FORMAT(date,"%H:%i") as time';
            $criteria->condition = 'cinema_id=:cinema and DATE_FORMAT(date,"%d.%m.%Y")=:date and film_id=:film_id';

            $criteria->params = array (
                ":cinema" => $relation->cinema_id,
                ":date" => $relation->date_format,
                ":film_id" => $film_id,
            );
            $criteria->order = 'time ASC';

            $relations_date = Relation::model()->findAll( $criteria );
            
            foreach ($relations_date as $session) {
                $items[$relation->date_format][] = (object) array (
                    "film" => $film_model->title,
                    "time" => $session->time
                );
            }
        }
        
        return $items;
    } 
    
    
    public function relations()
    {
        return array(
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
        );
    }
}