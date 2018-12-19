jQuery(function($) {
	$('[data-swap-add-row]').on('click', function() {
		if ($('[data-swap-row]').length <= 0) {
			const elm = '<div class="form-group" data-swap-row><input type="text" name="positions[]" class="sb-input-field" placeholder="Licensed Engineers" /></div>'
			$('[data-swap-row-wrap]').append(elm)
		} else {
			const clone = $('[data-swap-row]:first').clone()
			$('[data-swap-row-wrap]').append(clone)

			console.log('sdas', clone)
		}
	})
})