<?php
if (Yii::app()->user->isGuest):
	?>
<h2>Добро пожаловать в W?N</h2>
	<div>
Войди/зарегистрируйся и ты сможешь:

<br>1. Постоянно поддерживать связь..

<br>2. Сообщать свой статус в социальные...

<br>3. Привязывать активности к локациям...

<br>4. Получать рекомендованные активности...
	</div>

<?php endif; ?>


<?php
if (!Yii::app()->user->isGuest):
	?>
<!-- тут все активности, мы их не покажем никому
<h2>Все активности</h2>
<table width="100%">
<?php
$activities = ActivityUser::model()->findAll();
foreach ($activities as $activity):

	?>
	<tr>
		<td width="50" nowrap>
			<?php echo $activity->create_time; ?>
		</td>
		<td>
			<?php echo CHtml::link($activity->user->username, array("user/profile", "id" => $activity->user->user_id)); ?>:

			<?php echo $activity->activity->make; ?>
			<?php echo $activity->activity->what; ?>
			<?php echo $activity->activity->where; ?>

			<?php if (!Yii::app()->user->isGuest):
				echo CHtml::link("Я тоже!", array("activity/create", "activity_id" => $activity->activity_id));
			endif; ?>
		</td>
	</tr>
	<?
endforeach;
?>
</table>
-->

	<?php
	/** @var BootActiveForm $form */
	$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		'id' => 'userNewActivityForm',
		'action' => CHtml::normalizeUrl(array('activity/create')),
		'htmlOptions' => array('class' => 'well'),
			));
	?>

	<div>
		Я сейчас
	</div>
	<?php
	$qActs = Activity::model()->findAll();

	$act_options = CHtml::listData($qActs, 'activity_id', 'activityDesc');
	$act_options = array_merge(array('0' => ''), $act_options);

	echo $form->dropDownListRow($model, 'activity_id', $act_options, array('class' => 'span5'));
	?>
	<div>
		или
	</div>
	<?php echo $form->textFieldRow($model, 'make', array('class' => 'span3')); ?>
	<?php echo $form->textFieldRow($model, 'what', array('class' => 'span3')); ?>
	<?php echo $form->textFieldRow($model, 'where', array('class' => 'span3')); ?>
		<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType' => 'submit', 'icon' => 'forward', 'label' => 'Далее')); ?>
	<?php echo $form->textFieldRow($model, 'begin', array('class' => 'span3')); ?>
	<?php echo $form->textFieldRow($model, 'end', array('class' => 'span3')); ?>
	<?php echo $form->textFieldRow($model, 'additionalinfo', array('class' => 'span3')); ?>

	<div>
		<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType' => 'submit', 'icon' => 'plus', 'label' => 'Сохранить')); ?>
	</div>

	<?php $this->endWidget(); ?>


<h2>Мои активности</h2>
<table width="100%">
<?php
$criteria=new CDbCriteria();
//$criteria->join="LEFT JOIN activities ON t.user_id=activities.author_id ";
$criteria->condition="user_id=".Yii::app()->user->id;

$activities = ActivityUser::model()->findAll($criteria);
foreach ($activities as $activity):

	?>
	<tr>
		<td width="50" nowrap>
			<?php echo $activity->create_time; ?>
		</td>
		<td>
			<?php echo CHtml::link($activity->user->username, array("user/profile", "id" => $activity->user->user_id)); ?>:

			<?php echo $activity->activity->make; ?>
			<?php echo $activity->activity->what; ?>
			<?php echo $activity->activity->where; ?>

<!--			<?php if (!Yii::app()->user->isGuest):
				echo CHtml::link("Я тоже!", array("activity/create", "activity_id" => $activity->activity_id));
			endif; ?> -->
		</td>
	</tr>
	<?
endforeach;
?>
</table>





<?php endif; ?>
