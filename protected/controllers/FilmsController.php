<?php
class FilmsController extends CController {
	public function actionSearch () {
        $criteria = new CDbCriteria();
        $criteria->select = "*";
        
        if (!empty($_POST['search']['query'])) {
            $criteria->addSearchCondition('title', $_POST['search']['query']);
        }
        
        $model = Film::model()->findAll( $criteria );
        $this->render("search/index", array("items" => $model));
	}

	/*
	* Добавление нового элемента
	*/
	public function actionAdd () {
		$model = new Film;

		if (isset ($_POST['add'])) {
			$model->attributes = $_POST['add'];

			if ($model->validate()) {
				if ($model->save()) {
                    $this->redirect(
                        $this->createUrl("films/search", array ("message" => "add_success"))
                    );
                }
			}
		}
		$this->render('add', array('model' => $model));
	}

    /*
	* Редактирование фильма
	*/
    
    public function actionEdit ($id) {
        
		$model = Film::model()->findByPK( $id );
        
        if (isset ($_POST['edit'])) {
			$model->attributes = $_POST['edit'];

			if ($model->validate()) {
				if($model->save()) {
                    $this->redirect(
                        $this->createUrl("films/search", array("message" => "edit_success"))
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
		$model = Film::model()->findByPK($id);

		if ($model->delete()) {
			$this->redirect(
                $this->createUrl("films/search", array ("message" => "remove_success"))
            );
		} else {
			die('Не удалось удалить фильм.');
		}
	}

	/*
	* Просмотр элемента
	*/
	public function actionView ($id) {
		$model = Film::model()->findByPK($id);

		$this->render('view', array('model' => $model));
	}

}