<?php

class UserController extends Controller
{
	public $layout = 'main';
	public $defaultAction = 'login';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha' => array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
            'login' => array(
                'class' => 'application.modules.admin.modules.user.actions.LoginAction',
                'modulePath' => 'application.modules.admin.modules.user'
            ),
            'registration' => array(
                'class' => 'application.modules.admin.modules.user.actions.RegistrationAction',
                'modulePath' => 'application.modules.admin.modules.user'
            )
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error = Yii::app()->errorHandler->error) {
	    	if(Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			}
	    	else {
				$this->render('error', $error);
			}
	    }
    }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
