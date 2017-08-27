<div class="schools view">
<h2><?php echo __('School'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($school['School']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School Username'); ?></dt>
		<dd>
			<?php echo h($school['School']['school_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School Password'); ?></dt>
		<dd>
			<?php echo h($school['School']['school_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($school['School']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($school['School']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel'); ?></dt>
		<dd>
			<?php echo h($school['School']['tel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax'); ?></dt>
		<dd>
			<?php echo h($school['School']['fax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($school['District']['id'], array('controller' => 'districts', 'action' => 'view', $school['District']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($school['School']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit School'), array('action' => 'edit', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete School'), array('action' => 'delete', $school['School']['id']), array(), __('Are you sure you want to delete # %s?', $school['School']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('controller' => 'instructors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Classes'); ?></h3>
	<?php if (!empty($school['Classes'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Instructor Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($school['Classes'] as $classes): ?>
		<tr>
			<td><?php echo $classes['id']; ?></td>
			<td><?php echo $classes['description']; ?></td>
			<td><?php echo $classes['school_id']; ?></td>
			<td><?php echo $classes['instructor_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'classes', 'action' => 'view', $classes['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'classes', 'action' => 'edit', $classes['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'classes', 'action' => 'delete', $classes['id']), array(), __('Are you sure you want to delete # %s?', $classes['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Instructors'); ?></h3>
	<?php if (!empty($school['Instructor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Instructor Username'); ?></th>
		<th><?php echo __('Instructor Password'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($school['Instructor'] as $instructor): ?>
		<tr>
			<td><?php echo $instructor['id']; ?></td>
			<td><?php echo $instructor['instructor_username']; ?></td>
			<td><?php echo $instructor['instructor_password']; ?></td>
			<td><?php echo $instructor['name']; ?></td>
			<td><?php echo $instructor['birthday']; ?></td>
			<td><?php echo $instructor['description']; ?></td>
			<td><?php echo $instructor['sex']; ?></td>
			<td><?php echo $instructor['email']; ?></td>
			<td><?php echo $instructor['school_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'instructors', 'action' => 'view', $instructor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'instructors', 'action' => 'edit', $instructor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'instructors', 'action' => 'delete', $instructor['id']), array(), __('Are you sure you want to delete # %s?', $instructor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Instructor'), array('controller' => 'instructors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
