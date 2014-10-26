<?php
class RelationsController extends CController {
	public function actionSearch () {
        
        $criteria = new CDbCriteria();
        
        $criteria->select = "*";
        $params = array();
        
        if (!empty($_POST['start'])) {
            $criteria->addCondition("date >= :start");
            $params[":start"] = $_POST['start'];
        }
        
        if (!empty($_POST['end'])) {
            $criteria->addCondition("date <= :end");
            $params[":end"] = $_POST['end'];
        }
        
        $criteria->params = $params;
        
        $model = Relation::model()->findAll($criteria);
        
        $this->render("index", array("items" => $model));
	}
    
	/*
	* Добавление нового сеанса
	*/
	public function actionAdd () {
		$model = new Relation;

        if (!empty($_GET['cinema_id'])) {
            $cinema_id = intval($_GET['cinema_id']);
            $model->cinema_id = $cinema_id;
        }
        
		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];
            $model->_date = $_POST['add']['_date'];
            $model->_time = $_POST['add']['_time'];
            
			if ($model->validate()) {
				if ($model->save()) {
                    $this->redirect(
                        $this->createUrl("relations/add", array ("message" => "add_success"))
                    );
                } else {
                    $this->redirect(
                        $this->createUrl("relations/add", array ("message" => "add_error"))
                    );
                }
			} else {
                var_dump($model->_date);
            }
		}
		$this->render('add', array('model' => $model));
	}

	/*
	* Удаление элемента
	*/
	public function actionRemove ($id) {
		$model = Relation::model()->findByPK($id);
        $cinema_id = $model->cinema_id;
        
		if ($model->delete()) {
			$this->redirect(
                $this->createUrl("cinema/view", array ("id" => $cinema_id, "message" => "remove_success"))
            );
		} else {
			die('Не удалось удалить город.');
		}
	}

	/*
	* Просмотр элемента
	*/
	public function actionView ($id) {
		$model = Relation::model()->findByPK($id);

		$this->render('view', array('model' => $model));
	}
}