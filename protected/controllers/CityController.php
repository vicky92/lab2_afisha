<?php
class CityController extends CController {
	public function actionSearch () {
        
        $model = City::model()->findAll();
        $this->render("search/index", array("items" => $model));
	}

	/*
	* Добавление нового элемента
	*/
	public function actionAdd () {
		$model = new City;

		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];

			if ($model->validate()) {
				if ($model->save()) {
                    $this->redirect(
                        $this->createUrl("cinema/search", array ("message" => "add_city_success"))
                    );
                }
			}
		}
		$this->render('add', array('model' => $model));
	}
    
    /*
	* Редактирование города
	*/
    
    public function actionEdit ($id) {
        $criteria = new CDbCriteria();
        
        $criteria->condition = "city_id = :id";
        $criteria->params = array(
            ":id" => $id
        );
        
		$model = City::model()->find( $criteria );
        
        if (isset ($_POST['edit'])) {
			$model->attributes = $_POST['edit'];

			if ($model->validate()) {
				if($model->save()) {
                    $this->redirect(
                        $this->createUrl("cinema/search", array("city" => $model->city_id, "message" => "edit_city_success"))
                    );
                }
			}
		}
        
		$this->render('edit', array('model' => $model));
	}

	/*
	* Удаление элемента
	*/
	public function actionRemove ($id) {
		$model = City::model()->findByPK($id);

		if ($model->delete()) {
			$this->redirect(
                $this->createUrl("cinema/search", array ("message" => "remove_city_success"))
            );
		} else {
			die('Не удалось удалить элемент.');
		}
	}
}