<?php
	/* @var $this PageController */
	/* @var $model Page */

	$this->breadcrumbs = array(
		'Страницы' => array('index'),
		'Создание страницы',
	);

	$this->menu = $this->getModule()->generateMenu();
	$this->pageHeader = '<span class="icon-screen"></span>Создание страницы';
	$publicAdmin = $this->getModule()->resourcesBaseUrl;
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>