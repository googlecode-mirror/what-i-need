<?php
$this->breadcrumbs=array(
	'Активности'=>array('admin'),
	$model->activity_id,
);

$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
	array('label'=>'Изменить','url'=>array('update','id'=>$model->activity_id)),
	array('label'=>'Удалить','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->activity_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Все активности','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'activity_id',
		'author_id',
		'make',
		'what',
		'where',
	),
)); ?>
