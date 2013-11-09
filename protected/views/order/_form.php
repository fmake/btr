<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'i_need_to'); ?>
		<?php echo $form->textField($model,'i_need_to',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'i_need_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_completion'); ?>
		<?php echo $form->textField($model,'date_completion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'date_completion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_completion'); ?>
		<?php echo $form->textField($model,'time_completion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'time_completion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_city'); ?>
		<?php echo $form->textField($model,'id_city'); ?>
		<?php echo $form->error($model,'id_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'metro'); ?>
		<?php echo $form->textField($model,'metro',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'metro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'i_willing_to_pay'); ?>
		<?php echo $form->textField($model,'i_willing_to_pay',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'i_willing_to_pay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_buy_company'); ?>
		<?php echo $form->textField($model,'price_buy_company',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'price_buy_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_type_work'); ?>
		<?php echo $form->textField($model,'id_type_work'); ?>
		<?php echo $form->error($model,'id_type_work'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_referer'); ?>
		<?php echo $form->textField($model,'url_referer',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_referer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_create'); ?>
		<?php echo $form->textField($model,'date_create'); ?>
		<?php echo $form->error($model,'date_create'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'count_buy'); ?>
		<?php echo $form->textField($model,'count_buy'); ?>
		<?php echo $form->error($model,'count_buy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->