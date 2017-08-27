<div class="evaluates form">
<?php echo $this->Form->create('Evaluate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Evaluate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('evaluate_date');
		echo $this->Form->input('evaluate_situation_before');
		echo $this->Form->input('evaluate_situation_after');
		echo $this->Form->input('evaluate_plan');
		echo $this->Form->input('evaluate_compare_result');
		echo $this->Form->input('evaluate_result');
		echo $this->Form->input('meter_accessability');
		echo $this->Form->input('is_data_recorded');
		echo $this->Form->input('data_record_mode');
		echo $this->Form->input('data_analysis_mode');
		echo $this->Form->input('comment');
		echo $this->Form->input('is_data_reliable');
		echo $this->Form->input('pdca_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Evaluate.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Evaluate.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Evaluates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
