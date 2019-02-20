jQuery(function($) {
	$(".drop_dn").dropdown()
	$(".dropdown-menu").click(function(event) {
		event.stopPropagation()
	})

	$(".chat-notc").dropdown()
	$(".dropdown-menu").click(function(event) {
		event.stopPropagation()
	})

	$(".message-chat").dropdown()
	$(".dropdown-menu").click(function(event) {
		event.stopPropagation()
	})

	$(".sidebarCollapse").on("click", function() {
		$(".sidebar").toggleClass("active")
	})

	// Mobile Menu Toggle
	$("#configure").on("click", function(e) {
		$("#configurator-wrap").toggleClass("hidden-xs")
		e.preventDefault()
	})
	// Mobile Menu Toggle
	$("#dashbrd-clck").on("click", function(e) {
		$("#configurator-wrap").toggleClass("hidden-xs")
		e.preventDefault()
	})

	$(".tabs_div").each(function() {
		$(this)
			.children("a")
			.on("click", function(e) {
				const target = $(this).attr("href")
				$(".dashboard-tabwrp").hide()
				$(this)
					.parent()
					.addClass("active")
					.siblings("li")
					.removeClass("active")
				$("div" + target)
					.removeClass("hidden")
					.siblings("div.show-div")
					.addClass("hidden")

				e.preventDefault()
			})
	})
	$(".dashboardlist li").each(function() {
		$(this)
			.children("a")
			.on("click", function(e) {
				e.preventDefault()
				$(".dashboardlist li").removeClass("activeBold")
				const target = $(this).attr("href")
				$(this)
					.parent()
					.addClass("activeBold")
				$(".whirt-abnser").show()
				$("div" + target)
					.removeClass("hidden")
					.siblings("div.show-div")
					.addClass("hidden")
			})
	})

	jQuery(".clickable-row").click(function() {
		let siteurl = jQuery(this).data("href")
		window.location.href = siteurl
	})
})

// document.querySelector(".chat[data-chat=person2]").classList.add("active-chat")
// document.querySelector(".person[data-chat=person2]").classList.add("active")
