<?php
	/* @var $this BusController */
	/* @var $dataProvider CActiveDataProvider */
?>

<!--<h1>Шины</h1>-->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
