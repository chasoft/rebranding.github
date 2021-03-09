/**
 *  Premium URL Shortener jQuery Application
 *  Copyright @KBRmedia - All rights Reserved 
 */
$(document).ready(function () {

  /**
   * Shorten URL
   **/
  // Ajax request: URL shortening and error handeling
  $(document).on('submit', "form#main-form", function (e) {
    e.preventDefault();
    var form = $(this);
    if ($("#multiple-form").val() === "1") {
      var url = form.find(".main-textarea");
    } else {
      var url = form.find(".main-input");
    }
    if (!url.val()) {
      $('.ajax').hide().html('<div class="alert alert-danger">' + lang.error + '</div>').fadeIn('slow');
      $('.main-input').addClass('error');
      return;
    }
    var lang_shorn = form.find('#shortenurl').text();
    $.ajax({
      type: "POST",
      url: appurl + "/shorten",
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function () {
        $('.ajax').html("<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />");
      },
      complete: function () {
        $('.ajax').find('.loader').fadeOut("fast");
      },
      success: function (html) {
        if (html.error) {
          if (html.html == "captcha") {
            $('#captcha').fadeIn('slow');
          }
          $('.ajax').hide().html('<div class="alert alert-danger">' + html.msg + '</div>').fadeIn('slow');
          $('.main-input').addClass('error');
        } else {
          $('.main-input').removeClass('error');
          $('.main-advanced').fadeOut('slow');
          $('#captcha').fadeOut('slow');
          if (!html.confirm) {
            $("#shortenurl").hide();
            $("#copyurl").show();

            var short = html.short.split("#");

            $('.ajax').hide().html('<div class="alert alert-success no-round">' + lang.success + ' <br /><br /> ' + lang.stats + ' <b><a target="_blank" href="' + short[0] + '+">' + short[0] + '+</a></b> </div>').fadeIn('slow');
            $('.share-this').html('<div class="panel panel-default panel-body"><div class="qr"><img src="' + short[0] + '/qr?size=500x500" alt=""></div><div class="share-message"><p>' + lang.congrats + '</p><div class="share"><a href="' + html.short + '/qr" target="_blank" class="btn btn-primary" data-value="' + html.short + '/qr?size=500x500">' + lang.qr + '</a> <a href="http://www.facebook.com/sharer.php?u=' + html.short + '" target="_blank" class="btn btn-inline btn-facebook u_share">' + lang.share + ' Facebook</a> <a href="https://twitter.com/share?url=' + html.short + '" target="_blank" class="btn btn-inline btn-twitter u_share">' + lang.share + ' Twitter</a></div></div></div>').fadeIn('slow');
            zClipload();
            refreshLinks();
          } else {
            $('.share-this').slideUp();
            $('.ajax').hide().html('<div class="alert alert-success">' + lang.success + '</div>').fadeIn('slow');
          }
          $('.main-advanced').find('input').val('');
          url.val(html.short);
          url.select();
          if ($("#captcha > div").length > 0) {
            //grecaptcha.reset();
            recaptcha();
          }
          var copy = new Clipboard('#copyurl');
          $("#submit").hide();
          $("#copyurl").attr("data-clipboard-text", html.short).show();
          copy.on('success', function (e) {
            $('.ajax').hide().html('<div class="alert alert-success">' + lang.copy + '</div>').fadeIn('slow');
            $("#copyurl").hide();
            $("#shortenurl").show();
            $('input.main-input').val('');
          });
        }

      }
    });
  });
  /**
  * Search for URls
  **/
  $("#search").submit(function (e) {
    e.preventDefault();
    var val = $(this).find("input[type=text]").val();
    var action = $(this).attr("action");
    if (val.length > 3) {
      $.ajax({
        type: "POST",
        url: action,
        data: "q=" + val + "&token=" + token,
        beforeSend: function () {
          $(".return-ajax").html("<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:0 45%;border:0;' />");
        },
        complete: function () {
          $('img.loader').fadeOut("fast", function () { $(this).remove() });
        },
        success: function (r) {
          $(".return-ajax").html(r);
          $(".url-container").slideUp('fast');
          $(".return-ajax").slideDown('fast');
          loadall();
        }
      });
    } else {
      $(".return-ajax").html('<p class="alert alert-info" style="color:#fff">' + lang.minsearch + '</p><br>').fadeIn();
    }
  });
  /**
    * Server Requests
    **/
  $(document).on('click', '.ajax_call', function (p) {
    p.preventDefault();
    var e = $(this);
    var id = e.attr("data-id");
    var action = e.attr("data-action");
    var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
    var title = e.attr("data-title");
    if (typeof (e.attr("data-container")) == "undefined") {
      if (typeof (e.attr("data-class")) != "undefined") {
        var container = $("." + e.attr("data-class"));
        //var loading = "<span><i class='glyphicon glyphicon-refresh'></i> Loading</span>";
      } else {
        if (typeof (title) == "undefined") title = "User Account";
        e.modal({ title: title, content: "Please wait while loading...", confimation: 1 });
        var container = $("#modal-alert > p");
      }
    } else {
      var container = $("#" + e.attr("data-container"));
    }

    if (typeof (e.attr("bundle-name")) !== "undefined") {
      var bundle_name = e.attr("bundle-name");
    } else {
      bundle_name = "";
    }

    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=" + action + "&id=" + id + "&token=" + token + "&name=" + bundle_name,
      beforeSend: function () {
        container.html(loading);
      },
      complete: function () {
        loadall();
        $('img.loader').fadeOut("fast");
      },
      success: function (html) {
        if (typeof (e.attr("data-active")) !== "undefined") {
          e.parents("div#user-content").find(".active").removeClass("active");
          e.addClass(e.attr("data-active"));
        }
        container.hide();
        container.html(html);
        container.fadeIn('fast');
      }
    });
  }); //end of Ajax_call click

  if ($("#widget_activities").length > 0) {
    var intval = $("#widget_activities").attr("data-refresh");
    setInterval(function () {
      server("activities");
    }, intval);
  }

  $("#archiveall").click(function (e) {
    e.preventDefault();
    if ($(".url-container input[type=checkbox]:checked").length < 1) {
      return $(".return-ajax-message").first().html('<div class="alert alert-info" style="color:#fff">' + lang.minurl + '</div><br>').fadeIn().fadeOut(3000);
    }
    $(".url-container input[type=checkbox]").each(function (e) {
      if ($(this).prop("checked")) {
        archive($(this).data("id"));
      }
    });
  });

  $(document).on('click', '#addtobundle', function (e) {
    e.preventDefault();

    if ($(".url-container input[type=checkbox]:checked").length < 1) {
      return $(".return-ajax").html('<div class="alert alert-info" style="color:#fff">' + lang.minurl + '</div><br>').fadeIn().fadeOut(3000);
    }

    var title = $(this).data("content");
    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=bulk_bundle&token=" + token,
      complete: function () {
        loadall();
        $('img.loader').fadeOut("fast");
      },
      success: function (html) {
        $(this).modal({ title: title, content: "Please wait while loading...", confimation: 1 });
        let container = $("#modal-alert > p");
        container.hide();
        container.html(html);
        container.fadeIn('fast');
      }
    });
  });
  $(document).on('submit', '[role=bulk-bundle]', function (e) {
    e.preventDefault();
    let bundleid = $(this).find("select").val();
    $(".url-container input[type=checkbox]").each(function (e) {
      if ($(this).prop("checked")) {
        addtobundle($(this).data("id"), bundleid);
      }
    });
  });
  $(document).on('click', '.fetchBundles', function (p) {
    p.preventDefault();
    var e = $(this);
    var id = $(this).attr("data-id");
    var action = $(this).attr("data-action");
    var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
    var title = e.attr("data-title");
    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=" + action + "&id=" + id + "&token=" + token,
      complete: function () {
        loadall();
        $('img.loader').fadeOut("fast");
      },
      success: function (html) {
        $(this).modal({ title: title, content: html, header: false, confimation: 1 });
      }
    });
  });
});
/**
 * Realtime Data
 **/
