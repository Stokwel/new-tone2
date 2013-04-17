<?php
	/* @var $this PageController */
	/* @var $model Page */

    $this->breadcrumbs = array(
        'Страницы' => array('index'),
        'Управление',
    );

    $this->menu = $this->getModule()->parentModule->generateMenu();
    $this->pageHeader = '<span class="icon-screen"></span>Управление страницами';
	$publicAdmin = $this->getModule()->resourcesBaseUrl;
?>

<div class="mt15">
	<a href="<?= $this->createUrl('create')?>" class="buttonM bBrown">
		<span class="icol-add"></span>
		<span>Создать страницу</span>
	</a>
</div>

<div class="widget">
    <?php $this->widget('application.components.AdminGridView', array(
        'id' => 'page-grid',
        'dataProvider'=> $model->search(),
        'template' => '{items}{pager}',
        'itemsCssClass' => 'tDefault fullwidth',
        'cssFile' => '',
        'columns' => array(
            'name',
            'title',
            'description',
            'keywords',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
        'htmlOptions' => array(
        ),
    )); ?>    
</div>


