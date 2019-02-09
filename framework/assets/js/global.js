class UsersJSModel {
	process(data) {
		return (new sBoardServer).send(data)
		.then(resp => {
			if (resp.type === 'error') {
				alert('Error: ' + resp.msg)
				return false
			} else {
				return resp.data
			}
		})
	}
}

class CompaniesJSModel {
	process(data) {
		return (new sBoardServer).send(data)
		.then(resp => {
			if (resp.type === 'error') {
				alert('Error: ' + resp.msg)
				return false
			}
			else if (resp.type === 'success' && resp.redirect) {
				window.location.href = resp.redirect
			}
		})
	}
}

window.sBoard = class SwapBoardEnvironment {
	constructor() {
		this.name = 'Swap Board'
		this.formData = []
		this.models = {
			user: new UsersJSModel,
			company: new CompaniesJSModel,
		}
	}

	triggerPopup(e, method, type) {
		e.preventDefault()
		const popClass = type

		if (method == 'open') {
			jQuery('[data-popup=' + popClass + ']').fadeIn(350)
		} else {
			jQuery(e.target).parents('[data-popup]').fadeOut(350)
		}
	}

	formDataValidator(formData, form) {
		let ret = {
			is: false,
			fields: []
		}

		for (const pair of formData.entries()) {
			const elm = form.querySelector('input[name="'+pair[0]+'"][required]')
			const errMsgElm = form.querySelector('[data-sb-form-field="' + pair[0] + '"]')

			if (errMsgElm) {
				errMsgElm.remove()
			}

			if ( elm ) {
				if (typeof elm !== 'undefined' && elm.value != '' ) {
					ret.is = true
				} else {
					ret.is = false
					elm.focus()

					if (errMsgElm === null) {
						jQuery('<p class="sb-input-field__error-msg" data-sb-form-field="' + pair[0] + '">This is a required field!</p>').insertAfter(jQuery('input[name="'+ pair[0] +'"]').parents('div.form-group'))
					}

					ret.fields.push(pair[0])
					break
				}
			}
		}

		return ret
	}

	processMultiStep(key, data) {
		this.formData[key] = data

		if ( key == 'userMeta' ) {
			return this.processFormData()
		} else {

			return (new sBoardServer).send(data)
			.then(resp => {
				if (resp.type === 'error') {
					alert('Error: ' + resp.msg)
					return false
				} else {
					return resp
				}
			})
		}

	}

	processFormData() {
		Object.keys(this.formData).map(k => {
			this.formData[k].set('sbAction', 'create')
		})

		const promise = this.models.user.process(this.formData.user)

		promise.then(id => {
			if ( id ) {
				this.formData.company.append('userID', id)
				this.models.company.process(this.formData.company)
			}
		})
	}
}
