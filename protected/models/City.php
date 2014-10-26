<?php
class City extends CActiveRecord {
	public $city_name = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'city'; }

	public function primaryKey () { return 'city_id'; }

	public function rules () {
		return array(
			array ('city_name', 'required'), 
			array ('city_name', 'length', 'min' => 3, 'max' => 40, ),
            
        );
	}

	public function attributeLabels () {
		return array(
			array ('city_name', 'Город')
		);
	}
    
    public function relations() {
        return array(
            'cinemates' => array(self::HAS_MANY, 'Cinema', 'city_id'),
        );
    }
}