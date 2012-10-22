<?php
$this->breadcrumbs=array(
	'Активности'=>array('admin'),
	$model->activity_id=>array('view','id'=>$model->activity_id),
	'Изменить',
);

/*
$this->menu=array(
	array('label'=>'List Activity','url'=>array('index')),
	array('label'=>'Create Activity','url'=>array('create')),
	array('label'=>'View Activity','url'=>array('view','id'=>$model->activity_id)),
	array('label'=>'Manage Activity','url'=>array('admin')),
);
 *
 */
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>