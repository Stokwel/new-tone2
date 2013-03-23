<?php
Yii::import('zii.widgets.CListView');

class ListView extends CListView
{
	public function run()
	{
		$this->registerClientScript();

		echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";

		$this->renderContent();
		$this->renderKeys();

		echo CHtml::closeTag($this->tagName);
	}
}