class UsersModel {
	process(data) {
		sBoardServer.send(data)
	}
}

class CompanyModel {
	process(data) {
		console.log('nake it comp', data)
	}
}

class SwapBoardEnvironment {
	constructor() {
		this.name = 'Swap Board'
		this.formData = []
		this.formKeys = [
			'user',
			'company',
			'userMeta',
		],
		this.models = {
			user: new UsersModel,
			company: new CompanyModel,
			userMeta: new UsersModel,
		}
	}

	get formData() {
		return this._formData
	}

	set formData(formData) {
		this._formData = formData
	}

	triggerPopup(e, method) {
		e.preventDefault()
		const popClass = 'popup'

		if (method == 'open') {
			jQuery('[data-popup=' + popClass + ']').fadeIn(350)
		} else {
			jQuery('[data-popup=' + popClass + ']').fadeOut(350)
		}
	}

	processMultiStep(key, data) {
		jQuery(data).each(function(i, v) {
			jQuery('[data-form-field="'+ v.name +'"]').html(v.value)
		})

		this.models[key].process(data)
		this.formData[key] = data
	}
}
