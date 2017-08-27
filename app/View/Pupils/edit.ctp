<div class="pupils form">
<?php echo $this->Form->create('Pupil'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pupil'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pupil_username');
		echo $this->Form->input('pupil_password');
		echo $this->Form->input('name');
		echo $this->Form->input('sex');
		echo $this->Form->input('family_member_no');
		echo $this->Form->input('class_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pupil.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Pupil.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pupils'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
