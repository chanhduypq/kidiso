<div class="subAdmins view">
<h2><?php echo __('Sub Admin'); ?></h2>
	<dl>
		<dt><?php echo __('Sub Admin Email'); ?></dt>
		<dd>
			<?php echo h($subAdmin['SubAdmin']['sub_admin_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Admin Name'); ?></dt>
		<dd>
			<?php echo h($subAdmin['SubAdmin']['sub_admin_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Admin Password'); ?></dt>
		<dd>
			<?php echo h($subAdmin['SubAdmin']['sub_admin_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($subAdmin['SubAdmin']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($subAdmin['SubAdmin']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subAdmin['District']['id'], array('controller' => 'districts', 'action' => 'view', $subAdmin['District']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sub Admin'), array('action' => 'edit', $subAdmin['SubAdmin']['sub_admin_email'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sub Admin'), array('action' => 'delete', $subAdmin['SubAdmin']['sub_admin_email']), array(), __('Are you sure you want to delete # %s?', $subAdmin['SubAdmin']['sub_admin_email'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Admins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Admin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
