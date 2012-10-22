<?php
$this->breadcrumbs=array(
	'Activities',
);

$this->menu=array(
	array('label'=>'Create Activity','url'=>array('create')),
	array('label'=>'Manage Activity','url'=>array('admin')),
);
?>

<h1>Activities</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
