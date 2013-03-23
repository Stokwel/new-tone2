<?php
	/* @var $this DefaultController */
	/* @var $page Page */

	$this->pageTitle = Yii::app()->name.' - '.$page->title;
	$this->description = $page->description;
	$this->keywords = $page->keywords;
?>

<div class="head"><h1><?= $page->name ?></h1></div>

<?= $page->content; ?>


