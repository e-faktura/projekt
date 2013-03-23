<div class="role view">
<h2><?php  echo __('Rola'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rola['Rola']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($rola['Rola']['nazwa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rola'), array('action' => 'edit', $rola['Rola']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rola'), array('action' => 'delete', $rola['Rola']['id']), null, __('Are you sure you want to delete # %s?', $rola['Rola']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Role'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('controller' => 'uzytkownicy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uzytkownik'), array('controller' => 'uzytkownicy', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Uzytkownicy'); ?></h3>
	<?php if (!empty($rola['Uzytkownik'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Rola Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th><?php echo __('Login'); ?></th>
		<th><?php echo __('Haslo'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($rola['Uzytkownik'] as $uzytkownik): ?>
		<tr>
			<td><?php echo $uzytkownik['id']; ?></td>
			<td><?php echo $uzytkownik['rola_id']; ?></td>
			<td><?php echo $uzytkownik['nazwa']; ?></td>
			<td><?php echo $uzytkownik['login']; ?></td>
			<td><?php echo $uzytkownik['haslo']; ?></td>
			<td><?php echo $uzytkownik['email']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uzytkownicy', 'action' => 'view', $uzytkownik['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uzytkownicy', 'action' => 'edit', $uzytkownik['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uzytkownicy', 'action' => 'delete', $uzytkownik['id']), null, __('Are you sure you want to delete # %s?', $uzytkownik['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Uzytkownik'), array('controller' => 'uzytkownicy', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
