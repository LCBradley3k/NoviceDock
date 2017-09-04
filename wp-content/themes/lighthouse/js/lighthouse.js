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

jQuery('.topics-btn').click(function(){
  jQuery('.topics-btn .fa').toggleClass('fa-activate');
  jQuery('.category-menu-wrap').toggleClass('category-menu-visible');
  jQuery('.darken').toggleClass("darken-active");
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

jQuery('.top-widgets h2').on('click', function() {
	jQuery(this).parent().toggleClass('top-widgets-reveal');
  jQuery(this).find('.expand').html(jQuery(this).find('.expand').html() === '+' ? '&#45;' : '&#43;');
});


jQuery('.sidebar span:nth-of-type(1)').addClass('active');



/* MENU ITEMS ACTIVE SCROLL */
// Cache selectors
var lastId,
    sideMenu = jQuery(".sidebar"),
    // All list items
    menuItems = sideMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = jQuery(jQuery(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
  var href = jQuery(this).attr("href"),
      offsetTop = href === "#" ? 0 : jQuery(href).offset().top-200;
  jQuery('html, body').stop().animate({
      scrollTop: offsetTop
  }, 300);
  e.preventDefault();
});

var lastScrollTop = 0;
var passedHeader = false;
var headCurHeight = jQuery('.category-menu-wrap').height;



jQuery( document ).ready(function() {
  if (jQuery('.sidebar').length){
    var $sidebar = jQuery('.sidebar');
    var $container = jQuery('.syllabus-container');
    var $writerContainer = jQuery('.writer-container');
    var sideBottom = parseFloat($sidebar.css('top')) + $sidebar.height();
    var contBottom = $container.offset().top + $container.height();
    console.log("SideBottom = " + sideBottom);
    console.log("contBottom = " + contBottom);
  }

// Bind to scroll
jQuery(window).scroll(function(){
   // Get container scroll position
   var fromTop = jQuery(this).scrollTop()+210;

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
