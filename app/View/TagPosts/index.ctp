<div class="tagPosts index">
	<h2><?php echo __('Tag Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tag_id'); ?></th>
			<th><?php echo $this->Paginator->sort('post_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tagPosts as $tagPost): ?>
	<tr>
		<td><?php echo h($tagPost['TagPost']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tagPost['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $tagPost['Tag']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tagPost['Post']['title'], array('controller' => 'posts', 'action' => 'view', $tagPost['Post']['id'])); ?>
		</td>
		<td><?php echo h($tagPost['TagPost']['created']); ?>&nbsp;</td>
		<td><?php echo h($tagPost['TagPost']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tagPost['TagPost']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tagPost['TagPost']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tagPost['TagPost']['id']), null, __('Are you sure you want to delete # %s?', $tagPost['TagPost']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tag Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
