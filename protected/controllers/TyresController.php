<?php

class TyresController extends Controller
{
	public $layout='main';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * Displays a particular model.
	 */
	public function actionView($id)
	{
		$post = $this->loadModel($id);
		$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
//		$dataProvider = new CActiveDataProvider('Tyre', array(
//			'pagination' => array(
//				'pageSize' => 16,
//			),
//		));
		$search = array(
//			'vendor_id' => 6,
//			'size_profile' => 75
		);
		$dataProvider = Tyre::getTyreFullInfo($search);
//		$criteria = new CDbCriteria(array(
//			'with' => array(
//				'photo', 'size'
//			),
//		));

//		if(isset($_GET['tag']))
//			$criteria->addSearchCondition('tags',$_GET['tag']);

//		$dataProvider = new CActiveDataProvider('Tyre', array(
//			'pagination' => array(
//				'pageSize' => 6,
//			),
//			'criteria'=>$criteria,
//		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

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
