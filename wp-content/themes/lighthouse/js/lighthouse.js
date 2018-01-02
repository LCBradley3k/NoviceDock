/*Remove menu class on scrolldown adding solid white bg
!function(a){"use strict"; a(window).scroll(function(){a(this).scrollTop()>1?a(".navbar").removeClass("lh-nav-bg-transform"):a(".navbar").addClass("lh-nav-bg-transform")})}(jQuery);
//Menu dropdown functionality
!function(a){"use strict"; a(window).scroll(function(){a(this).scrollTop()>1?a(".navbar").removeClass("lh-nav-bg-transform"):a(".navbar").addClass("lh-nav-bg-transform")})}(jQuery),function(a){a(".navbar-nav > li.menu-item > a").click(function(){"_blank"!=a(this).attr("target")&&"dropdown-toggle"!=a(this).attr("class")&&(window.location=a(this).attr("href"))}),a(".navbar-nav > li.menu-item > .dropdown-toggle").click(function(){"_blank"==a(this).attr("target")?window.open(this.href):window.location=a(this).attr("href")}),a(".dropdown").hover(function(){a(this).addClass("open")},function(){a(this).removeClass("open")});var b=function(b){height=b,a("#cc_spacer").css("height",height+"px")};a(window).resize(function(){b(a("#navigation_menu").height())}),a(window).ready(function(){b(a("#navigation_menu").height())})}(jQuery);
*/

/*
jQuery('.resource-item .img-wrap').each(function(){
  if(jQuery(this).height() < 101){
    jQuery(this).addClass('img-wrap-small');
  }
}); */

/*jQuery("#open-popup").on("click", function(){
  alert("HELLo");
  document.body.appendChild(chimpPopupLoader);
  document.body.appendChild(chimpPopup);
  document.cookie = "MCEvilPopupClosed=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
});*/

// Fill in your MailChimp popup settings below.
    // These can be found in the original popup script from MailChimp.
    var mailchimpConfig = {
        baseUrl: 'mc.us17.list-manage.com',
        uuid: '1356322e2ea5575b4182a4f5d',
        lid: '36776de185'
    };

    // No edits below this line are required
var chimpPopupLoader = document.createElement("script");
chimpPopupLoader.src = '//s3.amazonaws.com/downloads.mailchimp.com/js/signup-forms/popup/embed.js';
chimpPopupLoader.setAttribute('data-dojo-config', 'usePlainJson: true, isDebug: false');

jQuery(function ($) {
    document.body.appendChild(chimpPopupLoader);

    jQuery(".coming-soon").on("click", function () {
        require(["mojo/signup-forms/Loader"], function (L) { L.start({"baseUrl": mailchimpConfig.baseUrl, "uuid": mailchimpConfig.uuid, "lid": mailchimpConfig.lid})});
        document.cookie = 'MCPopupClosed=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC;';
        document.cookie = 'MCPopupSubscribed=;path=/;expires=Thu, 01 Jan 1970 00:00:00 UTC;';
    });

});

/* Mailchimp Popup */


jQuery('.topics-btn').click(function(){
  jQuery('.topics-btn .fa').toggleClass('fa-activate');
  jQuery('.category-menu-wrap').toggleClass('category-menu-visible');
  jQuery('.darken').toggleClass("darken-active");
  jQuery(this).toggleClass('active');
});

jQuery('.darken').click(function(){
  jQuery('.topics-btn .fa').removeClass('fa-activate');
  jQuery('.category-menu-wrap').removeClass('category-menu-visible');
  jQuery('.darken').removeClass("darken-active");

  //jQuery('.category-menu-wrap').stop().animate({height: 0}, 300, jQuery.bez([.27,1,.85,.99]));
});


jQuery('.layout-condensed').click(function(){
  jQuery('.top-widgets').removeClass('top-widgets-reveal');
  jQuery('.top-widgets h2 .expand').html('&#43;');
});

jQuery('.layout-large').click(function(){
  jQuery('.top-widgets').addClass('top-widgets-reveal');
  jQuery('.top-widgets h2 .expand').html('&#45;');
});

jQuery('a[href^=\\#]').on('click', function(event){
    event.preventDefault();
    jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top - 100}, 500);

    var href = jQuery(this).attr('href');
    jQuery('.top-widgets').addClass('top-widgets-reveal');
    jQuery('.top-widgets h2 .expand').html('&#43;');
    jQuery("h2" + href).parent().removeClass('top-widgets-reveal');
    jQuery("h2" + href + " .expand").html('&#45;');
});

jQuery('.category-menu-wrap .top-widgets h2').on('click', function() {
	jQuery(this).parent().toggleClass('top-widgets-reveal');
  jQuery(this).find('.expand').html(jQuery(this).find('.expand').html() === '+' ? '&#45;' : '&#43;');
});


jQuery('.sidebar span:nth-of-type(1)').addClass('active');



