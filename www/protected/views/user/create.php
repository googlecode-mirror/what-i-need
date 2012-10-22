<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Все пользователи','url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>