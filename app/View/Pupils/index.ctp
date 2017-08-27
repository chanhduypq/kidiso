<div class="pupils index">
	<h2><?php echo __('Pupils'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('pupil_username'); ?></th>
			<th><?php echo $this->Paginator->sort('pupil_password'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('family_member_no'); ?></th>
			<th><?php echo $this->Paginator->sort('class_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pupils as $pupil): ?>
	<tr>
		<td><?php echo h($pupil['Pupil']['id']); ?>&nbsp;</td>
		<td><?php echo h($pupil['Pupil']['pupil_username']); ?>&nbsp;</td>
		<td><?php echo h($pupil['Pupil']['pupil_password']); ?>&nbsp;</td>
		<td><?php echo h($pupil['Pupil']['name']); ?>&nbsp;</td>
		<td><?php echo h($pupil['Pupil']['sex']); ?>&nbsp;</td>
		<td><?php echo h($pupil['Pupil']['family_member_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pupil['Classes']['id'], array('controller' => 'classes', 'action' => 'view', $pupil['Classes']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pupil['Pupil']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pupil['Pupil']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pupil['Pupil']['id']), array(), __('Are you sure you want to delete # %s?', $pupil['Pupil']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Pupil'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
