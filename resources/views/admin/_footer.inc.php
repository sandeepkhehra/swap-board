		<footer class="container bottom-footer bottom-footer--gray">
			<div class="row">
				<div class="col-md-12 flex flex-jc-sb">
					<small class="bottom-footer__text">Any problem? <a href="#">We can help</a></small>
					<a href="#term-use">Terms of Use</a>
					<div class="social-icons">
						<a href="javascript:void(0)" title="Facebook" class="fa fa-facebook"></a>
						<a href="javascript:void(0)" title="Twitter" class="fa fa-twitter"></a>
						<a href="javascript:void(0)" title="YouTube" class="fa fa-youtube-play"></a>
					</div>
				</div>
			</div>
		</footer>

		<script>
		window.sb_helpers = {
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
		}
		</script>

		<?php sboardCoreAssets('js', ['bootstrap.min.js', 'wow.min.css', 'sboard-server.js', 'global.js', 'app.js']); ?>
		<?php wp_footer(); ?>
	</body>
</html>