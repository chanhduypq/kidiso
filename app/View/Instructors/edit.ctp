<div class="instructors form">
<?php echo $this->Form->create('Instructor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Instructor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('instructor_username');
		echo $this->Form->input('instructor_password');
		echo $this->Form->input('name');
		echo $this->Form->input('birthday');
		echo $this->Form->input('description');
		echo $this->Form->input('sex');
		echo $this->Form->input('email');
		echo $this->Form->input('school_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Instructor.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Instructor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
	</ul>
</div>
