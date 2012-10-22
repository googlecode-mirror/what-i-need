<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'level',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
