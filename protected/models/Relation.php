<?php
class Relation extends CActiveRecord {
	public $cinema_id = null;
    public $film_id = null;
    public $date_format = null;
    public $time = null;
    
    public $_date = null;
    public $_time = null;
    
    public $date = null;

	public static function model ($className=__CLASS__) {
		return parent::model ($className);
	}

	public function tableName () { return 'films_relations'; }

	public function primaryKey () { return 'id'; }

	public function rules () {
		return array(
			array ('cinema_id, film_id, date', 'required')
        );
	}
    
    public function beforeValidate() {
        $this->date = $this->_date . ' ' . $this->_time;
        return true;
    }
}