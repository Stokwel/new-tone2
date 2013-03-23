<?php
	/* @var $this TyresController */
	/* @var $dataProvider CActiveDataProvider */
?>
<div class="head"><h1>Каталог дисков</h1></div>
<?php $this->widget('zii.widgets.CListView', array(
	'template' => ' {items}{pager}',
	'dataProvider' => $dataProvider,
	'itemView' => '_viewWheel',
	'pagerCssClass' => 'numbers',
	'pager' => array(
		'class' => 'application.components.Pager',
		'hiddenPageCssClass' => 'disable',
		'header' => '',
		'footer' => '',
		'firstPageLabel' => '',
		'prevPageLabel'  => '« Предыдущая',
		'previousPageCssClass' => '',
		'nextPageLabel'  => 'Следующая »',
		'nextPageCssClass' => '',
		'internalPageCssClass' => '',
		'lastPageLabel'  => '',
	),
	'itemsCssClass' => 'brends',
)); ?>
