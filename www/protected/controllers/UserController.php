<?php

class UserController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
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
			array('allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('view', 'profile'),
				'users' => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update','password','addFriend','removeFriend'),
				'roles' => array('user'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('create', 'admin', 'delete'),
				'roles' => array('admin'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionProfile($id) {
		$this->render('profile', array(
			'model' => $this->loadModel($id),
		));
	}


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->user_id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id = '') {
		if (Yii::app()->user->role == 'admin') {
			$model = $this->loadModel($id);
		} else {
			$model = $this->loadModel(Yii::app()->user->getId());
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->user_id));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionPassword($id='')
	{
                if (Yii::app()->user->role=='admin')
                {
                    $model=$this->loadModel($id);
                }
                else
                {
                    $model=$this->loadModel(Yii::app()->user->getId());
                }

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        //$model->attributes=$_POST['User'];
                        if ($model->password!=$_POST['User']['old_password'])
                        {
                            $model->addError('User[old_password]', 'Неверный текущий пароль.');
                        }

                        if ($_POST['User']['password']!=$_POST['User']['password_confirm'])
                        {
                            $model->addError('User[password_confirm]', 'Пароль и подтверждение пароля не совпадают.');
                        }

                        $model->password=$_POST['User']['password'];

			if(!$model->hasErrors() && $model->validate() && $model->save())
                        {
                            if ($model->isAdmin())
                            {
                                $this->redirect(array('view','id'=>$model->user_id));
                            }
                            else
                            {
                                $this->redirect(array('controlPanel/index'));
                            }

                        }
		}

		$this->render('password',array(
			'model'=>$model,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model = User::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAddFriend($id) {
		$friends=Friend::model()->findByAttributes(array('from_id' => $id, 'to_id' => Yii::app()->user->getId()));
		if ($friends==null)
		{
			$friends_rec=new Friend;
			$friends_rec->from_id=Yii::app()->user->getId();
			$friends_rec->to_id=$id;
			$friends_rec->save();

			$friends_rec=new Friend;
			$friends_rec->to_id=Yii::app()->user->getId();
			$friends_rec->from_id=$id;
			$friends_rec->save();
		}
		$this->redirect(array("user/profile", "id" => $id));
	}

	public function actionRemoveFriend($id) {
		$friends=Friend::model()->findByAttributes(array('from_id' => $id, 'to_id' => Yii::app()->user->getId()));
		$friends->delete();
		$friends=Friend::model()->findByAttributes(array('to_id' => $id, 'from_id' => Yii::app()->user->getId()));
		$friends->delete();
		$this->redirect(array("user/profile", "id" => $id));
	}
}
