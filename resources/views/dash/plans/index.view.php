<?php
$allPlans = $this->all();
?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php echo $this->title; ?></h1>
	<span class="page-title-action">Add New Plan+</span>
	<hr>

	<div class="sb-wrap">
		<h2>Add New <?php echo $this->title; ?> <span class="wp-toggle-panel">&times;</span></h2>

		<form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
			<?php sboardDefineFormAction('post', 'create', $this); ?>

			<table class="widefat striped">
				<tbody>
					<tr>
						<th>Plan Name</th>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<th>Plan Price</th>
						<td><input type="text" name="price"></td>
					</tr>
					<tr>
						<th>Plan Description</th>
						<td><textarea name="description" placeholder="Plan description"></textarea></td>
					</tr>
				</tbody>
				<tfoot>
					<tr><td colspan="2"><button type="submit" class="button-primary">Submit</button></td></tr>
				</tfoot>
			</table>
		</form>
	</div>

	<h2>Available <?php echo $this->title; ?></h2>
	<table class="widefat striped">
		<thead>
			<tr>
				<th>Plan Name</th>
				<th>Plan Price</th>
				<th>Plan Description</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if ( ! empty( $allPlans ) ) :
				foreach ( $allPlans as $plan ) : ?>
				<tr>
					<td><?php echo $plan->name; ?></td>
					<td><?php echo $plan->price; ?></td>
					<td><?php echo sboardTruncStr( $plan->description, 100 ); ?></td>
					<td>
						<button class="button-secondary">Edit</button>
						<button class="button-secondary sb-button-danger" style="background: firebrick;
    color: #fff;
    border-color: #7d1818;
    box-shadow: 0 1px 0 #7d1818;
">Delete</button>
					</td>
				</tr>
			<?php endforeach;
			 else: ?>
			<tr><td colspan="4">Nothing found!</td></tr>
			<?php endif; ?>
		</tbody>
	</table>

</div>