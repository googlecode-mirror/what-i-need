<?php
$this->breadcrumbs=array(
	'Активности'=>array('admin'),
	'Новая активность',
);

?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>