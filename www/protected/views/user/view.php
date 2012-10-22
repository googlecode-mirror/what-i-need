<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	$model->username,
);

/*
$this->menu=array(
	array('label'=>'List User','url'=>array('index')),
	array('label'=>'Create User','url'=>array('create')),
	array('label'=>'Update User','url'=>array('update','id'=>$model->user_id)),
	array('label'=>'Delete User','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User','url'=>array('admin')),
);
 *
 */
?>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'user_id',
		'level',
		'username',
		'password',
		'email',
	),
)); ?>