function server(fn) {
  if (fn == "activities") {
    var li = $("#widget_activities").find("li");
    var text = $("#widget_activities h3 small").text();
    var id = li.attr("data-id");
    if (typeof (id) == "undefined") id = 0;
    $.ajax({
      type: "POST",
      url: appurl + "/server",
      data: "request=activities&id=" + id + "&token=" + token,
      beforeSend: function () {
        li.removeClass("new_item");
        $("#widget_activities h3 small").html("<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:0 45%;border:0;' />");
      },
      complete: function () {
        $("#widget_activities h3 small").text(text);
      },
      success: function (r) {
        $("#widget_activities ul").html(r);
      }
    });
  }
  return false;
}
/**
 * [refreshLinks description]
 * @author KBRmedia <https://gempixel.com>
 * @version 5.6
 */
function refreshLinks() {
  if ($(".data-holder").length < 1) return;
  $.ajax({
    type: "POST",
    url: appurl + "/server",
    data: "request=refreshlinks&token=" + token,
    beforeSend: function () {
      $(".data-holder").html("<div class='data-modal'><img class='loader' src='" + appurl + "/static/loader.gif' style='margin:0 45%;border:0;' /></div>");
    },
    complete: function () {
      $(".data-modal").remove();
    },
    success: function (r) {
      $(".data-holder").html(r);
      loadall();
    }
  });
}
/**
 * [archive description]
 * @author KBRmedia <https://gempixel.com>
 * @version 1.0
 */
