const SwapBoard = new SwapBoardEnvironment();

window.sBoard = SwapBoard

jQuery(function($) {
	$('[data-swap-button]').on('click', function(e) {
		const form = $(this).parents('form')
		const formData = new URLSearchParams()
		const formScope = form.data('swap-form')
		const type = $(this).data('swap-button')
		const step = $(this).data('swap-step')

		for (const data of new FormData(form[0])) {
			formData.append(data[0], data[1]);
		}

		switch (type) {
			case 'popup-open':
			SwapBoard.triggerPopup(e, 'open');
			break;

			case 'popup-close':
			SwapBoard.triggerPopup(e, 'close');
			break;

			case 'next': case 'back':
			$(this)
			.parents('.dash-pop')
			.addClass('is-hidden')
			.siblings('.dash-pop[data-swap-step-id='+ step +']')
			.removeClass('is-hidden')

			SwapBoard.processMultiStep(formScope, formData)
			break;

			case 'finish':
			SwapBoard.processMultiStep(formScope, formData)
			SwapBoard.processFormData()
			break;
		}
	})
})