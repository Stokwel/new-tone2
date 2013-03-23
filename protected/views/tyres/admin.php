<?php
/* @var $this PageController */
/* @var $model Page */

    $this->breadcrumbs=array(
        'Pages'=>array('index'),
        'Manage',
    );

    $this->menu = array(
        array('label'=>'List Page', 'url'=>array('index')),
        array('label'=>'Create Page', 'url'=>array('create')),
    );
    
    $this->pageHeader = '<span class="icon-screen"></span>Управление страницами';
?>

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


