const SwapBoard = new window.sBoard;

jQuery(function($) {
	$('[data-swap-button]').on('click', function(e) {
		const form = $(this).parents('form')
		const formData = new FormData(form[0])
		const formScope = form.data('swap-form')
		const type = $(this).data('swap-button')
		const step = $(this).data('swap-step')
		const popType = $(this).data('swap-pop-type')
		const validator = SwapBoard.formDataValidator(formData, form[0])

		switch (type) {
			case 'popup-open':
				SwapBoard.triggerPopup(e, 'open', popType);
				break;

			case 'popup-close':
				SwapBoard.triggerPopup(e, 'close', popType);
				break;

			case 'check-company':
				if (validator.is === true) {
					SwapBoard.processMultiStep(formScope, formData).then(resp => {
						if (resp.type === 'success') {
							$(this)
								.parents('.dash-pop')
								.addClass('hidden')
								.siblings('.dash-pop[data-swap-step-id='+ step +']')
								.removeClass('hidden')

							$('[data-form-field]').each(function() {
								$(this).html( $('#' + $(this).attr('data-form-field')).val() )
							})
						}
					})
				}
				break;

			case 'step-back':
				$(this)
					.parents('.dash-pop')
					.addClass('hidden')
					.siblings('.dash-pop[data-swap-step-id='+ step +']')
					.removeClass('hidden')
				break

			case 'create-swap-user':
					if (validator.is === true) {
						SwapBoard.processMultiStep(formScope, formData).then(resp => {
							if (resp.type === 'success') {
								SwapBoard.processFormData()
							}
						})
					}
				break

			case 'login-user':
				if (validator.is === true) {
					SwapBoard.processMultiStep(formScope, formData).then(resp => {
						if (resp.type === 'success' && resp.redirect) {
							window.location.href = resp.redirect
						}
					})
				}
				break

			case 'create-invited':
				SwapBoard.processMultiStep(formScope, formData)
				break;

		}
	})
})