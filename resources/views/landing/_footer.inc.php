<?php sboardInclude('landing._signupForm', compact( 'context' ) ); ?>
<?php sboardInclude('landing._loginForm'); ?>

<script>
window.sb_helpers = {
	url: "<?php echo admin_url('admin-ajax.php'); ?>",
}
</script>

<?php sboardCoreAssets('js', ['bootstrap.min.js', 'wow.min.css', 'sboard-server.js', 'global.js']); ?>
<?php wp_footer(); ?>

</body>
</html>