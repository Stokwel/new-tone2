<?php
/* @var $this TyresController */
/* @var $data Vendor */
?>

<?php
	$imagePath = Yii::getPathOfAlias('webroot.images.brands');
	if (is_file($imagePath.DIRECTORY_SEPARATOR.$data['vendor_url'].'.png')) :
?>
	<div class="img">
		<a href="#" title="Производитель: <?= $data['vendor_name'] ?>">
			<img src="/images/brands/<?= $data['vendor_url'] ?>.png" border="0" alt="<?= $data['vendor_name'] ?>">
		</a>
	</div>
<?php
	else :
?>
	<div class="img2">
		<a href="#" title="Производитель: <?= $data['vendor_name'] ?>">
			<span><?= $data['vendor_name'] ?></span>
		</a>
	</div>
<?php
	endif;
?>