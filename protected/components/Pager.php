<?php
Yii::import('zii.widgets.CListView');

class Pager extends CLinkPager
{
	protected function createPageButton($label,$page,$class,$hidden,$selected)
	{
		if($hidden || $selected)
			$class.=' '.($hidden ? $this->hiddenPageCssClass : $this->selectedPageCssClass);
		return CHtml::link($label,$this->createPageUrl($page));
	}

	public function run()
	{
		$this->registerClientScript();
		$buttons = $this->createPageButtons();

		if (empty($buttons)) {
			return;
		}

		echo $this->header;
		echo implode("\n", $buttons);
		echo $this->footer;
	}
}