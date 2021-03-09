/**
 *  Premium URL Shortener jQuery Application
 *  Copyright @KBRmedia - All rights Reserved 
 */
$(function () {
  if ($('[data-toggle="datepicker"]').length > 0) {

    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    $('[data-toggle="datepicker"]').datepicker({
      autoPick: true,
      format: "dd/mm/yyyy",
      startDate: tomorrow
    }).val("");
  }
  if ($('[data-toggle="dateeditor"]').length > 0) {

    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    $('[data-toggle="dateeditor"]').datepicker({
      autoPick: false,
      format: "dd/mm/yyyy",
      startDate: tomorrow
    });
  }
  $(".tabbed").hide();
  $(".tabbed").filter(":first").fadeIn();

  var hash = window.location.hash.replace("!", "");
  if (hash && $(".tabbed" + hash).length > 0) {
    $(".tabbed").hide();
    $(hash).fadeIn();
    $('.tabs li').removeClass("active");
    $('.tabs li a[href$="' + hash + '"]').parent('li').addClass('active');
  }

  $(".tabs a").click(function (e) {
    if ($(this).attr("data-link")) {
      return;
    }
    e.preventDefault();
    var id = $(this).attr("href");
    $(".tabs li").removeClass("active");
    $(this).parent("li").addClass("active");
    $(".tabbed").hide();
    $(id).fadeIn();
    window.location.hash = id;
    update_sidebar();
  });
  /**
   * Hide advanced option + Toggle on click
   */
  $(".slideup").slideUp();
  $(".advanced").click(function (e) {
    e.preventDefault();
    $(".main-advanced").slideToggle("medium", function () {
      update_sidebar();
    });
  });
  /**
   * Add & Delete Location Field
   */
  var html = $(".country").html();
  $(".add_geo").click(function () {
    if ($(this).attr("data-home")) {
      $(".geo-input").append("<div class='row'>" + html + "</div><p><a href='#' class='btn btn-danger btn-xs delete_geo' data-holder='div.row'>" + lang.del + "</a></p>");
    } else {
      $('#geo').append("<div class='form-group'>" + html + "</div><p><a href='#' class='btn btn-danger btn-xs delete_geo'>" + lang.del + "</a></p>");
    }
    update_sidebar();
    if ($().chosen) {
      $("select").chosen({ disable_search_threshold: 5 });
    }
    return false;
  });
  $(document).on('click', ".delete_geo", function (e) {
    e.preventDefault();
    var t = $(this);
    $(this).parent('p').prev($("this").attr("data-holder")).slideUp('slow', function () {
      $(this).remove();
      t.parent('p').remove();
    });
    return false;
  });
  // Add more devices
  var dhtml = $(".devices").html();
  $(".add_device").click(function () {
    if ($(this).attr("data-home")) {
      $(".device-input").append("<div class='row'>" + dhtml + "</div><p><a href='#' class='btn btn-danger btn-xs delete_device' data-holder='div.row'>" + lang.del + "</a></p>");
    } else {
      $('#device').append("<div class='form-group'>" + dhtml + "</div><p><a href='#' class='btn btn-danger btn-xs delete_device'>" + lang.del + "</a></p>");
    }
    update_sidebar();
    if ($().chosen) {
      $("select").chosen({ disable_search_threshold: 5 });
    }
    return false;
  });
  $(document).on('click', ".delete_device", function (e) {
    e.preventDefault();
    var t = $(this);
    $(this).parent('p').prev($("this").attr("data-holder")).slideUp('slow', function () {
      $(this).remove();
      t.parent('p').remove();
    });
    return false;
  });
  // Add more parameters
  var phtml = $(".parameters").html();
  $(".add_parameter").click(function () {
    if ($(this).attr("data-home")) {
      $(".parameter-input").append("<div class='row'>" + phtml + "</div><p><a href='#' class='btn btn-danger btn-xs delete_parameter' data-holder='div.row'>" + lang.del + "</a></p>");
    } else {
      $('#parameters').append("<div class='form-group'>" + phtml + "</div><p><a href='#' class='btn btn-danger btn-xs delete_parameter'>" + lang.del + "</a></p>");
    }
    update_sidebar();
    update_autocomplete();
    if ($().chosen) {
      $("select").chosen({ disable_search_threshold: 5 });
    }
    return false;
  });
  $(document).on('click', ".delete_parameter", function (e) {
    e.preventDefault();
    var t = $(this);
    $(this).parent('p').prev($("this").attr("data-holder")).slideUp('slow', function () {
      $(this).remove();
      t.parent('p').remove();
    });
    return false;
  });
  /**
   * Call Neo
   **/
  if ($().chosen) {
    $("select").chosen({ disable_search_threshold: 5 });
  }
  /**
   * Custom Radio Box
   **/
  $(document).on('click', '.form_opt li a', function (e) {

    var href = $(this).attr('href');
    var name = $(this).parent("li").parent("ul").attr("data-id");
    var to = $(this).attr("data-value");
    var callback = $(this).parent("li").parent("ul").attr("data-callback");
    if (href == "#" || href == "") e.preventDefault();

    $("input#" + name).val(to);
    $(this).parent("li").parent("ul").find("a").removeClass("current");
    $(this).addClass("current");
    if (callback !== undefined) {
      window[callback](to);
    }
  });
  /**
   * Show forgot password form
   **/
  $(document).on('click', '#forgot-password', function () {
    show_forgot_password();
  });
  if (location.hash == "#forgot") {
    show_forgot_password();
  }
  $(document).on('click', "div.alert", function () {
    $(this).fadeOut();
  });
  /**
   * Open share window
   */
  $(document).on('click', "a.u_share", function (e) {
    e.preventDefault();
    window.open($(this).attr("href"), '', 'left=50%, top=100, width=550, height=450, personalbar=0, toolbar=0, scrollbars=1, resizable=1')
  });
  /**
   * Back to top
   */
  $(window).scroll(function () {
    if (window.pageYOffset > 300) {
      $("#back-to-top").fadeIn('slow');
    } else {
      $("#back-to-top").fadeOut('slow');
    }
  });
  $("a#back-to-top,.scroll").smoothscroll();
  //
  $(document).on('click', ".clear-search", function (e) {
    e.preventDefault();
    $(".return-ajax").slideUp('medium', function () {
      $(this).html('');
      $("#search").find("input[type=text]").val('');
      $(".url-container").slideDown('medium');
    });
  });
  // Select All
  $(document).on('click', '#selectall', function (e) {
    e.preventDefault();
    if ($(this).find(".fa-check-square").length > 0) {
      $(this).html('<i class="fa fa-minus-square"></i>');
    } else {
      $(this).html('<i class="fa fa-check-square"></i>');
    }
    $('input').iCheck('toggle');
  });
  /**
   * Delete All
   * Move to server_urldelete (server.js)
   */
  // $(document).on('click', '#deleteall', function (e) {
  //   e.preventDefault();
  //   if ($(".url-container input[type=checkbox]:checked").length < 1) {
  //     return $(".return-ajax-message").first().html('<div class="alert alert-info" style="color:#fff">' + lang.minurl + '</div><br>').fadeIn();
  //   }
  //   $('form#delete-all-urls').attr("action", appurl + "/user/delete");
  //   $('form#delete-all-urls').submit();
  // });
  /**
   * Active Menu
   **/
  var path = location.pathname.substring(1);
  if (path) {
    $('.navbar .navbar-nav > li:not(.dropdown) > a[href$="' + path + '"]').addClass("active");
    $('.nav-sidebar a').removeClass("active");
    $('.nav-sidebar a[href$="' + path + '"]').addClass('active');
  }
  // Alert Modal
  // $(document).on("click", ".delete", function (e) {
  //   e.preventDefault();
  //   $(this).modal();
  // });
  /**
   * OnClick Select
   **/
  $(".onclick-select").on('click', function () {
    $(this).select();
  })
  /**
   * Show Languages
   **/
  $("#show-language").click(function (e) {
    e.preventDefault();
    $(".langs").fadeToggle();
  });
  if ($().chosen) {
    $('select.filter').chosen().change(function (e, v) {
      var href = document.URL.split("?")[0].split("#")[0];
      window.location = href + "?" + $(this).attr("data-key") + "=" + v.selected;
    });
  }
  // $(".tooltip").tooltip();
  // Load all
  loadall();

  function format_date(time) {
    var d = new Date(time);
    var list = new Array();
    list[0] = "January"; list[1] = "February"; list[2] = "March"; list[3] = "April"; list[4] = "May"; list[5] = "June"; list[6] = "July"; list[7] = "August"; list[8] = "September"; list[9] = "October"; list[10] = "November"; list[11] = "December";
    var month = list[d.getMonth()];
    return d.getDate() + " " + month + ", " + d.getFullYear();
  }
  // Charts
  if ($(".chart").length > 0) {
    function showTooltip(x, y, c, d) {
      $('<div id="tooltip" class="chart-tip"><strong>' + c + '</strong><br>' + format_date(d) + '</div>').css({
        position: 'absolute',
        display: 'none',
        top: y - 40,
        left: x - 30,
        color: '#fff',
        opacity: 0.80
      }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    var previousSeries = null;
    $(".chart").bind("plothover", function (event, pos, item) {
      if (item) {
        if (previousSeries != item.seriesIndex || previousPoint != item.dataIndex) {
          previousPoint = item.dataIndex;
          previousSeries = item.seriesIndex;
          $("#tooltip").remove();
          showTooltip(item.pageX, item.pageY, item.datapoint[1] + " Clicks", item.datapoint[0]);
        }
      }
    });
  }
  if ($(".copy").length > 0) {
    new Clipboard('.copy');
  }

  $(document).on("click", ".copy", function (e) {
    e.preventDefault();
    $(this).text(lang.copied);
    $(this).prev("a").addClass("float-away");
    setTimeout(function () {
      $("a").removeClass('float-away');
    }, 400);
  });

  $("#payment-form").on("submit", function (e) {

    $(".form-group").removeClass("has-danger");

    var $error = 0;

    var $name = $("#name");
    if ($name == "" || $name.val().length < 2) {
      $name.parents(".form-group").addClass("has-danger");
      $error = 1;
    }

    var $address = $("#address");
    if ($address == "" || $address.val().length < 2) {
      $address.parents(".form-group").addClass("has-danger");
      $error = 1;
    }

    var $city = $("#city");
    if ($city == "" || $city.val().length < 2) {
      $city.parents(".form-group").addClass("has-danger");
      $error = 1;
    }

    var $state = $("#state");
    if ($state == "" || $state.val().length < 2) {
      $state.parents(".form-group").addClass("has-danger");
      $error = 1;
    }

    var $zip = $("#zip");
    if ($zip == "" || $zip.val().length < 2) {
      $zip.parents(".form-group").addClass("has-danger");
      $error = 1;
    }
    var $coupon = $("#coupon");
    if ($zip.parents(".form-group").hasClass("has-error")) {
      $error = 1;
    }

    var $stripe = $(".StripeElement");
    if ($stripe.length > 0 && $stripe.hasClass("StripeElement--invalid")) {
      $error = 1;
    }
    if ($error) return false;
  });

  if ($("input#coupon").length > 0) {
    var $coupon = $("#coupon");
    $coupon.blur(function () {
      if ($coupon.val().length > 2) {
        $coupon.parent("div").find(".help-block").remove();
        $.ajax({
          type: "POST",
          url: appurl + "/server",
          data: "request=validatecoupon&code=" + $coupon.val() + "&token=" + token,
          success: function (response) {
            if (response == "invalid") {
              $coupon.parents(".form-group").addClass("has-danger").addClass("has-error");
            } else {
              $coupon.parents(".form-group").removeClass("has-danger").removeClass("has-error");
              $coupon.parents(".form-group").addClass("has-success");
              $coupon.after("<p class='help-block'>" + response + "</p>");
            }
          }
        });
      }
    });
  }
  if (typeof cookieconsent == "object") {
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#2148b1"
        },
        "button": {
          "background": "#fff",
          "color": "#2148b1"
        }
      },
      "theme": "classic",
      "position": "bottom-right",
      "content": {
        "message": lang.cookie,
        "dismiss": lang.cookieok,
        "link": lang.cookiemore,
        "href": appurl + "/page/privacy-policy"
      }
    });
  }
  // Validate forms
  $(".validate").submit(function (e) {
    if (validateForm($(this)) == false) e.preventDefault();
  });
  $(".contact-event").click(function (e) {
    e.preventDefault();
    $(this).hide();
    $(".contact-box").fadeIn();
  });
  $(".contact-close").click(function (e) {
    e.preventDefault();
    $(".contact-box").hide();
    $(".contact-event").fadeIn();
  });
  $(".contact-form").submit(function (e) {
    e.preventDefault();
    if (validateForm($(this)) == false) return false;
    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=ajax_form&" + $(this).serialize() + "&token=" + token,
      success: function (response) {
        $(".contact-box").hide();
        $(".contact-event").fadeIn();
        $(".contact-form").trigger("reset");
        let style = $(".contact-event i").attr("style");
        $(".contact-event i").removeClass("fa-question").addClass("fa-check").attr("style", "background-color:#82e26f;color:#fff");
        setTimeout(function () {
          $(".contact-event i").removeClass("fa-check").addClass("fa-question").attr("style", style);
        }, 5000);
      }
    });
    alert("Message Sent!");
  });
  var poll_max = 10;
  $(".addA").click(function (e) {
    e.preventDefault();
    var poll_num = $(".poll-options > .form-group").length;
    if (poll_num == poll_max) return false;
    poll_num++;
    $(".poll-options").append("<div class='form-group'><input type='text' placeholder='#" + poll_num + "' class='form-control' name='answer[]' id='answer[]'  placeholder='' data-id='" + poll_num + "'></div>");
    $("ol.poll-answers").append("<li data-id='" + poll_num + "'>#" + poll_num + "</li>");
    update_sidebar();
  });
  $(document).on('keyup', '.poll-options input[type=text]', function () {
    let id = $(this).data("id");
    if ($(this).val().length < 1 || $(this).val().length > 50) return false;
    $("ol.poll-answers li[data-id=" + id + "]").text($(this).val());
  });
  $(".poll-form").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=ajax_poll&" + $(this).serialize() + "&token=" + token,
      success: function (response) {
        $(".poll-box").html("<p><i class='fa fa-check'></i></p>");
        $(".poll-form").remove();
        let style = $(".contact-event i").attr("style");
        setTimeout(function () {
          $(".poll-overlay").remove();
        }, 2000);
      }
    });
  });
  $(".themes-style li a").click(function (e) {
    e.preventDefault();
    var c = $(this).attr("data-class");
    var callback = $(this).parent("li").parent("ul").attr("data-callback");
    $(".themes-style li a").removeClass("current");
    $(this).addClass("current");
    $("#theme_value").val(c);
    if (callback !== undefined) {
      window[callback](c);
    }
  });
  var links_max = 10;
  $(".addLinks").click(function (e) {
    e.preventDefault();
    var links_num = $(".links > .form-group").length;
    if (links_num == links_max) return false;
    links_num++;
    $(".links").append($(".links-template").html().replace("null", links_num));
    $(".custom-profile_links").append("<a href='#' data-id='" + links_num + "' class='btn btn-block'><span>#" + links_num + "</span></a>");
    update_sidebar();
  });
  $(document).on('keyup', '.links input[data-input=label]', function () {
    let id = $(this).parents(".form-group").data("id");
    if ($(this).val().length < 1 || $(this).val().length > 50) return false;
    $('.custom-profile_links a[data-id=' + id + '] span').text($(this).val());
  });
  $(document).on('click', ".deleteLinks", function (e) {
    e.preventDefault();
    var t = $(this);
    var p = $(this).parent('p').prev(".form-group");
    p.slideUp('slow', function () {
      $('.custom-profile_links a[data-id=' + p.data("id") + ']').fadeOut();
      $(this).remove();
      t.parent('p').remove();
    });
    return false;
  });
  $("#profile-builder input[name=name]").keyup(function (e) {
    if ($(this).val().length < 1 || $(this).val().length > 50) return false;
    $(".custom-profile_header h3 span").text($(this).val());
  });
  $(".code-selector").hide();
  $(".code-selector[data-id=curl]").fadeIn('fast', function () {
    update_sidebar();
  });
  $(".code-lang a").click(function (e) {
    e.preventDefault();
    var id = $(this).attr("href");
    $(".code-lang a").removeClass("active");
    $("a[href=" + id + "]").addClass("active");
    $(".code-selector").hide();
    var c = id.replace("#", "");
    $(".code-selector[data-id=" + c + "]").fadeIn();
    update_sidebar();
  });

  //Fix Tabs on loading by BizChain
  location.hash && $("a[href=" + location.hash + "]").tab("show");
  //$(document.body).on("click", "a[data-toggle]", function (t) {location.hash = this.getAttribute("href");});
  //$(window).on("popstate", function () { var o = location.hash; $("a[href=" + o + "]").tab("show") });
  //End of Fix

}); // End jQuery Ready
/**
 * iCheck Load Function
 **/
