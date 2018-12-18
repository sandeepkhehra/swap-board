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

class UsersMetaJSModel {
	process(data) {
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

class CompaniesJSModel {
	process(data) {
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

	triggerPopup(e, method, type) {
		e.preventDefault()
		const popClass = type

		if (method == 'open') {
			jQuery('[data-popup=' + popClass + ']').fadeIn(350)
		} else {
			jQuery(e.target).parents('[data-popup]').fadeOut(350)
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
		})

		const promise = this.models.user.process(this.formData.user)

		promise.then(id => {
			if ( id ) {
				this.formData.company.append('userID', id)
				this.formData.userMeta.append('userID', id)

				this.models.company.process(this.formData.company)
				this.models.userMeta.process(this.formData.userMeta)
			}
		})
	}
}
