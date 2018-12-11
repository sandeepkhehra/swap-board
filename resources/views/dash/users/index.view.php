<?php

$users = $this->getAllUsers();

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php echo $this->title; ?></h1>
	<a href="" class="page-title-action">Add New User+</a>
	<hr>

	<table class="widefat striped">
		<tbody>
			<?php if (null !== $users && !empty($users)) : ?>

			<?php foreach ((array) $users as $user) : ?>
			<tr>
				<td><?php echo $user['name']; ?></td>
			</tr>
			<?php endforeach; ?>

			<?php else : ?>
			<tr>
				<td colspan="3">No user found.</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>