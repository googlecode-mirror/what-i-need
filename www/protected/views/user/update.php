<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('admin'),
	$model->username=>array('view','id'=>$model->user_id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Все пользователи','url'=>array('admin')),
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>