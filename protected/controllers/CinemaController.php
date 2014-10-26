<?php
class CinemaController extends CController {
	public function actionSearch () {
        
        // Зададим условия поиска
        $criteria = new CDbCriteria();
        $criteria->select = "*";
            
        // Массив значений для поиска
        $params = array();
        
        if (!empty($_GET['city'])) {
            $criteria->addCondition("city_id=:city", "AND");
            $params[':city'] = intval( $_GET['city'] );
            $criteria->params = $params;
        }
        
        if (!empty($_POST['search']['query'])) {
            $criteria->addSearchCondition('title', $_POST['search']['query']);
        }
        
        
        
        // Найдем все кинотеатры удовлетворяющие критериям поиска
        $model = Cinema::model()->findAll( $criteria );
        
        $this->render("search/index", array("items" => $model));
	}

    /*
    * Добавление нового элемента
    */
    
	public function actionAdd () {
		$model = new Cinema;

		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];

			if ($model->validate()) {
				if($model->save()) {
                    $this->redirect(
                        $this->createUrl("cinema/view", array ("id" => $model->id, "message" => "add_success"))
                    );
                }
			}
		}
		$this->render('add', array('model' => $model));
	}

    
	/*
	* Удаление элемента
	*/
    
	public function actionRemove ($id) {
		$model = Cinema::model()->findByPK($id);

		if ($model->delete()) {
			$this->redirect(
                $this->createUrl("cinema/search", array ("message" => "remove_success"))
            );
		} else {
			die('Не удалось удалить элемент.');
		}
	}
    
    
    /*
	* Редактирование Кинотеатра
	*/
    
    public function actionEdit ($id) {
		$model = Cinema::model()->findByPK($id);
        
        if (isset ($_POST['edit'])) {
			$model->attributes = $_POST['edit'];

			if ($model->validate()) {
				if($model->save()) {
                    $this->redirect(
                        $this->createUrl("cinema/view", array ("id" => $id, "message" => "edit_success"))
                    );
                }
			}
		}
        
		$this->render('edit', array('model' => $model));
	}
    
    
	/*
	* Просмотр элемента
	*/
    
	public function actionView ($id) {
		$model = Cinema::model()->findByPK($id);

		$this->render('view', array('model' => $model));
	}

}