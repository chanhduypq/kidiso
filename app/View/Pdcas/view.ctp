<div class="pdcas view">
<h2><?php echo __('Pdca'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pdca['Pdca']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan Content'); ?></dt>
		<dd>
			<?php echo h($pdca['Pdca']['plan_content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pupil Comment'); ?></dt>
		<dd>
			<?php echo h($pdca['Pdca']['pupil_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($pdca['Pdca']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pupil'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pdca['Pupil']['name'], array('controller' => 'pupils', 'action' => 'view', $pdca['Pupil']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pdca'), array('action' => 'edit', $pdca['Pdca']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pdca'), array('action' => 'delete', $pdca['Pdca']['id']), array(), __('Are you sure you want to delete # %s?', $pdca['Pdca']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pupils'), array('controller' => 'pupils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pupil'), array('controller' => 'pupils', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluates'), array('controller' => 'evaluates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluate'), array('controller' => 'evaluates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Evaluates'); ?></h3>
	<?php if (!empty($pdca['Evaluate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Evaluate Date'); ?></th>
		<th><?php echo __('Evaluate Situation Before'); ?></th>
		<th><?php echo __('Evaluate Situation After'); ?></th>
		<th><?php echo __('Evaluate Plan'); ?></th>
		<th><?php echo __('Evaluate Compare Result'); ?></th>
		<th><?php echo __('Evaluate Result'); ?></th>
		<th><?php echo __('Meter Accessability'); ?></th>
		<th><?php echo __('Is Data Recorded'); ?></th>
		<th><?php echo __('Data Record Mode'); ?></th>
		<th><?php echo __('Data Analysis Mode'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Is Data Reliable'); ?></th>
		<th><?php echo __('Pdca Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pdca['Evaluate'] as $evaluate): ?>
		<tr>
			<td><?php echo $evaluate['id']; ?></td>
			<td><?php echo $evaluate['type']; ?></td>
			<td><?php echo $evaluate['evaluate_date']; ?></td>
			<td><?php echo $evaluate['evaluate_situation_before']; ?></td>
			<td><?php echo $evaluate['evaluate_situation_after']; ?></td>
			<td><?php echo $evaluate['evaluate_plan']; ?></td>
			<td><?php echo $evaluate['evaluate_compare_result']; ?></td>
			<td><?php echo $evaluate['evaluate_result']; ?></td>
			<td><?php echo $evaluate['meter_accessability']; ?></td>
			<td><?php echo $evaluate['is_data_recorded']; ?></td>
			<td><?php echo $evaluate['data_record_mode']; ?></td>
			<td><?php echo $evaluate['data_analysis_mode']; ?></td>
			<td><?php echo $evaluate['comment']; ?></td>
			<td><?php echo $evaluate['is_data_reliable']; ?></td>
			<td><?php echo $evaluate['pdca_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'evaluates', 'action' => 'view', $evaluate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'evaluates', 'action' => 'edit', $evaluate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'evaluates', 'action' => 'delete', $evaluate['id']), array(), __('Are you sure you want to delete # %s?', $evaluate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Evaluate'), array('controller' => 'evaluates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
