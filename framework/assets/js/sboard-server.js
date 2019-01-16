window.sBoardServer = class SwapBoardServer {
	constructor() {
		this.action = 'sboardAJAX'
		this.url = sb_helpers.url + '?action=' + this.action
	}

	async send(data) {
		return await fetch(this.url, {
			method: 'POST',
			credentials: 'same-origin',
			body: data
		})
		.then(r => r.json())
		.catch(err => alert('Something went wrong: ' + err))
	}
}
