<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
	'id' => 'activity-form',
	'enableAjaxValidation' => false,
		));
?>

<?php echo $form->errorSummary($model); ?>

<?php
$criteria = new CDbCriteria;
$criteria->select = "user_id, username";
$criteria->order = 'username';
$qUsers = User::model()->findAll($criteria);

echo $form->dropDownListRow($model, 'author_id', CHtml::listData($qUsers,'user_id','username'), array('class' => 'span5'));
?>

<?php echo $form->textFieldRow($model, 'make', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'what', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'where', array('class' => 'span5', 'maxlength' => 255)); ?>

<div class="form-actions">
	<?php
	$this->widget('bootstrap.widgets.BootButton', array(
		'buttonType' => 'submit',
		'type' => 'primary',
		'label' => $model->isNewRecord ? 'Создать' : 'Сохранить',
	));
	?>
</div>

<?php $this->endWidget(); ?>
