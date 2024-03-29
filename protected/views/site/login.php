<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';
$this->breadcrumbs=array(
	'Вход',
);
?>

<div class="row">
    <div class="large-12">
        <h1>Вход</h1>
    </div>
</div>
<div class="row">
    <div class="large-5 columns wrap-form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'enableClientValidation'=>true,
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
            ),
        )); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <div class="row">
                <?php echo $form->labelEx($model,'username'); ?>
                <?php echo $form->textField($model,'username'); ?>
                <?php //echo $form->error($model,'username'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model,'password'); ?>
                <?php echo $form->passwordField($model,'password'); ?>
                <?php //echo $form->error($model,'password'); ?>
            </div>

            <div class="row rememberMe">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $form->label($model,'rememberMe'); ?>
                <?php //echo $form->error($model,'rememberMe'); ?>
            </div>

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <button class="right">Отправить</button>
                </div>
            </div>
            <!--/.row-->

        <?php $this->endWidget(); ?>
    </div>
</div>
