<div class="instructors view">
<h2><?php echo __('Instructor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor Username'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instructor Password'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['instructor_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['birthday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($instructor['Instructor']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('School'); ?></dt>
		<dd>
			<?php echo $this->Html->link($instructor['School']['name'], array('controller' => 'schools', 'action' => 'view', $instructor['School']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Instructor'), array('action' => 'edit', $instructor['Instructor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Instructor'), array('action' => 'delete', $instructor['Instructor']['id']), array(), __('Are you sure you want to delete # %s?', $instructor['Instructor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Instructors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instructor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Classes'); ?></h3>
	<?php if (!empty($instructor['Classes'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('Instructor Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($instructor['Classes'] as $classes): ?>
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