function archive(id) {
  var container = $('.return-ajax');
  var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
  $.ajax({
    type: "POST",
    url: appurl + "/server",
    data: "request=archive&id=" + id + "&token=" + token,
    beforeSend: function () {
      container.html(loading);
    },
    complete: function () {
      loadall();
      $('img.loader').fadeOut("fast");
    },
    success: function (html) {
      container.hide();
      container.html(html);
      container.fadeIn('fast').fadeOut(3000);
    }
  });
}
function addtobundle(id, bundleid) {
  var container = $('.return-ajax');
  var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
  $.ajax({
    type: "POST",
    url: appurl + "/server",
    data: "request=bulk_bundle_add&id=" + id + "&bundleid=" + parseInt(bundleid) + "&token=" + token,
    beforeSend: function () {
      container.html(loading);
    },
    complete: function () {
      $('img.loader').fadeOut("fast").remove();
    },
    success: function (html) {
      $(document).modal_destroy();
      container.hide();
      container.html(html.msg);
      container.fadeIn('fast').fadeOut(3000);
      refreshLinks();
      $("#selectall").html('<i class="fa fa-check-square"></i>');
      $('input').iCheck('uncheck');
    }
  });
}

/**
 * [Ajax Assets (apply for URL, Splash, Overlay, Domain, Pixels) Delete description]
 * @author Bizchain <https://bizchain.vn>
 * @version 1.1
 */
function ajax_delete(auth, id) {
  var container = $('.return-ajax');
  var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
  $.ajax({
    type: "POST",
    url: appurl + "/server",
    data: "request=assetsdelete&id=" + id + "&auth=" + auth +"&token=" + token,
    beforeSend: function () {
      container.html(loading);
    },
    complete: function () {
      loadall();
      $('img.loader').fadeOut("fast");
    },
    success: function (html) {
      container.hide();
      container.html(html);
      container.fadeIn('fast');
    }
  });
}


/**
 * [Ajax Add URL to Bundles description]
 * @author Bizchain <https://bizchain.vn>
 * @version 1.0
 */
function ajax_urlAddToBundle(id, bundleID) {
  // var container = $('.return-ajax');
  // var loading = "<img class='loader' src='" + appurl + "/static/loader.gif' style='margin:5px 50%;border:0;' />";
  // $.ajax({
  //   type: "POST",
  //   url: appurl + "/server",
  //   data: "request=urldelete??????????????????&id=" + id + "&token=" + token,
  //   beforeSend: function () {
  //     container.html(loading);
  //   },
  //   complete: function () {
  //     loadall();
  //     $('img.loader').fadeOut("fast");
  //   },
  //   success: function (html) {
  //     container.hide();
  //     container.html(html);
  //     container.fadeIn('fast');
  //   }
  // });
}