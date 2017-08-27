<div class="schoolAdmins form">
<?php echo $this->Form->create('SchoolAdmin'); ?>
	<fieldset>
		<legend><?php echo __('Add School Admin'); ?></legend>
	<?php
		echo $this->Form->input('school_admin_username');
		echo $this->Form->input('school_admin_password');
		echo $this->Form->input('school_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List School Admins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
	</ul>
</div>
