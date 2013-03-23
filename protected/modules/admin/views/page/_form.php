<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
)); ?>

	<div class="nNote nWarning">
		<p class=>Поля со звездочкой (<span class="">*</span>) обязательны для заполнения.</p>
	</div>

	<?php
		$errors = $model->getErrors();
		if (!empty($errors)) :
	?>
		<div class="nNote nFailure">
			<p>
				<?php foreach ($errors as $key => $item) {
					if (is_array($item)) {
						foreach ($item as $index => $text) {
							echo $text.'<br />';
						}
					}
					else {
						echo $item.'<br />';
					}
				} ?>
			</p>
		</div>
	<?php
		endif;
	?>

	<div class="widget fluid">

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'isMain'); ?>
			</div>
			<div class="grid10 on_off">
				<div class="floatL mr10">
					<?= CHtml::activeCheckBox($model, 'isMain') ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'name'); ?>
			</div>
			<div class="grid10">
				<?php echo $form->textField($model,'name',array()); ?>
			</div>
			<?php echo $form->error($model,'name'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'url'); ?>
			</div>
			<div class="grid10">
				<?php echo $form->textField($model,'url',array()); ?>
			</div>
			<?php echo $form->error($model,'url'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model, 'content'); ?>
			</div>
			<div class="grid10">
				<?php $this->widget('ImperaviRedactorWidget', array(
					'model' => $model,
					'attribute' => 'content',
					'options' => array(
						'lang' => 'ru',
					),
				)); ?>
			</div>
			<?php echo $form->error($model, 'content'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'title'); ?>
			</div>
			<div class="grid10">
				<?php echo $form->textField($model,'title'); ?>
			</div>
			<?php echo $form->error($model,'title'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'description'); ?>
			</div>
			<div class="grid10">
				<?php echo $form->textArea($model,'description'); ?>
			</div>
			<?php echo $form->error($model,'description'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid2">
				<?php echo $form->labelEx($model,'keywords'); ?>
			</div>
			<div class="grid10">
				<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
			</div>
			<?php echo $form->error($model,'keywords'); ?>
			<div class="clear"></div>
		</div>

		<div class="formRow">
			<div class="grid12">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array(
					'class' => 'buttonL bGreen formSubmit'
				)); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->