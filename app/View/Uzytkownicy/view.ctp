<div class="uzytkownicy view">
<h2><?php  echo __('Uzytkownik'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uzytkownik['Uzytkownik']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rola'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uzytkownik['Rola']['id'], array('controller' => 'role', 'action' => 'view', $uzytkownik['Rola']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($uzytkownik['Uzytkownik']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Login'); ?></dt>
		<dd>
			<?php echo h($uzytkownik['Uzytkownik']['login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Haslo'); ?></dt>
		<dd>
			<?php echo h($uzytkownik['Uzytkownik']['haslo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($uzytkownik['Uzytkownik']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uzytkownik'), array('action' => 'edit', $uzytkownik['Uzytkownik']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uzytkownik'), array('action' => 'delete', $uzytkownik['Uzytkownik']['id']), null, __('Are you sure you want to delete # %s?', $uzytkownik['Uzytkownik']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uzytkownik'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Role'), array('controller' => 'role', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('controller' => 'role', 'action' => 'add')); ?> </li>
	</ul>
</div>