/* MENU ITEMS ACTIVE SCROLL */
// Cache selectors
var lastId,
    sideMenu = jQuery(".sidebar"),
    // All list items
    menuItems = sideMenu.find("a.side-post"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = jQuery(jQuery(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
  var href = jQuery(this).attr("href"),
      offsetTop = href === "#" ? 0 : jQuery(href).offset().top-20;
  jQuery('html, body').stop().animate({
      scrollTop: offsetTop
  }, 300);
  e.preventDefault();
});

var lastScrollTop = 0;
var passedHeader = false;
var headCurHeight = jQuery('.category-menu-wrap').height;



jQuery( window ).load(function() {
  if (jQuery('.sidebar').length){
    var $sidebar = jQuery('.sidebar');
    var $container = jQuery('.syllabus-container');
    var $writerContainer = jQuery('.writer-container');
    var sideBottom = parseFloat($sidebar.css('top')) + $sidebar.height();
    var contBottom = $container.offset().top + $container.height();
    console.log("syllabus-container.offset().top = " + $container.offset().top);
    console.log("$container.height() = " + $container.height());
    console.log("SideBottom = " + sideBottom);
    console.log("contBottom = " + contBottom);
  }


// Bind to scroll
jQuery(window).scroll(function(){
   // Get container scroll position
   var fromTop = jQuery(this).scrollTop()+102;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if (jQuery(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";

   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems.parent().removeClass("active").end().filter("[href='#"+id+"']").parent().addClass("active");
   }

   if (jQuery(this).scrollTop() > 0 && jQuery(this).scrollTop() < jQuery('#main-categories-wrap').height()){

    var topSpace =(jQuery(this).scrollTop());
     jQuery(".mountain-close").css("bottom", "-" + topSpace/40 + "px");
     jQuery(".back-mountains").css("bottom", "-" + (topSpace/2) + "px");
   }


   var courseTitle = jQuery('.title-wrap');
   var st = jQuery(this).scrollTop();

   var headerDistance = 66;
   if (jQuery('.category-menu-wrap').hasClass('category-menu-visible')){
     headerDistance = 136;

   }

   var visualHeight = jQuery('.syllabus-visual').height() + jQuery('.site-header').height();
   if (window.scrollY > visualHeight){
     $sidebar.css("position", "fixed");
   } else {
     $sidebar.css("position", "relative");
   }


   if (jQuery('.sidebar').length){
     if (window.scrollY + sideBottom > contBottom) {
        $sidebar.addClass('lock');
        jQuery('.col-md-3').css("position", "static");
      } else if ($sidebar.hasClass('lock')) {
        $sidebar.removeClass('lock');
        jQuery('.col-md-3').css("position", "relative");
      }
    }
});
});



(function(factory){if(typeof exports==="object"){factory(require("jquery"))}else if(typeof define==="function"&&define.amd){define(["jquery"],factory)}else{factory(jQuery)}})(function($){$.extend({bez:function(encodedFuncName,coOrdArray){if($.isArray(encodedFuncName)){coOrdArray=encodedFuncName;encodedFuncName="bez_"+coOrdArray.join("_").replace(/\./g,"p")}if(typeof $.easing[encodedFuncName]!=="function"){var polyBez=function(p1,p2){var A=[null,null],B=[null,null],C=[null,null],bezCoOrd=function(t,ax){C[ax]=3*p1[ax],B[ax]=3*(p2[ax]-p1[ax])-C[ax],A[ax]=1-C[ax]-B[ax];return t*(C[ax]+t*(B[ax]+t*A[ax]))},xDeriv=function(t){return C[0]+t*(2*B[0]+3*A[0]*t)},xForT=function(t){var x=t,i=0,z;while(++i<14){z=bezCoOrd(x,0)-t;if(Math.abs(z)<.001)break;x-=z/xDeriv(x)}return x};return function(t){return bezCoOrd(xForT(t),1)}};$.easing[encodedFuncName]=function(x,t,b,c,d){return c*polyBez([coOrdArray[0],coOrdArray[1]],[coOrdArray[2],coOrdArray[3]])(t/d)+b}}return encodedFuncName}})});;

/**
 * jQuery-viewport-checker - v1.8.8 - 2017-09-25
 * https://github.com/dirkgroenen/jQuery-viewport-checker
 *
 * Copyright (c) 2017 Dirk Groenen
 * Licensed MIT <https://github.com/dirkgroenen/jQuery-viewport-checker/blob/master/LICENSE>
 */

!function(a){a.fn.viewportChecker=function(b){var c={classToAdd:"visible",classToRemove:"invisible",classToAddForFullView:"full-visible",removeClassAfterAnimation:!1,offset:100,repeat:!1,invertBottomOffset:!0,callbackFunction:function(a,b){},scrollHorizontal:!1,scrollBox:window};a.extend(c,b);var d=this,e={height:a(c.scrollBox).height(),width:a(c.scrollBox).width()};return this.checkElements=function(){var b,f;c.scrollHorizontal?(b=Math.max(a("html").scrollLeft(),a("body").scrollLeft(),a(window).scrollLeft()),f=b+e.width):(b=Math.max(a("html").scrollTop(),a("body").scrollTop(),a(window).scrollTop()),f=b+e.height),d.each(function(){var d=a(this),g={},h={};if(d.data("vp-add-class")&&(h.classToAdd=d.data("vp-add-class")),d.data("vp-remove-class")&&(h.classToRemove=d.data("vp-remove-class")),d.data("vp-add-class-full-view")&&(h.classToAddForFullView=d.data("vp-add-class-full-view")),d.data("vp-keep-add-class")&&(h.removeClassAfterAnimation=d.data("vp-remove-after-animation")),d.data("vp-offset")&&(h.offset=d.data("vp-offset")),d.data("vp-repeat")&&(h.repeat=d.data("vp-repeat")),d.data("vp-scrollHorizontal")&&(h.scrollHorizontal=d.data("vp-scrollHorizontal")),d.data("vp-invertBottomOffset")&&(h.scrollHorizontal=d.data("vp-invertBottomOffset")),a.extend(g,c),a.extend(g,h),!d.data("vp-animated")||g.repeat){String(g.offset).indexOf("%")>0&&(g.offset=parseInt(g.offset)/100*e.height);var i=g.scrollHorizontal?d.offset().left:d.offset().top,j=g.scrollHorizontal?i+d.width():i+d.height(),k=Math.round(i)+g.offset,l=g.scrollHorizontal?k+d.width():k+d.height();g.invertBottomOffset&&(l-=2*g.offset),k<f&&l>b?(d.removeClass(g.classToRemove),d.addClass(g.classToAdd),g.callbackFunction(d,"add"),j<=f&&i>=b?d.addClass(g.classToAddForFullView):d.removeClass(g.classToAddForFullView),d.data("vp-animated",!0),g.removeClassAfterAnimation&&d.one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",function(){d.removeClass(g.classToAdd)})):d.hasClass(g.classToAdd)&&g.repeat&&(d.removeClass(g.classToAdd+" "+g.classToAddForFullView),g.callbackFunction(d,"remove"),d.data("vp-animated",!1))}})},("ontouchstart"in window||"onmsgesturechange"in window)&&a(document).bind("touchmove MSPointerMove pointermove",this.checkElements),a(c.scrollBox).bind("load scroll",this.checkElements),a(window).resize(function(b){e={height:a(c.scrollBox).height(),width:a(c.scrollBox).width()},d.checkElements()}),this.checkElements(),this}}(jQuery);
//# sourceMappingURL=jquery.viewportchecker.min.js.map

// Using viewport checker to set up fade in animations
jQuery('.animate-fade-in').viewportChecker({
    classToAdd: 'fadeIn'
});
jQuery('.animate-heavy-left').viewportChecker({
    classToAdd: 'fadeHeavyLeft'
});
jQuery('.animate-left').viewportChecker({
    classToAdd: 'fadeLeft'
});
jQuery('.animate-scale-up').viewportChecker({
    classToAdd: 'scaleUp'
});


/*
if (st > lastScrollTop){
    // downscroll code
    if(st < headerDistance){
      courseTitle.css('padding-top', (st/4)+20);
      courseTitle.css('padding-bottom', (st/4)+20);
      passedHeader = false;
    } else {
      courseTitle.addClass('title-wrap-scroll');
      jQuery('.title-wrap').css('padding-bottom', '20px');
      jQuery('.title-wrap').css('padding-top', '20px');
      passedHeader = true;
    }
} else {
   // upscroll code

   if(st < headerDistance && passedHeader){
       courseTitle.removeClass('title-wrap-scroll');
   } else {
       if (passedHeader == false) {
       courseTitle.css('padding-top', (st/4)+20);
       courseTitle.css('padding-bottom', (st/4)+20);
     }
   }
}
lastScrollTop = st;


if (jQuery(this).scrollTop() > headerDistance){
  jQuery('.resources-top-wrap').css("position", "fixed");
} else {
  jQuery('.resources-top-wrap').css("position", "absolute");
}
*/

/*
var sidebarIsSmall = true;
jQuery(window).resize(function(){
  resizeSidebar();
});

function resizeSidebar(){
  // distance is the distance from the top of the sidebar, to the top of the window
  if (sidebarIsSmall){
    return;
  } else {
    var $sidebar = jQuery('.sidebar'),
      scrollTop     = jQuery(window).scrollTop(),
      elementOffset = $sidebar.offset().top,
      distance      = (elementOffset - scrollTop),
      $sideHeight = distance + $sidebar.height();

      // if the sidebar and the space above it is bigger than the window
    if($sideHeight > jQuery(window).height()){
      $sidebar.addClass('sidebar--small');
    } else {
      $sidebar.removeClass('sidebar--small');
    }
    sidebarIsSmall = true;
  }
}
*/
/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));
