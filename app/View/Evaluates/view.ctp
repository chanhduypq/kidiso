<div class="evaluates view">
<h2><?php echo __('Evaluate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Date'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Situation Before'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_situation_before']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Situation After'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_situation_after']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Plan'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_plan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Compare Result'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_compare_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluate Result'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['evaluate_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meter Accessability'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['meter_accessability']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Data Recorded'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['is_data_recorded']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Record Mode'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['data_record_mode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Analysis Mode'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['data_analysis_mode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Data Reliable'); ?></dt>
		<dd>
			<?php echo h($evaluate['Evaluate']['is_data_reliable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pdca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($evaluate['Pdca']['id'], array('controller' => 'pdcas', 'action' => 'view', $evaluate['Pdca']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Evaluate'), array('action' => 'edit', $evaluate['Evaluate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Evaluate'), array('action' => 'delete', $evaluate['Evaluate']['id']), array(), __('Are you sure you want to delete # %s?', $evaluate['Evaluate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Evaluates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Evaluate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
