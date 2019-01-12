<?php sboardInclude('landing._signupForm', compact( 'context' ) ); ?>
<?php sboardInclude('landing._loginForm'); ?>

<?php sboardCoreAssets('js', ['bootstrap.min.js', 'wow.min.css', 'sboard-server.js', 'global.js']); ?>
<?php wp_footer(); ?>

</body>
</html>