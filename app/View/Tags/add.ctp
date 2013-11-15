<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Add Tag'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tag Posts'), array('controller' => 'tag_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag Post'), array('controller' => 'tag_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
