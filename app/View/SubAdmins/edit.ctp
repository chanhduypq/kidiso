<div class="subAdmins form">
<?php echo $this->Form->create('SubAdmin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sub Admin'); ?></legend>
	<?php
		echo $this->Form->input('sub_admin_email');
		echo $this->Form->input('sub_admin_name');
		echo $this->Form->input('sub_admin_password');
		echo $this->Form->input('birthday');
		echo $this->Form->input('sex');
		echo $this->Form->input('district_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SubAdmin.sub_admin_email')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('SubAdmin.sub_admin_email'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sub Admins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
