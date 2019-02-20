const SwapBoard = new window.sBoard

jQuery(function($) {
	$('[data-swap-add-row]').on('click', function() {
		const type = $(this).data('swap-add-row')
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

	$( document ).on('click', '[data-swap-button]', function(e) {
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
						let _tempArr = []
						d.data.map(x => {
							console.log('s', x)
							_tempArr[x.id] = {
								description: x.description,
								position: x.position,
								location: x.location,
								type: x.type,
								date: x.date,
								end: x.endTime,
								start: x.startTime,
							}
							$('#findOfferTable tbody').append('<tr data-swap-button="review-offer" data-swap-pop-type="review-offer" data-offer-id="'+x.id+'"><td>' + x.position + '</td><td>' + x.location + '</td><td>' + x.date + '</td><td>' + x.startTime + ' &mdash; ' + x.endTime + '</td><td>' + x.type + '</td></tr>')
						})

						localStorage.setItem('__swapOffers', JSON.stringify(_tempArr))
					} else {
						$('#findOfferTable tbody').html('<tr><td colspan="5">No result found!</td></tr>')
					}
				})
				break
			case 'review-offer':
				const offers = localStorage.getItem('__swapOffers')
				const id = $(this).attr('data-offer-id')
				const offerData = JSON.parse(offers)[id]

				if ( ! offerData || typeof offerData === 'undefined' ) {
					alert('Error loading data')
					return
				}

				const offerDetails = $('<table><tbody><tr><td>Offer Type</td><td>Location</td></tr><tr><td>'+offerData.type+'</td><td>'+ offerData.location +'</td></tr><tr><td colspan="2">Start Time</td></tr><tr><td colspan="2">' + offerData.start + ', ' + offerData.date + '</td></tr></tbody></table>')

				$('[data-popup="review-offer"]').find('[data-offer-position]').html( offerData.position )
				$('[data-popup="review-offer"]').find('[data-offer-description]').html( offerData.description )
				$('[data-popup="review-offer"]').find('[data-offer-details]').html( offerDetails )
				$('[data-popup="review-offer"]').find('input[name="offerID"]').val(id)

				// console.log(offerData)

				SwapBoard.triggerPopup(e, 'open', popType);
				break

			case 'apply-offer':
				processFormData(formData)
				break

			case 'create-offer':
				processFormData(formData)
				break

			case 'accept-offer':
				processFormData(formData)
				break

			case 'decline-offer':
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
						$('div[data-popup="invitation"]').find('[data-inv-avatar]').find('img').attr('src',resp.data.meta_data.avatar)
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
						$('.active-chat').find('.conversation-holder').append(html)
						$('input[name="content"]').val('')
						scrollToBottom()
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

			case 'email-blast':
				processFormData(formData).then(resp => {
					if (resp.type == 'success') {
						processPayment( '[data-is-pp-btn]', resp.data.price, resp.data.id )
						SwapBoard.triggerPopup(e, 'open', 'email-blast');
					} else {
						alert(resp.msg);
					}
				})
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
				$('[data-chat-space]').find('.conversation-holder').html(resp.html.body)
				$('[data-chat-space]').attr('data-chat-space', clientID)
				$('[data-chat-option]').find('input[name="chatID"]').val(chatID)

				if ( ! $('#private-messages').is(':visible')) {
					$('#private-messages').removeClass('hidden');
					scrollToBottom()
					$('#private-messages').addClass('hidden');
				} else {
					scrollToBottom()
				}

				localStorage.removeItem('cacheCount')
			}
		})

	})

	/**
	 * Mark chat as read.
	 *
	 */
	$('[data-chat-option]').find('input[name="content"], .emoji-wysiwyg-editor').on('focus', function() {
		const content = $('.emoji-wysiwyg-editor').html()
		const chatID = $(this).siblings('input[name="chatID"]').val()
		const userID = $('[data-chat-space]').attr('data-chat-space')
		$('input[name="content"]').val( content )

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
					$('span[data-pop="messages"]').find('ul').remove()
					$('span[data-pop="messages"]').find('.shw-msg').html('<p>No messages!</p>')
				}
			})
		}
	})

	$( document ).on( 'keyup', '.emoji-wysiwyg-editor', function() {
		const content = $( this ).html()
		$( 'input[name="content"]' ).val( content )
	} )

	/**
	 * Send chat upon hitting the Enter key.
	 *
	 */
	$('[data-chat-option]').find('input[name="content"], .emoji-wysiwyg-editor').on('keydown', function(e) {
		if ( e.keyCode == 13 ) {
			$( this ).siblings( 'span[data-swap-button]' ).click()
			$( this ).html( '' )
			e.preventDefault()
		}
	})
})

function scrollToBottom() {
	const messageBody = document.querySelector('.active-chat')
	messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight
}

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
		formData.set('cacheCount', cacheCount)

		processFormData(formData).then(resp => {
			if (resp.cacheCount) {
				localStorage.setItem('cacheCount', resp.cacheCount)
			}
			if ( resp.hasChats === true ) {
				const _avatar = jQuery('.bubble.you:first').siblings('.img-chat').find('img').prop('src')
				resp.chats.map( c => {
					if ( jQuery('div[data-chat-content-id='+ c.id +']').length <= 0 ) {
						elm = '<div class="chat-bbl" data-chat-content-id="'+ c.id +'"><div class="img-chat"><img src="'+ _avatar +'" alt="user"></div><div class="bubble you">'+ c.content +'</div></div>'

						jQuery('.conversation-start').siblings('.conversation-holder').append(elm)
					}
				} )
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

function processPayment( elem, price, id )
{
	paypal.Button.render(
		{
			env: "sandbox",
			client: {
				sandbox: "AcMOZGEoWmg83yQIf2MufsSKs-gdvOdnQWtCUZP1Td9imokH5bysoL4a5SXpm3UeKLNDJ1P0aW3hxLzL",
				production: "As-zikyfmLySOA4c70aSRCZQkJuqA.fwELw1z2TtR3W-ebC.E8uLJeYA"
			},
			locale: "en_US",
			style: {
				size: "large",
				color: "black",
				shape: "rect"
			},

			commit: true,

			// Set up a payment
			payment: function(data, actions) {
				return actions.payment.create({
					transactions: [
						{
							amount: {
								total: price,
								currency: "USD"
							}
						}
					]
				})
			},
			// Execute the payment
			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function(resp) {
					const formData = new FormData;
					formData.append('action', 'sboardAJAX')
					formData.append('sbAction', 'saveTransactionData')
					formData.append('sbController', 'SwapBoard:Controllers:Admin:PlansController')
					formData.append('transactionData', JSON.stringify(resp))
					formData.append('planID', id)

					processFormData(formData).then(r => {
						window.alert("Thank you for your purchase!")
						location.reload()
					})
				})
			}
		},
		elem
	)

}