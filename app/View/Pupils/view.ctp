<div class="pupils view">
<h2><?php echo __('Pupil'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pupil Username'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['pupil_username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pupil Password'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['pupil_password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Family Member No'); ?></dt>
		<dd>
			<?php echo h($pupil['Pupil']['family_member_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classes'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pupil['Classes']['id'], array('controller' => 'classes', 'action' => 'view', $pupil['Classes']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pupil'), array('action' => 'edit', $pupil['Pupil']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pupil'), array('action' => 'delete', $pupil['Pupil']['id']), array(), __('Are you sure you want to delete # %s?', $pupil['Pupil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pupils'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pupil'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classes'), array('controller' => 'classes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classes'), array('controller' => 'classes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pdcas'), array('controller' => 'pdcas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pdca'), array('controller' => 'pdcas', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Pdcas'); ?></h3>
	<?php if (!empty($pupil['Pdca'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $pupil['Pdca']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Plan Content'); ?></dt>
		<dd>
	<?php echo $pupil['Pdca']['plan_content']; ?>
&nbsp;</dd>
		<dt><?php echo __('Pupil Comment'); ?></dt>
		<dd>
	<?php echo $pupil['Pdca']['pupil_comment']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
	<?php echo $pupil['Pdca']['created_date']; ?>
&nbsp;</dd>
		<dt><?php echo __('Pupil Id'); ?></dt>
		<dd>
	<?php echo $pupil['Pdca']['pupil_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Pdca'), array('controller' => 'pdcas', 'action' => 'edit', $pupil['Pdca']['id'])); ?></li>
			</ul>
		</div>
	</div>
	