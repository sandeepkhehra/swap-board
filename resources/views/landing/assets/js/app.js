const SwapBoard = new SwapBoardEnvironment();

window.sBoard = SwapBoard

jQuery(function($) {
	$('[data-swap-button]').on('click', function(e) {
		const form = $(this).parents('form')
		const formData = new FormData(form[0])
		const formScope = form.data('swap-form')
		const type = $(this).data('swap-button')
		const step = $(this).data('swap-step')

		switch (type) {
			case 'popup-open':
			SwapBoard.triggerPopup(e, 'open');
			break;

			case 'popup-close':
				SwapBoard.triggerPopup(e, 'close');
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

						jQuery(formData).each(function(i, v) {
							jQuery('[data-form-field="'+ v.name +'"]').html(v.value)
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