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

	$('.tbntabs').on('click', function(e) {
		e.preventDefault()
		const target = $(this).attr('href')
		$(this).parent().addClass('active').siblings().removeClass('active')

		$('div' + target)
			.removeClass('hidden')
			.siblings('div')
			.addClass('hidden')
	})

	$('[data-swap-button]').on('click', function(e) {
		e.preventDefault()
		const $this = $(this)
		const form = $this.closest('form')
		const formData = new FormData(form[0])
		const type = $this.data('swap-button')
		const popType = $this.data('swap-pop-type')

		switch (type) {
			case 'popup-open':
				SwapBoard.triggerPopup(e, 'open', popType);
				break

			case 'popup-close':
				SwapBoard.triggerPopup(e, 'close', popType);
				break

			case 'update':
				processFormData(formData).then(resp => resp.type === 'success' ? location.reload() : '')
				break

			case 'find-offers':
				const promise = processFormData(formData)
				$('#findOfferTable tbody').find('tr:first').remove()
				promise.then(d => {
					if (d.data != '') {
						d.data.map(x => {
							$('#findOfferTable tbody').append('<tr><td>' + x.position + '</td><td>' + x.location + '</td><td>' + x.date + '</td><td>' + x.startTime + ' &mdash; ' + x.endTime + '</td><td>' + x.type + '</td></tr>')
						})
					} else {
						$('#findOfferTable tbody').html('<tr><td colspan="5">No result found!</td></tr>')
					}
				})
				break

			case 'create-offer':
				processFormData(formData)
				break

			case 'delete-offer':
				if (confirm('Are you sure? All the related data will be deleted too!')) {
					const promise = processFormData(formData)

					if (promise) {
						$this.parents('tr').css('background-color', 'red').fadeOut('slow', function() {
							$this.parents('tr').remove()
						})
					}
				}
				break

			case 'invite-members':
				processFormData(formData).then(resp => resp.type === 'success' ? alert(resp.msg) : console.log('oops, check code'))
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

			case 'create-invited':
				processFormData(formData)
				break

			case 'user-details':
				processFormData(formData).then(resp => {
					if (resp.type == 'success') {
						$('div[data-popup="invitation"]').find('[data-inv-name]').html(resp.data.display_name)
						$('div[data-popup="invitation"]').find('[data-inv-pos]').html(resp.data.meta_data.invPosition)
						$('div[data-popup="invitation"]').find('[data-inv-email]').html(resp.data.user_email)
						$('div[data-popup="invitation"]').find('[data-inv-desc]').html(resp.data.description)
						SwapBoard.triggerPopup(e, 'open', 'invitation');
					} else {
						alert(resp.msg);
					}
				})
				break
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
		return resp
	})
}