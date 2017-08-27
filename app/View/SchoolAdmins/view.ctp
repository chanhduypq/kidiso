<div class="schoolAdmins view">
<h2><?php echo __('School Admin'); ?></h2>
	<dl>
		<dt><?php echo __('School Admin Email'); ?></dt>
		<dd>
			<?php echo h($schoolAdmin['SchoolAdmin']['school_admin_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School Admin Username'); ?></dt>
		<dd>
			<?php echo h($schoolAdmin['SchoolAdmin']['school_admin_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School Admin Password'); ?></dt>
		<dd>
			<?php echo h($schoolAdmin['SchoolAdmin']['school_admin_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School'); ?></dt>
		<dd>
			<?php echo $this->Html->link($schoolAdmin['School']['name'], array('controller' => 'schools', 'action' => 'view', $schoolAdmin['School']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit School Admin'), array('action' => 'edit', $schoolAdmin['SchoolAdmin']['school_admin_email'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete School Admin'), array('action' => 'delete', $schoolAdmin['SchoolAdmin']['school_admin_email']), array(), __('Are you sure you want to delete # %s?', $schoolAdmin['SchoolAdmin']['school_admin_email'])); ?> </li>
		<li><?php echo $this->Html->link(__('List School Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School Admin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
	</ul>
</div>
