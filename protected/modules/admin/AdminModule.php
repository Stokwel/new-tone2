<?php

class AdminModule extends CWebModule
{
	public $resourcesBaseUrl = '';

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
			'admin.controllers.*',
		));

		Yii::app()->assetManager->forceCopy = true;
        $this->resourcesBaseUrl = Yii::app()->clientScript->
            registerPackage('admin')->getPackageBaseUrl('admin');
	}

	public function beforeControllerAction($controller, $action)
	{
		return parent::beforeControllerAction($controller, $action);
	}

    public function generateMenu()
    {
        return array(
			array('label'=>'Страницы', 'url'=>array('/admin/page')),
			array('label'=>'Диски', 'url'=>array('/admin/wheel')),
			array('label'=>'Шины', 'url'=>array('/admin/tyres')),
		);
    }
}
