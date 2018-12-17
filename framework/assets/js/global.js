class UsersJSModel {
	process(data) {
		return (new sBoardServer).send(data)
		.then(resp => {
			console.log('sadsad', resp)
			if (resp.type === 'error') {
				alert('Error: ' + resp.msg)
				return false
			} else {
				return true
			}
		})
	}
}

class UsersMetaJSModel {
	process(data) {
		return (new sBoardServer).send(data)
		.then(resp => {
			console.log('sadsad', resp)
			if (resp.type === 'error') {
				alert('Error: ' + resp.msg)
				return false
			} else {
				return true
			}
		})
	}
}

class CompaniesJSModel {
	process(data) {
		return (new sBoardServer).send(data)
		.then(resp => {
			console.log('sadsad', resp)
			if (resp.type === 'error') {
				alert('Error: ' + resp.msg)
				return false
			} else {
				return true
			}
		})
	}
}

class SwapBoardEnvironment {
	constructor() {
		this.name = 'Swap Board'
		this.formData = []
		this.models = {
			user: new UsersJSModel,
			company: new CompaniesJSModel,
			userMeta: new UsersMetaJSModel,
		}
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
					return true
				}
			})
		}

	}

	processFormData() {
		Object.keys(this.formData).map(k => {
			this.formData[k].set('sbAction', 'create')
			this.models[k].process(this.formData[k])
		})
	}
}
