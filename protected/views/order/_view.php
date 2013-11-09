<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_order')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_order), array('view', 'id'=>$data->id_order)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('i_need_to')); ?>:</b>
	<?php echo CHtml::encode($data->i_need_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_completion')); ?>:</b>
	<?php echo CHtml::encode($data->date_completion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_completion')); ?>:</b>
	<?php echo CHtml::encode($data->time_completion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_city')); ?>:</b>
	<?php echo CHtml::encode($data->id_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('metro')); ?>:</b>
	<?php echo CHtml::encode($data->metro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('i_willing_to_pay')); ?>:</b>
	<?php echo CHtml::encode($data->i_willing_to_pay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_buy_company')); ?>:</b>
	<?php echo CHtml::encode($data->price_buy_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_type_work')); ?>:</b>
	<?php echo CHtml::encode($data->id_type_work); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_referer')); ?>:</b>
	<?php echo CHtml::encode($data->url_referer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_create')); ?>:</b>
	<?php echo CHtml::encode($data->date_create); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_buy')); ?>:</b>
	<?php echo CHtml::encode($data->count_buy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>