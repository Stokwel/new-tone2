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
        $modules = CFileHelper::findFiles(__DIR__.'/modules', ['fileTypes' => ['json']]);
        $links = array();
        foreach ($modules as $item) {
            $params = CJSON::decode(file_get_contents($item));
            $links[] = ['label' => $params['title'], 'url' => Yii::app()->createUrl('/admin/'.$params['name'])];
        }

        return $links;
    }
}
