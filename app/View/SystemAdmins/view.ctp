<div class="systemAdmins view">
<h2><?php echo __('System Admin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($systemAdmin['SystemAdmin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System Username'); ?></dt>
		<dd>
			<?php echo h($systemAdmin['SystemAdmin']['system_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('System Password'); ?></dt>
		<dd>
			<?php echo h($systemAdmin['SystemAdmin']['system_password']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit System Admin'), array('action' => 'edit', $systemAdmin['SystemAdmin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete System Admin'), array('action' => 'delete', $systemAdmin['SystemAdmin']['id']), array(), __('Are you sure you want to delete # %s?', $systemAdmin['SystemAdmin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List System Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New System Admin'), array('action' => 'add')); ?> </li>
	</ul>
</div>
