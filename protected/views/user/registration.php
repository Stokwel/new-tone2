<?php
$this->pageTitle=Yii::app()->name . ' - Registration';
$this->breadcrumbs=array(
	' Registration',
);
?>

<h1>Registration</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reg-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'nick'); ?>
		<?php echo $form->textField($model,'nick'); ?>
		<?php echo $form->error($model,'nick'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass'); ?>
		<?php echo $form->error($model,'pass'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'password2'); ?>
        <?php echo $form->passwordField($model,'password2'); ?>
        <?php echo $form->error($model,'password2'); ?>
    </div>

    <div class="row">
        <?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]')); ?>
        <?= $form->label($model, 'captcha'); ?>
        <?= $form->error($model,'captcha'); ?>

        <?=CHtml::activeTextField($model,'captcha'); ?>
    </div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Registration'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
