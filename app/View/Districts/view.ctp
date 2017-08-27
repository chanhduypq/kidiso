<div class="districts view">
<h2><?php echo __('District'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Name'); ?></dt>
		<dd>
			<?php echo h($district['District']['city_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($district['Country']['name'], array('controller' => 'countries', 'action' => 'view', $district['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District'), array('action' => 'edit', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete District'), array('action' => 'delete', $district['District']['id']), array(), __('Are you sure you want to delete # %s?', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Admins'), array('controller' => 'sub_admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Admin'), array('controller' => 'sub_admins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Schools'); ?></h3>
	<?php if (!empty($district['School'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('School Username'); ?></th>
		<th><?php echo __('School Password'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Tel'); ?></th>
		<th><?php echo __('Fax'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($district['School'] as $school): ?>
		<tr>
			<td><?php echo $school['id']; ?></td>
			<td><?php echo $school['school_username']; ?></td>
			<td><?php echo $school['school_password']; ?></td>
			<td><?php echo $school['name']; ?></td>
			<td><?php echo $school['address']; ?></td>
			<td><?php echo $school['tel']; ?></td>
			<td><?php echo $school['fax']; ?></td>
			<td><?php echo $school['district_id']; ?></td>
			<td><?php echo $school['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'schools', 'action' => 'view', $school['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'schools', 'action' => 'edit', $school['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'schools', 'action' => 'delete', $school['id']), array(), __('Are you sure you want to delete # %s?', $school['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sub Admins'); ?></h3>
	<?php if (!empty($district['SubAdmin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Sub Admin Email'); ?></th>
		<th><?php echo __('Sub Admin Name'); ?></th>
		<th><?php echo __('Sub Admin Password'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($district['SubAdmin'] as $subAdmin): ?>
		<tr>
			<td><?php echo $subAdmin['sub_admin_email']; ?></td>
			<td><?php echo $subAdmin['sub_admin_name']; ?></td>
			<td><?php echo $subAdmin['sub_admin_password']; ?></td>
			<td><?php echo $subAdmin['birthday']; ?></td>
			<td><?php echo $subAdmin['sex']; ?></td>
			<td><?php echo $subAdmin['district_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sub_admins', 'action' => 'view', $subAdmin['sub_admin_email'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sub_admins', 'action' => 'edit', $subAdmin['sub_admin_email'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sub_admins', 'action' => 'delete', $subAdmin['sub_admin_email']), array(), __('Are you sure you want to delete # %s?', $subAdmin['sub_admin_email'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sub Admin'), array('controller' => 'sub_admins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
