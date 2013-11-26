<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

?>
<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'Список заказов', 'url'=>array('/user/orders')),
        array('label'=>'Список купленных заказов', 'url'=>array('/user/ordersbuy'))
    ),
    'htmlOptions'=>array('class'=>'title-area'),
)); ?>
