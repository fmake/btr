<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Login',
);
?>

<!--.row-->
<div class="row">
    <div class="large-12">
        <h1>Форма добавления фирмы</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="large-5 columns wrap-form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>

        <?php //echo $form->errorSummary($user); ?>
        <?php //echo $form->errorSummary($company); ?>

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($user,'login'); ?></label>
                <?php echo $form->textField($user,'login',array('size'=>60,'maxlength'=>255)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($user,'password'); ?></label>
                <?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>255)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($company,'name'); ?></label>
                <?php echo $form->textField($company,'name',array('size'=>60,'maxlength'=>255)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($company,'url'); ?></label>
                <?php echo $form->textField($company,'url',array('size'=>60,'maxlength'=>255)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($company,'phone'); ?></label>
                <?php echo $form->textField($company,'phone',array('size'=>60,'maxlength'=>255)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->

        <!--.row-->
        <div class="row">
            <div class="large-12 columns">
                <label><?php echo $form->labelEx($company,'description'); ?></label>
                <?php echo $form->textArea($company,'description',array('rows'=>6, 'cols'=>50)); ?>
                <?php /*echo $form->error($user,'login'); */?>
            </div>
        </div>
        <!--/.row-->



        <div class="row buttons">
            <?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
        </div>

        <?php $this->endWidget(); ?>
        <?/*?>
        <form method="post" action="/">

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>Название фирмы</label>
                    <input type="text">
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>Сайт</label>
                    <input type="text">
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>Телефон</label>
                    <input type="text">
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>E-mail</label>
                    <input type="text">
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>Загрузите лого</label>
                    <input type="text">
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <label>Описание</label>
                    <textarea></textarea>
                </div>
            </div>
            <!--/.row-->

            <!--.row-->
            <div class="row">
                <div class="large-12 columns">
                    <button class="right">Добавить фирму</button>
                </div>
            </div>
            <!--/.row-->
        </form>
        <?*/?>
    </div>
</div>