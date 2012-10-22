<?php

class ControlPanelController extends Controller {

	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('index'),
				'roles' => array('user', 'admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array(),
				'roles' => array('admin'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionAdmin_index() {
		$this->render('admin_index');
	}

	public function actionIndex() {
		if (User::model()->findByPk(Yii::app()->user->getId())->level == 'admin') {
			$this->render('admin_index');
		} else {
			$this->render('index');
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	  public function filters()
	  {
	  // return the filter configuration for this controller, e.g.:
	  return array(
	  'inlineFilterName',
	  array(
	  'class'=>'path.to.FilterClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }

	  public function actions()
	  {
	  // return external action classes, e.g.:
	  return array(
	  'action1'=>'path.to.ActionClass',
	  'action2'=>array(
	  'class'=>'path.to.AnotherActionClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }
	 */
}