function icheck_reload() {
  if (typeof icheck !== "undefined") {
    var c = icheck;
  } else {
    if ($("input[type=checkbox],input[type=radio]").attr("data-class")) {
      var c = "-" + $("input[type=checkbox],input[type=radio]").attr("data-class");
    } else {
      var c = "";
    }
  }
  if ($().iCheck) {
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat' + c,
      radioClass: 'iradio_flat' + c
    });
  }
}

/**
 * Show Password Field Function
 **/
function show_forgot_password() {
  $("#login_form").slideUp("slow");
  $("#forgot_form").slideDown("slow");
  return false
}
/**
 * Custom Radio Box Callback
 **/
function update_sidebar() {
  // Sidebar Height
  if (!is_mobile() && !is_tablet()) {
    var h1 = $(".content").height();
    $(".sidebar").height(h1 - 57);
  }
}
/**
 * Load zClip
 **/
function zClipload() {

}
function ajaxDeleteAll() {
  $(document).on("click", "#deleteall", function (e) {
    e.preventDefault();
    if ($(".url-container input[type=checkbox]:checked").length < 1) {
      return $(".return-ajax-message").first().html('<div class="alert alert-info" style="color:#fff">' + lang.minurl + '</div><br>').fadeIn().fadeOut(3000);
    }
    $(this).modal();
  });
}

