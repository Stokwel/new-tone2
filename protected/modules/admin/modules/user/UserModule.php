<?php

class UserModule extends CWebModule
{
	public $resourcesBaseUrl = '';

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'admin.modules.user.models.*',
			'admin.modules.user.controllers.*',
			'admin.modules.user.components.*',
		));

		/*Yii::app()->assetManager->forceCopy = true;
        $this->resourcesBaseUrl = Yii::app()->clientScript->
            registerPackage('admin')->getPackageBaseUrl('admin');*/
	}
}
