const SwapBoard = new window.sBoard;

jQuery(function($) {
	$('[data-swap-button]').on('click', function(e) {
		const form = $(this).parents('form')
		const formData = new FormData(form[0])
		const formScope = form.data('swap-form')
		const type = $(this).data('swap-button')
		const step = $(this).data('swap-step')
		const popType = $(this).data('swap-pop-type')

		switch (type) {
			case 'popup-open':
				SwapBoard.triggerPopup(e, 'open', popType);
				break;

			case 'popup-close':
				SwapBoard.triggerPopup(e, 'close', popType);
				break;

			case 'next': case 'back':
				let promise = Promise.resolve(true)

				if ( type == 'next' ) {
					promise = SwapBoard.processMultiStep(formScope, formData)
				}

				promise.then(resp => {
					if (resp) {
						$(this)
							.parents('.dash-pop')
							.addClass('is-hidden')
							.siblings('.dash-pop[data-swap-step-id='+ step +']')
							.removeClass('is-hidden')

						$('[data-form-field]').each(function() {
							$(this).html( $('#' + $(this).attr('data-form-field')).val() )
						})
					}
				})
				break;

			case 'finish':
				SwapBoard.processMultiStep(formScope, formData)
				break;
		}
	})
})