<?php
$this->breadcrumbs=array(
	'Все пользователи',
);

$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);

?>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'user_id',
		'level',
		'username',
		'password',
		'email',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
