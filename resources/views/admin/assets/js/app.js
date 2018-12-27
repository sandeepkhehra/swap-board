const SwapBoard = new window.sBoard

jQuery(function($) {
	$('[data-swap-add-row]').on('click', function() {
		const type = $(this).data('swap-add-row')
		const parent = $(this).siblings('[data-swap-row-wrap]')
		let elm = '<div class="form-group" data-swap-row><input type="text" name="'+ type +'[]" class="sb-input-field" placeholder="'+ (type[0].toUpperCase() +  type.slice(1)) +'" /><span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span></div>'

		if (parent.find('[data-swap-row]').length > 1) {
			elm = $('[data-swap-row]:first').clone()
		}

		parent.append(elm)
	})

	$('body').on('click', '[data-swap-delete-row]', function() {
		$(this).parents('[data-swap-row]').remove()
	})

	$('[data-swap-button]').on('click', function(e) {
		e.preventDefault()
		const $this = $(this)
		const form = $this.closest('form')
		const formData = new FormData(form[0])
		const formScope = form.data('swap-form')
		const type = $this.data('swap-button')
		const step = $this.data('swap-step')
		const popType = $this.data('swap-pop-type')

		switch (type) {
			case 'popup-open':
				SwapBoard.triggerPopup(e, 'open', popType);
				break

			case 'popup-close':
				SwapBoard.triggerPopup(e, 'close', popType);
				break

			case 'update':
				processFormData(formData)
				break

			case 'create-offer':
				processFormData(formData)
				break

			case 'invite-members':
				processFormData(formData)
				break

			case 'resend-invite':
				processFormData(formData)
				break

			case 'delete':
				if (confirm('Are you sure? All the related data will be deleted too!')) {
					const promise = processFormData(formData)

					if (promise) {
						$this.parents('tr').css('background-color', 'red').fadeOut('slow', function() {
							$this.parents('tr').remove()
						})
					}
				}
				break

			case 'finish':
				SwapBoard.processMultiStep(formScope, formData)
				break;
		}
	})
})

function processFormData(formData) {
	return (new sBoardServer).send(formData)
	.then(resp => {
		if (resp.type === 'error') {
			alert('Error: ' + resp.msg)
			return false
		}
		return true
	})
}