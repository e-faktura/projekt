<div class="ustawienia view">
<h2><?php  echo __('Ustawienie'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ustawienie['Ustawienie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($ustawienie['Ustawienie']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wartosc'); ?></dt>
		<dd>
			<?php echo h($ustawienie['Ustawienie']['wartosc']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ustawienie'), array('action' => 'edit', $ustawienie['Ustawienie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ustawienie'), array('action' => 'delete', $ustawienie['Ustawienie']['id']), null, __('Are you sure you want to delete # %s?', $ustawienie['Ustawienie']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ustawienia'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ustawienie'), array('action' => 'add')); ?> </li>
	</ul>
</div>
