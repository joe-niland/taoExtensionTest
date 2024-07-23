<?php
?>
<div class="main-container">
	<div class="ext-home-container ui-state-highlight">
		<h1><?= __('Users') ?></h1>
		<p><?= __('This page lists users') ?></p>
	</div>
	<div>
		<?php
		foreach (get_data('users') as $user) {
			echo '<div>';
			echo '<h2>' . $user->getUsername() . '</h2>';
			echo '<p>' . $user->getFirstName() . ' ' . $user->getLastName() . '</p>';
			echo '</div>';
		}
		?>
	</div>
</div>