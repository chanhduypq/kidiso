<div class="evaluates index">
	<h2><?php echo __('Evaluates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_date'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_situation_before'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_situation_after'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_plan'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_compare_result'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluate_result'); ?></th>
			<th><?php echo $this->Paginator->sort('meter_accessability'); ?></th>
			<th><?php echo $this->Paginator->sort('is_data_recorded'); ?></th>
			<th><?php echo $this->Paginator->sort('data_record_mode'); ?></th>
			<th><?php echo $this->Paginator->sort('data_analysis_mode'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('is_data_reliable'); ?></th>
			<th><?php echo $this->Paginator->sort('pdca_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($evaluates as $evaluate): ?>
	<tr>
		<td><?php echo h($evaluate['Evaluate']['id']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['type']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_date']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_situation_before']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_situation_after']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_plan']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_compare_result']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['evaluate_result']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['meter_accessability']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['is_data_recorded']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['data_record_mode']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['data_analysis_mode']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['comment']); ?>&nbsp;</td>
		<td><?php echo h($evaluate['Evaluate']['is_data_reliable']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($evaluate['Pdca']['id'], array('controller' => 'pdcas', 'action' => 'view', $evaluate['Pdca']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $evaluate['Evaluate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $evaluate['Evaluate']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $evaluate['Evaluate']['id']), array(), __('Are you sure you want to delete # %s?', $evaluate['Evaluate']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Evaluate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
