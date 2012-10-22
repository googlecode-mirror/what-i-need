<?php
$this->breadcrumbs=array(
	'Личный кабинет',
);

$this->pageTitle=Yii::app()->name." - Личный кабинет";
?>
<p>
    <?php echo CHtml::link('Личная информация',array('User/update')); ?>
    <br>
    <?php echo CHtml::link('Сменить пароль',array('User/password')); ?>
    <br>
</p>