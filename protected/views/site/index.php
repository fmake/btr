<?php
/* @var $this SiteController */

$this->pageTitle="Форма заказа";
?>

<!--.row-->
<div class="row">
    <div class="large-12">
        <h1>Форма заказа</h1>
    </div>
</div>
<!--/.row-->
<div class="row">
    <div class="large-5 columns wrap-form">

        <?php if(Yii::app()->user->hasFlash('order_complete')): ?>

            <div class="flash-success">
                <?php echo Yii::app()->user->getFlash('order_complete'); ?>
            </div>

        <?php else: ?>

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'order-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
            )); ?>

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'i_need_to'); ?></label>
                        <?php echo $form->textField($order,'i_need_to',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'description'); ?></label>
                        <?php echo $form->textArea($order,'description',array('rows'=>6, 'cols'=>50)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-6 columns">
                        <label><?php echo $form->labelEx($order,'date_completion'); ?></label>
                        <?php echo $form->textField($order,'date_completion',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                    <div class="large-6 columns">
                        <label><?php echo $form->labelEx($order,'time_completion'); ?></label>
                        <?php echo $form->textField($order,'time_completion',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'address'); ?></label>
                        <?php echo $form->textField($order,'address',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-6 columns">
                        <label><?php echo $form->labelEx($order,'metro'); ?></label>
                        <?php echo $form->textField($order,'metro',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-6 columns">
                        <label><?php echo $form->labelEx($order,'i_willing_to_pay'); ?></label>
                        <?php echo $form->textField($order,'i_willing_to_pay',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'name'); ?></label>
                        <?php echo $form->textField($order,'name',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'email'); ?></label>
                        <?php echo $form->textField($order,'email',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->

                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <label><?php echo $form->labelEx($order,'phone'); ?></label>
                        <?php echo $form->textField($order,'phone',array('size'=>60,'maxlength'=>255)); ?>
                    </div>
                </div>
                <!--/.row-->
                <!--.row-->
                <div class="row">
                    <div class="large-12 columns">
                        <button class="right">Сделать заказ</button>
                    </div>
                </div>
                <!--/.row-->
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </div>
</div>
