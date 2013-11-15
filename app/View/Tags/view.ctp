<div class="tags view">
<h2><?php echo __('Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tag Posts'), array('controller' => 'tag_posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag Post'), array('controller' => 'tag_posts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tag Posts'); ?></h3>
	<?php if (!empty($tag['TagPost'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Post Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tag['TagPost'] as $tagPost): ?>
		<tr>
			<td><?php echo $tagPost['id']; ?></td>
			<td><?php echo $tagPost['tag_id']; ?></td>
			<td><?php echo $tagPost['post_id']; ?></td>
			<td><?php echo $tagPost['created']; ?></td>
			<td><?php echo $tagPost['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tag_posts', 'action' => 'view', $tagPost['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tag_posts', 'action' => 'edit', $tagPost['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tag_posts', 'action' => 'delete', $tagPost['id']), null, __('Are you sure you want to delete # %s?', $tagPost['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag Post'), array('controller' => 'tag_posts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
