<?php

class LoginAction extends CAction
{
	public $modulePath = 'application.modules.user';

	public function run()
	{
        $controller = $this->getController();

        Yii::app()->setImport(array(
            $this->modulePath.'.models.*',
            $this->modulePath.'.components.*',
        ));

        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
            throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
        }

        if (!Yii::app()->user->isGuest) {
            if (Yii::app()->user->nick == 'admin') {
                $controller->redirect(Yii::app()->createUrl('admin'));
            }
        }

        $model = new User;
        $model->scenario = 'login';

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        $modelClass = get_class($model);

        // collect user input data
        if (isset($_POST[$modelClass])) {
            $model->attributes = $_POST[$modelClass];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if ($model->nick == 'admin') {
                    $controller->redirect(Yii::app()->createUrl('admin'));
                }
            }
        }

        // display the login form
        $this->getController()->render('login', array(
            'model' => $model
        ));
	}
}
