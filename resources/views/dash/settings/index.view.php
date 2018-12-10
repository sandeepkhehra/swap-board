<?php

$controller = $this->controller;
$pages = getPostData('page');

// echo "<pre>";
// print_r($this->getAllData());
// echo "</pre>";

?>

<div class="wrap">
	<h2><?php echo $this->title; ?></h2>
	<hr>

	<table class="widefat striped">
		<tbody>
			<tr>
				<th>
					<label for="userDash">Page for User Dashboard</label>
				</th>
				<td>
					<select name="userDash" id="userDash">
						<option value="">Select User Dashboard Page</option>

						<?php foreach ($pages->posts as $page): ?>
							<option value="<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></option>
						<?php endforeach; ?>

					</select>
				</td>
			</tr>
		</tbody>
	</table>
</div>