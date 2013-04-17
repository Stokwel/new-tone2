<?php

class RegistrationAction extends CAction
{
	public $modulePath = 'application.modules.user';

	public function run()
	{
        Yii::app()->setImport(array(
            $this->modulePath.'.models.*',
            $this->modulePath.'.components.*',
        ));

        if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH) {
            throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");
        }

        $model = new User;
        $model->scenario = 'reg';

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='reg-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        $modelClass = get_class($model);

        // collect user input data
        if (isset($_POST[$modelClass])) {
            $model->attributes = $_POST[$modelClass];
            if ($model->save()) {
                die('Ура');
            }
        }

        // display the login form
        $this->getController()->render('registration', array(
            'model' => $model
        ));
	}
}
