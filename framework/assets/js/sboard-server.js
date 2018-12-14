window.sBoardServer = class SwapBoardServer {
	constructor() {
		this.action = 'sboardAJAX'
		this.url = window.top.ajaxurl + '?action=' + this.action
	}

	static async send(data) {
		const res = await fetch(this.url, {
			method: 'POST',
			credentials: 'same-origin',
			body: data
		});

		return res
	}
}
