<div class="pdcas index">
	<h2><?php echo __('Pdcas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('plan_content'); ?></th>
			<th><?php echo $this->Paginator->sort('pupil_comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created_date'); ?></th>
			<th><?php echo $this->Paginator->sort('pupil_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pdcas as $pdca): ?>
	<tr>
		<td><?php echo h($pdca['Pdca']['id']); ?>&nbsp;</td>
		<td><?php echo h($pdca['Pdca']['plan_content']); ?>&nbsp;</td>
		<td><?php echo h($pdca['Pdca']['pupil_comment']); ?>&nbsp;</td>
		<td><?php echo h($pdca['Pdca']['created_date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pdca['Pupil']['name'], array('controller' => 'pupils', 'action' => 'view', $pdca['Pupil']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pdca['Pdca']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pdca['Pdca']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pdca['Pdca']['id']), array(), __('Are you sure you want to delete # %s?', $pdca['Pdca']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pdca'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pupils'), array('controller' => 'pupils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pupil'), array('controller' => 'pupils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluates'), array('controller' => 'evaluates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluate'), array('controller' => 'evaluates', 'action' => 'add')); ?> </li>
	</ul>
</div>
