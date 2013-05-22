<?php
/* @var $this PageController */
/* @var $model Page */

	$this->breadcrumbs = array(
		'Страницы' => array('index'),
		'Изменение страницы: '.$model->name,
	);

	$this->menu = $this->getModule()->generateMenu();
	$this->pageHeader = '<span class="icon-screen"></span>Изменение страницы: '.$model->name;
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>