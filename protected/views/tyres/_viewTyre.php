<?php
	/* @var $this TyresController */
	/* @var $data Vendor */
	$imagePath = Yii::getPathOfAlias('webroot.images.brands');
?>

<div class="object">
	<div class="ob_head"><a href="#" title="<?= $data['model_name'] ?>"><?= $data['model_name'] ?></a></div>
	<div class="ob_foto">
		<a href="#" title="<?= $data['model_name'] ?>">
			<img src="<?= TyrePhoto::getPhotoUrl($data['photo_name']) ?>" border="0">
		</a>
	</div>
	<div class="ob_info">
<!--		<div class="ob_text">--><?//= $data->getAttributeLabel('model_year') ?><!--: <span>--><?//= $data->model_year ?><!--</span></div>-->
<!--		<div class="ob_text">--><?//= $data->getAttributeLabel('model_stud') ?><!--: <span>--><?//= $data->model_stud ?><!--</span></div>-->
<!--		<div class="ob_text">--><?//= $data->getAttributeLabel('model_green_flag') ?><!--: <span>--><?//= $data->model_green_flag ?><!--</span></div>-->
	</div>
	<div class="ob_button"><input type="submit" name="submit" class="submit2" value="Добавить в корзину"></div>
</div>