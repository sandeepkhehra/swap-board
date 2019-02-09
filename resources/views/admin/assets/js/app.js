const SwapBoard = new window.sBoard

jQuery(function($) {
	$('[data-swap-add-row]').on('click', function() {
		const type = $(this).data('swap-add-row')
		console.log('asds', type)
		const parent = $(this).siblings('[data-swap-row-wrap]')
		let elm = '<div class="form-group" data-swap-row><input type="text" name="'+ type +'[]" class="sb-input-field" placeholder="'+ (type[0].toUpperCase() +  type.slice(1)) +'" /><span class="sb-delete-row" data-swap-delete-row><i class="fa fa-trash-o" aria-hidden="true"></i></span></div>'

		if (parent.find('[data-swap-row]').length > 1) {
			elm = parent.find('[data-swap-row]:first').clone()
			elm.find('input').val('')
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

	/**
	 * Load first chat.
	 *
	 */
	setTimeout(function() {
		$('li[data-swap-chat]:first').click()
	}, 500)

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
						$('div[data-popup="invitation"]').find('input[name="id"]').val(resp.data.ID)

						if (resp.memberData.isMember == 1) {
							$('[data-member-form="resend"]').hide()
							$('[data-member-form="chat"]').show()
						} else {
							$('[data-member-form="resend"]').show()
							$('[data-member-form="chat"]').hide()
						}
						SwapBoard.triggerPopup(e, 'open', 'invitation');
					} else {
						alert(resp.msg);
					}
				})
				break

			case 'chat':
				processFormData(formData).then(resp => {
					if (resp.type === 'success') {
						location.reload()
					}
				})
				break

			case 'send-chat':
				processFormData(formData).then(resp => {
					if (resp.type === 'success') {
						let html = resp.html
						const avatar = $('.client-chat:first').find('.img-chat').find('img').attr('src')
						if (typeof avatar !== 'undefined') html = html.replace('src="#"', 'src="'+ avatar +'"')
						if ($('.active-chat').find('p').length > 0) $('.active-chat').find('p').remove()
						$('.active-chat').find('.flex').append(html)
						$('input[name="content"]').val('')
					}
				})
				break

			case 'update-meta':
				processFormData(formData).then(resp => {
					if (resp.type === 'success') {
						alert(resp.msg)
					}
				})

				break
		}
	})

	$('[data-swap-chat]').on('click', function() {
		if ($(this).hasClass('active')) return

		$(this).addClass('active').siblings('[data-swap-chat]').removeClass('active')
		const chatID = $(this).data('swap-chat')
		const clientID = $(this).data('client-id')
		const formData = new FormData;
		formData.append('action', 'sboardAJAX')
		formData.append('sbAction', 'viewChat')
		formData.append('sbController', 'SwapBoard:Controllers:Admin:ChatsController')
		formData.append('chatID', chatID)
		formData.append('clientID', clientID)

		processFormData(formData).then(resp => {
			if (resp.type === 'success') {
				$('[data-chat-space]').find('.conversation-start span').html(resp.html.header)
				$('[data-chat-space]').find('.flex').html(resp.html.body)
				$('[data-chat-space]').attr('data-chat-space', clientID)
				$('[data-chat-option]').find('input[name="chatID"]').val(chatID)
			}
		})

	})

	$('[data-chat-option]').find('input[name="content"]').on('focus', function() {
		const chatID = $(this).siblings('input[name="chatID"]').val()
		const userID = $('[data-chat-space]').attr('data-chat-space')

		if (typeof chatID !== 'undefined' && typeof userID !== 'undefined') {
			const formData = new FormData;
			formData.append('action', 'sboardAJAX')
			formData.append('sbAction', 'readChat')
			formData.append('sbController', 'SwapBoard:Controllers:Admin:ChatMessagesController')
			formData.append('chatID', chatID)
			formData.append('userID', userID)

			processFormData(formData).then(resp => {
				if (resp.type === 'success') {
					$('[data-client-id="'+ userID +'"]').find('.time').remove()
				}
			})
		}
	})
})

function checkChats( userID, interval = 15000 )
{
	const formData = new FormData;
	let cacheCount = localStorage.getItem('cacheCount') ? localStorage.getItem('cacheCount') : 0

	formData.append('action', 'sboardAJAX')
	formData.append('sbAction', 'fetchChats')
	formData.append('sbController', 'SwapBoard:Controllers:Admin:ChatsController')
	formData.append('userID', userID)

	setInterval(function() {
		cacheCount = localStorage.getItem('cacheCount') ? localStorage.getItem('cacheCount') : 0
		formData.append('cacheCount', cacheCount)

		processFormData(formData).then(resp => {
			if (resp.cacheCount) {
				localStorage.setItem('cacheCount', resp.cacheCount)
			}
		})
	}, interval)
}

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