function deleteSelectedItems() {
  $(".url-container input[type=checkbox]").each(function (e) {
    if ($(this).prop("checked")) {
      ajax_delete($(this).data("auth"),$(this).data("id"));
    }
  });
  //fix model close behavior
  $("#modal-shadow").fadeOut("normal", function () {
    $(this).remove();
  });
  $("#modal-alert").fadeOut("normal", function () {
    $(this).remove();
  });
}

function ajaxDeleteSelected() {
  $(document).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).modal();
  });
}

function deleteSelectedItem(auth, xid) {
  if (xid) {
    ajax_delete(auth, xid);
  }
  //fix model close behavior
  $("#modal-shadow").fadeOut("normal", function () {
    $(this).remove();
  });
  $("#modal-alert").fadeOut("normal", function () {
    $(this).remove();
  });
}

//Tooltip
function zTooltip() {
  $('[data-toggle="tooltip"]').tooltip();
}
/**
 * Load Some Functions
 **/
function loadall() {
  zClipload();
  icheck_reload();
  update_sidebar();
  update_autocomplete();
  zTooltip();
  ajaxDeleteAll();
  ajaxDeleteSelected();
}
// Switch Forms
window.form_switch = function (e) {
  if (e == 0) {
    $("#multiple").slideUp();
    $("#single").slideDown();
    $(".advanced").fadeIn();
  } else {
    $("#multiple").slideDown();
    $("#single").slideUp();
    $(".main-advanced").slideUp();
    $(".advanced").fadeOut();
  }
}
// Auto complete
function update_autocomplete() {
  var parameters = [
    { value: 'utm_source', data: 'utm_source' },
    { value: 'utm_medium', data: 'utm_medium' },
    { value: 'utm_campaign', data: 'utm_campaign' },
    { value: 'utm_term', data: 'utm_term' },
    { value: 'utm_content', data: 'utm_content' },
    { value: 'tag', data: 'tag' },
  ];
  if ($().devbridgeAutocomplete) {
    $(".autofillparam").devbridgeAutocomplete({
      lookup: parameters
    });
  }
}
// Validate Form 
function validateForm(e) {

  $(".form-group").removeClass("has-danger");
  $(".form-control-feedback").remove();
  let error = 0;

  e.find("[data-required]").each(function () {

    let type = $(this).attr("type");

    if (type == "email") {
      let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!regex.test($(this).val())) error = 1;
    } else {
      if ($(this).val() == "") error = 1;
    }

    if (error == 1) {
      $(this).parents(".form-group").addClass("has-danger");
      $(this).after("<div class='form-control-feedback'>This field is required</div>");
    }

  });
  if (error == 1) {
    return false;
  }

  return true;
}
window.changeTheme = function (c) {
  $("#custom-profile").attr("class", "custom-profile_" + c);
}
window.showBundle = function (v) {
  if (v == 1) return $("#view-lists").fadeIn();
  return $("#view-lists").fadeOut();
}
window.showAll = function (v) {
  if (v == 1) return $("#view-links").fadeIn();
  return $("#view-links").fadeOut();
}

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
