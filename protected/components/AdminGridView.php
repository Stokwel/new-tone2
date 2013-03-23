<?php

Yii::import('zii.widgets.grid.CGridView');

class AdminGridView extends CGridView
{
    public $tableTitle = 'Table title'; 
    
    public function run()
    {
        $this->registerClientScript();
        
        echo '<div class="whead">'
            .'<h6>'.$this->tableTitle.'</h6>'
            .'<div class="clear"></div></div>';
        
        echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";

        $this->renderContent();
        $this->renderKeys();

        echo CHtml::closeTag($this->tagName);
    }    
}