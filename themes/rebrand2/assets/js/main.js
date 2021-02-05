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
			backDelay: 800,
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

	//Tooltip
	$('[data-toggle="tooltip"]').tooltip();

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
			case "AdRoll":
			case "Quora":
				$("#pixelsform > div > div:nth-child(3) > input")
					.attr({ maxlength: "40", type: "text" })
					.removeAttr("minlength");
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

//Tooltip.min.js
!(function (f) {
	"use strict";
	function n(t, e) {
		(this.type = this.options = this.enabled = this.timeout = this.hoverState = this.$element = null),
			this.init("tooltip", t, e);
	}
	(n.DEFAULTS = {
		animation: !0,
		placement: "top",
		selector: !1,
		template:
			'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
		trigger: "hover focus",
		title: "",
		delay: 0,
		html: !1,
		container: !1,
	}),
		(n.prototype.init = function (t, e, o) {
			(this.enabled = !0),
				(this.type = t),
				(this.$element = f(e)),
				(this.options = this.getOptions(o));
			for (var i = this.options.trigger.split(" "), n = i.length; n--;) {
				var s,
					r = i[n];
				"click" == r
					? this.$element.on(
						"click." + this.type,
						this.options.selector,
						f.proxy(this.toggle, this)
					)
					: "manual" != r &&
					((s = "hover" == r ? "mouseenter" : "focusin"),
						(r = "hover" == r ? "mouseleave" : "focusout"),
						this.$element.on(
							s + "." + this.type,
							this.options.selector,
							f.proxy(this.enter, this)
						),
						this.$element.on(
							r + "." + this.type,
							this.options.selector,
							f.proxy(this.leave, this)
						));
			}
			this.options.selector
				? (this._options = f.extend({}, this.options, {
					trigger: "manual",
					selector: "",
				}))
				: this.fixTitle();
		}),
		(n.prototype.getDefaults = function () {
			return n.DEFAULTS;
		}),
		(n.prototype.getOptions = function (t) {
			return (
				(t = f.extend({}, this.getDefaults(), this.$element.data(), t)).delay &&
				"number" == typeof t.delay &&
				(t.delay = { show: t.delay, hide: t.delay }),
				t
			);
		}),
		(n.prototype.getDelegateOptions = function () {
			var o = {},
				i = this.getDefaults();
			return (
				this._options &&
				f.each(this._options, function (t, e) {
					i[t] != e && (o[t] = e);
				}),
				o
			);
		}),
		(n.prototype.enter = function (t) {
			var e =
				t instanceof this.constructor
					? t
					: f(t.currentTarget)
					[this.type](this.getDelegateOptions())
						.data("bs." + this.type);
			if (
				(clearTimeout(e.timeout),
					(e.hoverState = "in"),
					!e.options.delay || !e.options.delay.show)
			)
				return e.show();
			e.timeout = setTimeout(function () {
				"in" == e.hoverState && e.show();
			}, e.options.delay.show);
		}),
		(n.prototype.leave = function (t) {
			var e =
				t instanceof this.constructor
					? t
					: f(t.currentTarget)
					[this.type](this.getDelegateOptions())
						.data("bs." + this.type);
			if (
				(clearTimeout(e.timeout),
					(e.hoverState = "out"),
					!e.options.delay || !e.options.delay.hide)
			)
				return e.hide();
			e.timeout = setTimeout(function () {
				"out" == e.hoverState && e.hide();
			}, e.options.delay.hide);
		}),
		(n.prototype.show = function () {
			var t,
				e,
				o,
				i,
				n,
				s,
				r,
				p,
				h,
				l,
				a = f.Event("show.bs." + this.type);
			this.hasContent() &&
				this.enabled &&
				(this.$element.trigger(a),
					a.isDefaultPrevented() ||
					((e = (t = this).tip()),
						this.setContent(),
						this.options.animation && e.addClass("fade"),
						(l =
							"function" == typeof this.options.placement
								? this.options.placement.call(this, e[0], this.$element[0])
								: this.options.placement),
						(r = (s = /\s?auto?\s?/i).test(l)) && (l = l.replace(s, "") || "top"),
						e.detach().css({ top: 0, left: 0, display: "block" }).addClass(l),
						this.options.container
							? e.appendTo(this.options.container)
							: e.insertAfter(this.$element),
						(o = this.getPosition()),
						(i = e[0].offsetWidth),
						(h = e[0].offsetHeight),
						r &&
						((p = this.$element.parent()),
							(n = l),
							(a = document.documentElement.scrollTop || document.body.scrollTop),
							(s =
								"body" == this.options.container
									? window.innerWidth
									: p.outerWidth()),
							(r =
								"body" == this.options.container
									? window.innerHeight
									: p.outerHeight()),
							(p = "body" == this.options.container ? 0 : p.offset().left),
							(l =
								"bottom" == l && o.top + o.height + h - a > r
									? "top"
									: "top" == l && o.top - a - h < 0
										? "bottom"
										: "right" == l && o.right + i > s
											? "left"
											: "left" == l && o.left - i < p
												? "right"
												: l),
							e.removeClass(n).addClass(l)),
						(h = this.getCalculatedOffset(l, o, i, h)),
						this.applyPlacement(h, l),
						(this.hoverState = null),
						(l = function () {
							t.$element.trigger("shown.bs." + t.type);
						}),
						f.support.transition && this.$tip.hasClass("fade")
							? e.one(f.support.transition.end, l).emulateTransitionEnd(150)
							: l()));
		}),
		(n.prototype.applyPlacement = function (t, e) {
			var o,
				i = this.tip(),
				n = i[0].offsetWidth,
				s = i[0].offsetHeight,
				r = parseInt(i.css("margin-top"), 10),
				p = parseInt(i.css("margin-left"), 10);
			isNaN(r) && (r = 0),
				isNaN(p) && (p = 0),
				(t.top = t.top + r),
				(t.left = t.left + p),
				f.offset.setOffset(
					i[0],
					f.extend(
						{
							using: function (t) {
								i.css({ top: Math.round(t.top), left: Math.round(t.left) });
							},
						},
						t
					),
					0
				),
				i.addClass("in");
			(r = i[0].offsetWidth), (p = i[0].offsetHeight);
			"top" == e && p != s && ((o = !0), (t.top = t.top + s - p)),
				/bottom|top/.test(e)
					? ((e = 0),
						t.left < 0 &&
						((e = -2 * t.left),
							(t.left = 0),
							i.offset(t),
							(r = i[0].offsetWidth),
							(p = i[0].offsetHeight)),
						this.replaceArrow(e - n + r, r, "left"))
					: this.replaceArrow(p - s, p, "top"),
				o && i.offset(t);
		}),
		(n.prototype.replaceArrow = function (t, e, o) {
			this.arrow().css(o, t ? 50 * (1 - t / e) + "%" : "");
		}),
		(n.prototype.setContent = function () {
			var t = this.tip(),
				e = this.getTitle();
			t.find(".tooltip-inner")[this.options.html ? "html" : "text"](e),
				t.removeClass("fade in top bottom left right");
		}),
		(n.prototype.hide = function () {
			var t = this,
				e = this.tip(),
				o = f.Event("hide.bs." + this.type);
			function i() {
				"in" != t.hoverState && e.detach(),
					t.$element.trigger("hidden.bs." + t.type);
			}
			if ((this.$element.trigger(o), !o.isDefaultPrevented()))
				return (
					e.removeClass("in"),
					f.support.transition && this.$tip.hasClass("fade")
						? e.one(f.support.transition.end, i).emulateTransitionEnd(150)
						: i(),
					(this.hoverState = null),
					this
				);
		}),
		(n.prototype.fixTitle = function () {
			var t = this.$element;
			(!t.attr("title") && "string" == typeof t.attr("data-original-title")) ||
				t.attr("data-original-title", t.attr("title") || "").attr("title", "");
		}),
		(n.prototype.hasContent = function () {
			return this.getTitle();
		}),
		(n.prototype.getPosition = function () {
			var t = this.$element[0];
			return f.extend(
				{},
				"function" == typeof t.getBoundingClientRect
					? t.getBoundingClientRect()
					: { width: t.offsetWidth, height: t.offsetHeight },
				this.$element.offset()
			);
		}),
		(n.prototype.getCalculatedOffset = function (t, e, o, i) {
			return "bottom" == t
				? { top: e.top + e.height, left: e.left + e.width / 2 - o / 2 }
				: "top" == t
					? { top: e.top - i, left: e.left + e.width / 2 - o / 2 }
					: "left" == t
						? { top: e.top + e.height / 2 - i / 2, left: e.left - o }
						: { top: e.top + e.height / 2 - i / 2, left: e.left + e.width };
		}),
		(n.prototype.getTitle = function () {
			var t = this.$element,
				e = this.options;
			return (
				t.attr("data-original-title") ||
				("function" == typeof e.title ? e.title.call(t[0]) : e.title)
			);
		}),
		(n.prototype.tip = function () {
			return (this.$tip = this.$tip || f(this.options.template));
		}),
		(n.prototype.arrow = function () {
			return (this.$arrow = this.$arrow || this.tip().find(".tooltip-arrow"));
		}),
		(n.prototype.validate = function () {
			this.$element[0].parentNode ||
				(this.hide(), (this.$element = null), (this.options = null));
		}),
		(n.prototype.enable = function () {
			this.enabled = !0;
		}),
		(n.prototype.disable = function () {
			this.enabled = !1;
		}),
		(n.prototype.toggleEnabled = function () {
			this.enabled = !this.enabled;
		}),
		(n.prototype.toggle = function (t) {
			t = t
				? f(t.currentTarget)
				[this.type](this.getDelegateOptions())
					.data("bs." + this.type)
				: this;
			t.tip().hasClass("in") ? t.leave(t) : t.enter(t);
		}),
		(n.prototype.destroy = function () {
			clearTimeout(this.timeout),
				this.hide()
					.$element.off("." + this.type)
					.removeData("bs." + this.type);
		});
	var t = f.fn.tooltip;
	(f.fn.tooltip = function (i) {
		return this.each(function () {
			var t = f(this),
				e = t.data("bs.tooltip"),
				o = "object" == typeof i && i;
			(!e && "destroy" == i) ||
				(e || t.data("bs.tooltip", (e = new n(this, o))),
					"string" == typeof i && e[i]());
		});
	}),
		(f.fn.tooltip.Constructor = n),
		(f.fn.tooltip.noConflict = function () {
			return (f.fn.tooltip = t), this;
		});
})(jQuery);
