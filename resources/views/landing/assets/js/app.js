jQuery(function($) {
	$('[data-swap-button]').on('click', function(e) {
		const type = $(this).data('swap-button')

		switch (type) {
			case 'popup-open':
			triggerPopup(e, 'open');
			break;

			case 'popup-close':
			triggerPopup(e, 'close');
			break;

			case 'next':
			$(this)
				.parents('.dash-pop')
				.addClass('is-hidden')
				.siblings('.dash-pop:first')
				.removeClass('is-hidden')

				const formData = $(this).parents('form').serializeArray()

				processMultiStep(formData)
			break;

			case 'back':
			$(this)
				.parents('.dash-pop')
				.addClass('is-hidden')
				.siblings('.dash-pop:first')
				.removeClass('is-hidden')
			break;

			case 'finish':
			$(this)
				.parents('.dash-pop')
				.addClass('is-hidden')
				.next('.dash-pop')
				.removeClass('is-hidden')
			break;
		}
	})
})

/**
 * Not sure about it.
 *
 * @param {object} formData
 */
function processMultiStep(formData)
{
	jQuery(formData).each(function(i, v) {
		jQuery('p[data-form-field="'+ v.name +'"]').html(v.value)
	})
}