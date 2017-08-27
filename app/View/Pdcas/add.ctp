<div class="pdcas form">
<?php echo $this->Form->create('Pdca'); ?>
	<fieldset>
		<legend><?php echo __('Add Pdca'); ?></legend>
	<?php
		echo $this->Form->input('plan_content');
		echo $this->Form->input('pupil_comment');
		echo $this->Form->input('created_date');
		echo $this->Form->input('pupil_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pdcas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pupils'), array('controller' => 'pupils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pupil'), array('controller' => 'pupils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluates'), array('controller' => 'evaluates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluate'), array('controller' => 'evaluates', 'action' => 'add')); ?> </li>
	</ul>
</div>
