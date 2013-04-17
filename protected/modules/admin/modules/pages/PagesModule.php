<?php

class PagesModule extends CWebModule
{
	public $resourcesBaseUrl = '';

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'admin.modules.pages.models.*',
			'admin.modules.pages.controllers.*',
			'admin.modules.pages.components.*',
            'admin.modules.pages.views.*',
		));
	}
}
