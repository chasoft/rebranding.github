$(document).ready(function () {
	/*TypeJS*/
	var typed;
	0 < $(".forPeople").length &&
		(typed = new Typed(".forPeople", {
			strings: lang.typed,
			smartBackspace: !0,
			startDelay: 1e3,
			typeSpeed: 80,
			backSpeed: 10,
			backDelay: 2000,
			loop: !0,
		}));

	/**
	 * Show Password
	 */
	$(".form-group a.passcode-switch").click(function (e) {
		e.preventDefault();
		var fg = $(this).parent();
		if ($(this).hasClass("is-shown")) {
			fg.find("input[name=password]").attr("type", "password");
			fg.find("input[name=cpassword]").attr("type", "password");
			fg.find("input[name=pass]").attr("type", "password");
			$(this).removeClass("is-shown");
		} else {
			fg.find("input[name=password]").attr("type", "text");
			fg.find("input[name=cpassword]").attr("type", "text");
			fg.find("input[name=pass]").attr("type", "text");
			$(this).addClass("is-shown");
		}
	});

	/**
	 * Pixels Form
	 */
	$("#type").on("change", function (t) {
		switch ((t.preventDefault(), $(".chosen-single span").text())) {
			case "Google Tag Manager":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ minlength: "5", type: "text" })
					.removeAttr("maxlength");
				break;
			case "Facebook":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ maxlength: "20", type: "number" })
					.removeAttr("minlength");
				break;
			case "Adwords":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ maxlength: "40", type: "text" })
					.removeAttr("minlength");
				break;
			case "LinkedIn":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ maxlength: "10", type: "text" })
					.removeAttr("minlength");
				break;
			case "Twitter":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ maxlength: "15", type: "text" })
					.removeAttr("minlength");
				break;
		}
	});

	// Price Table
	var monthly_price_table = $("#price_tables").find(".monthly");
	var yearly_price_table = $("#price_tables").find(".yearly");
	var lifetime_price_table = $("#price_tables").find(".lifetime");

	$(".switch-toggles").find(".monthly").addClass("active");
	$("#price_tables").find(".monthly").addClass("active");

	$(".switch-toggles")
		.find(".monthly")
		.on("click", function () {
			$(this).addClass("active");
			$(this).closest(".switch-toggles").removeClass("active");
			$(this).closest(".switch-toggles").removeClass("active2");
			$(this).siblings().removeClass("active");
			monthly_price_table.addClass("active");
			yearly_price_table.removeClass("active");
			lifetime_price_table.removeClass("active");
		});

	$(".switch-toggles")
		.find(".yearly")
		.on("click", function () {
			$(this).addClass("active");
			$(this).closest(".switch-toggles").addClass("active");
			$(this).closest(".switch-toggles").removeClass("active2");
			$(this).siblings().removeClass("active");
			yearly_price_table.addClass("active");
			monthly_price_table.removeClass("active");
			lifetime_price_table.removeClass("active");
		});

	$(".switch-toggles")
		.find(".lifetime")
		.on("click", function () {
			$(this).addClass("active");
			$(this).closest(".switch-toggles").addClass("active");
			$(this).closest(".switch-toggles").addClass("active2");
			$(this).siblings().removeClass("active");
			lifetime_price_table.addClass("active");
			yearly_price_table.removeClass("active");
			monthly_price_table.removeClass("active");
		});
});