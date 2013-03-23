<?php
/* @var $this TyresController */
/* @var $data Vendor */
?>

<?php
	$imagePath = Yii::getPathOfAlias('webroot.images.brands');
?>

<div class="object">
	<div class="ob_head"><a href="#" title="Название обьекта"> <?= $data['model_name'] ?></a></div>
	<div class="ob_foto">
		<a href="#" title="Название обьекта"><img src="" border="0"></a>
	</div>
	<div class="ob_info">
		<div class="ob_text">Характеристика: <span>Данные</span></div>
		<div class="ob_text">Свойство: <span>Данные</span></div>
		<div class="ob_text">Характеристика: <span>Когда данные будут ну очень длинными</span></div>
		<div class="ob_text">Свойство: <span>Данные</span></div>
		<div class="ob_text">Характеристика: <span>Данные</span></div>
		<div class="ob_text">Свойство: <span>Данные</span></div>
		<div class="ob_text">Характеристика: <span>Когда данные будут длинными</span></div>
		<div class="ob_text">Свойство: <span>Данные</span></div>
	</div>
	<div class="ob_button"><input type="submit" name="submit" class="submit2" value="Добавить в корзину"></div>
</div>