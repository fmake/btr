<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);
/*
$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
*/
?>


<!--.row-->
<div class="row">
    <div class="large-12">
        <h1>Пользователь : </h1>
    </div>
</div>
<!--/.row-->

<!--.row-->
<div class="row">
    <div class="large-3 columns box-shadow bg-nav">
        <ul>
            <li><a href="#">Редактировать заказ</a></li>
            <li><a href="#">Сортировка заказов</a></li>
            <li><a href="#">Управление системой</a></li>
            <li><a href="#">Удаление пользователей</a></li>
            <li><a href="#">Добавление заказа</a></li>
            <li><a href="#">Посмотреть все заказы</a></li>
            <li><a href="#">Информация о заказе</a></li>
            <li><a href="#">Удаление пользователей</a></li>
            <li><a href="#">Сортировка заказов</a></li>
            <li><a href="#">Посмотреть все заказы</a></li>
            <li><a href="#">Информация о заказе</a></li>
        </ul>
    </div>

    <div class="large-8 columns">
        <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'login',
                'name',
                'date',
                'date_create',
                'balance',
            ),
        )); ?>
    </div>
</div>
<!--/.row-->


