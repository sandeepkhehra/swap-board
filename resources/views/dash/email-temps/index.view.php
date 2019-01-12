<div class="wrap">
	<h1 class="wp-heading-inline"><?php echo $this->title; ?></h1>
	<hr>

	<div class="sb-wrap">
		<form action="<?php echo admin_url('admin-post.php'); ?>" method="POST">
			<?php sboardDefineFormAction('post', 'create', $this); ?>

			<table class="widefat striped">
				<thead>
					<tr>
						<th><h3>Select Email Template</h3></th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>
							<select name="tempID" id="tempID">
								<option value="">Select a template to edit</option>
								<option value="inviteUser">Invite User</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="text" name="subject" placeholder="Email Subject"></td>
					</tr>
					<tr>
						<td>
							<?php
								$args = [
									'tinymce' => [
										'toolbar1' => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo',
									]
								];

							wp_editor('', 'content', $args); ?>
						</td>
					</tr>
					<tr>
						<th><strong>Available Tags:</strong> <em>%customer_email%</em>, <em>%invite_link%</em></th>
					</tr>
				</tbody>

				<tfoot>
					<tr>
						<td><button type="submit" class="button-primary">Update</button></td>
					</tr>
				</tfoot>
			</table>
		</form>
	</div>

</div>