<?php

class TyresController extends Controller
{
	public $layout='main';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions' => array('index','view'),
				'users' => array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users' => array('admin'),
			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
//	public function actionView($id)
//	{
//		$post = $this->loadModel($id);
//		$comment=$this->newComment($post);
//
//		$this->render('view',array(
//			'model'=>$post,
//			'comment'=>$comment,
//		));
//	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionCreate()
//	{
//		$model=new Post;
//		if(isset($_POST['Post']))
//		{
//			$model->attributes=$_POST['Post'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
//	public function actionUpdate()
//	{
//		$model=$this->loadModel();
//		if(isset($_POST['Post']))
//		{
//			$model->attributes=$_POST['Post'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->id));
//		}
//
//		$this->render('update',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
//	public function actionDelete()
//	{
//		if(Yii::app()->request->isPostRequest)
//		{
//			// we only allow deletion via POST request
//			$this->loadModel()->delete();
//
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//				$this->redirect(array('index'));
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Tyre', array(
			'pagination' => array(
				'pageSize' => 16,
			),
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
//	public function actionAdmin()
//	{
//		$model = new Post('search');
//		if(isset($_GET['Post']))
//			$model->attributes=$_GET['Post'];
//		$this->render('admin',array(
//			'model'=>$model,
//		));
//	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel($id)
	{
		$model = null;
		if (!empty($id)) {
			$model = Bus::model()->findByPk($id);
		}

		if (empty($id) || !isset($model)) {
			throw new CHttpException(404, 'Таких дисков не сущеуствует!');
		}

		return $model;
	}
}
