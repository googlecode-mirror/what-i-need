<?php
$this->breadcrumbs = array(
	$model->username,
);
?>

<h1><?php echo $model->username; ?></h1>
<br>

<?php
if (!Yii::app()->user->isGuest):
	// FRIENDSHIP
	if (!$model->isFriendWith(Yii::app()->user->getId())):
		$this->widget('bootstrap.widgets.BootButton', array(
			'label' => 'Добавить в друзья',
			'type' => 'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'htmlOptions' => array('id' => 'addFriendBtn'),
		));
	else:
		$this->widget('bootstrap.widgets.BootButton', array(
			'label' => 'Убрать из друзей',
			'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'htmlOptions' => array('id' => 'removeFriendBtn'),
		));
	endif;
	?>
	<br><br>

	<script type="text/javascript">
		$('#addFriendBtn').click(function() {
			window.location="<?php echo CHtml::normalizeUrl(array("user/addFriend", "id" => $model->user_id)) ?>"
		});

		$('#removeFriendBtn').click(function() {
			window.location="<?php echo CHtml::normalizeUrl(array("user/removeFriend", "id" => $model->user_id)) ?>"
		});
	</script>
	<?php
endif;
?>

<table width="100%">
	<?php
	$activities = $model->activities;
	foreach ($activities as $activity):
		?>
		<tr>
			<td width="50" nowrap>
				<?php echo $activity->create_time; ?>
			</td>
			<td>
				<?php echo $activity->activity->make; ?>
				<?php echo $activity->activity->what; ?>
				<?php echo $activity->activity->where; ?>

				<?php
				if (!Yii::app()->user->isGuest):
					echo CHtml::link("Я тоже!", array("activity/create", "activity_id" => $activity->activity_id));
				endif;
				?>
			</td>
		</tr>
		<?
	endforeach;
	?>
</table>
