<?php
class Film extends CActiveRecord {
	public $title = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'films'; }

	public function primaryKey () { return 'id'; }

	public function rules () {
		return array(
			array ('title', 'required'), 
			array ('title', 'length', 'min' => 3, 'max' => 40, ),
            
        );
	}
    
    public static function getCinemates ( $film_id ) {
        $criteria = new CDbCriteria();
        
        $criteria->condition = "film_id = :film_id";
        $criteria->params = array( ":film_id" => $film_id );
        $criteria->group = "cinema_id";
        
        $relations = Relation::model()->findAll( $criteria );
        
        $items = array();
        
        foreach ($relations as $relation) {
            $cinema = Cinema::model()->findByPK( $relation->cinema_id );
            $city = City::model()->findByPK( $cinema->city_id );
            
            $cinema->city_id = $city->city_name;
            $items[] = $cinema;
        }
        
        return $items;
    }
    
	public function attributeLabels () {
		return array(
			array ('title', 'Название')
		);
	}
}