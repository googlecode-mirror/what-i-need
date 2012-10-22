<?php

if (User::model()->findByPk(Yii::app()->user->getId())->level=='admin')
// ADMIN
{
    $this->breadcrumbs=array(
            'Пользователи'=>array('User/manage'),
            $model->user_id=>array('view','id'=>$model->user_id),
            'Изменить',
    );

    $this->menu=array(
            array('label'=>'List User', 'url'=>array('index')),
            array('label'=>'Create User', 'url'=>array('create')),
            array('label'=>'View User', 'url'=>array('view', 'id'=>$model->user_id)),
            array('label'=>'Manage User', 'url'=>array('admin')),
    );
    
    $page_title="Смена пароля - Пользователь №".$model->user_id;
}
else
// REGULAR USER
{
    $this->breadcrumbs=array(
            'Личный кабинет'=>array('controlPanel/index'),
            'Личная информация',
    );
    
    $page_title="Смена пароля";
}
?>

<h1><?php echo $page_title; ?></h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
		<?php echo CHtml::label('Текущий пароль','User[old_password]'); ?>
		<?php echo CHtml::passwordField('User[old_password]','',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'User[old_password]'); ?>
	</div>

        <div class="row">
		<?php echo CHtml::label('Новый пароль','User[password]'); ?>
		<?php echo CHtml::passwordField('User[password]','',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'User[password]'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Подтверждение пароля','User[password_confirm]'); ?>
		<?php echo CHtml::passwordField('User[password_confirm]','',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'User[password_confirm]'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->