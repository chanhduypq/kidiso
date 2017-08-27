<div class="districts form">
<?php echo $this->Form->create('District'); ?>
	<fieldset>
		<legend><?php echo __('Edit District'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('city_name');
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('District.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('District.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Schools'), array('controller' => 'schools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New School'), array('controller' => 'schools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Admins'), array('controller' => 'sub_admins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Admin'), array('controller' => 'sub_admins', 'action' => 'add')); ?> </li>
	</ul>
</div>
