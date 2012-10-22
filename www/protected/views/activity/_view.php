<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('activity_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->activity_id),array('view','id'=>$data->activity_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('make')); ?>:</b>
	<?php echo CHtml::encode($data->make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('what')); ?>:</b>
	<?php echo CHtml::encode($data->what); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('where')); ?>:</b>
	<?php echo CHtml::encode($data->where); ?>
	<br />


</div>