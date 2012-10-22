<?php
$this->breadcrumbs=array(
	'Активности'=>array('admin'),
);

$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);

?>

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'activity-grid',
	'dataProvider'=>$model->search(),
//	'filter'=>$model,
	'columns'=>array(
		'activity_id',
		'author_id',
		'make',
		'what',
		'where',
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
