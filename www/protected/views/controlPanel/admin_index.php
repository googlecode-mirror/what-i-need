<?php
$this->breadcrumbs=array(
	'Панель управления'=>array('/controlPanel'),
);

$this->pageTitle=Yii::app()->name." - Панель управления";
?>

<p>
    <?php echo CHtml::link('Пользователи',array('User/admin')); ?>
    <br>
    <?php echo CHtml::link('Активности',array('activity/admin')); ?>
    <br>
</p>
