<div class="tagPosts view">
<h2><?php echo __('Tag Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tagPost['TagPost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagPost['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $tagPost['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagPost['Post']['title'], array('controller' => 'posts', 'action' => 'view', $tagPost['Post']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tagPost['TagPost']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tagPost['TagPost']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag Post'), array('action' => 'edit', $tagPost['TagPost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag Post'), array('action' => 'delete', $tagPost['TagPost']['id']), null, __('Are you sure you want to delete # %s?', $tagPost['TagPost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tag Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
