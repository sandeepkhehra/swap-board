<?php

$generalData = $this->getData();
$pages = sboardGetPostData('page');

?>

<div class="wrap">
	<h2><?php echo $this->title; ?></h2>
	<hr>

	<form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
		<?php sboardDefineFormAction('post', 'updateData', $this); ?>

		<table class="widefat striped">
			<tbody>
				<tr>
					<th>
						<label for="landing">Langing Page for <?php echo PLUGIN_LONG_NAME; ?></label>
					</th>
					<td>
						<select name="landing" id="landing">
							<option value="">Select a page</option>

							<?php foreach ($pages->posts as $page): ?>
								<option value="<?php echo $page->ID; ?>" <?php echo isset($generalData['landing']) && $generalData['landing'] == $page->ID ? 'selected' : ''; ?>><?php echo $page->post_title; ?></option>
							<?php endforeach; ?>

						</select>

						<?php if (isset($generalData['landing'])): ?>
							<a href="<?php echo get_page_link(PLUGIN_ADMIN_LAND_PAGE); ?>" target="_blank" class="button button-secondary">Preview</a>
						<?php endif; ?>
					</td>
				</tr>

				<tr>
					<th>
						<label for="userDash">Page for User Dashboard</label>
					</th>
					<td>
						<select name="userDash" id="userDash">
							<option value="">Select a page</option>

							<?php
							foreach ($pages->posts as $page): ?>
								<option value="<?php echo $page->ID; ?>" <?php echo isset($generalData['userDash']) && $generalData['userDash'] == $page->ID ? 'selected' : ''; ?>><?php echo $page->post_title; ?></option>
							<?php endforeach; ?>

						</select>

						<?php if (isset($generalData['landing'])): ?>
							<a href="<?php echo get_page_link(PLUGIN_ADMIN_DASH_PAGE); ?>" target="_blank" class="button button-secondary">Preview</a>
						<?php endif; ?>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"><button class="button-primary">Update</button></td>
				</tr>
			</tfoot>
		</table>
	</form>
</div>