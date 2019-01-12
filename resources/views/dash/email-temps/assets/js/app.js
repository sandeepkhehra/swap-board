const SwapBoardServer = window.sBoardServer

jQuery(function($) {
	$('#tempID').on('change', function() {
		const tempID = $(this).val()
		const form = $(this).closest('form')

		if (tempID !== '') {
			const formData = new FormData()
			formData.append('action', 'sboardAJAX')
			formData.append('sbAction', 'loadTemplateData')
			formData.append('sbController', $(this).closest('form').find('input[name="sbController"]').val())
			formData.append('tempID', tempID)

			fetch(ajaxurl, {
				method: 'POST',
				credentials: 'same-origin',
				body: formData
			}).then(resp => resp.json())
			.then(r => {
				if (r.type === 'success') {
					$(form).append('<input type="hidden" value="'+ r.data.id +'" name="id">')
					$('input[name=subject]').val(r.data.subject)
					tinyMCE.get('content').setContent(r.data.content)
				}
			})
		}
	})
})