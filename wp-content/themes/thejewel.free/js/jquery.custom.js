if("undefined"===typeof console){var console={};console.log=console.error=console.info=console.debug=console.warn=console.trace=console.dir=console.dirxml=console.group=console.groupEnd=console.time=console.timeEnd=console.assert=console.profile=function(){}}
jQuery(document).ready(function(a){a("body").removeClass("no_js").addClass("yes_js");YIT_Browser.isIE8()&&a("*:last-child").addClass("last-child");YIT_Browser.isIE10()&&a("html").attr("id","ie10").addClass("ie");a.fn.placeholder&&a("input[placeholder], textarea[placeholder]").placeholder();var d=a(".woocommerce-ordering select, .faq-filters select");0<d.length&&d.selectbox({effect:"fade"});a("#nav li.megamenu").hover(function(){var b=a(this).children("ul.sub-menu"),c=parseInt(b.css("padding-left").replace("px",
    ""))+parseInt(b.css("padding-right").replace("px","")),e=b.outerWidth(!0),d=b.position().left;b.children("li").each(function(){c+=a(this).outerWidth(!0)});c>e&&b.css({left:d-(c-e+10)})},function(){});a(window).resize(function(){a("#nav li.megamenu > ul.sub-menu").css({left:"",top:""})});a(".ch-item").bind("mouseenter mouseleave",function(a){});a('form input[type="text"], form textarea').focus(function(){a(this).parent().find("label.hide-label").hide()}).blur(function(){""==a(this).val()&&a(this).parent().find("label.hide-label").show()}).each(function(){""!=
    a(this).val()&&a(this).parent().find("label.hide-label").is(":visible")&&a(this).parent().find("label.hide-label").hide()});(function(){jQuery("body").hasClass("isMobile")?(jQuery("a.thumb.img, .overlay_img, .section .related_proj, a.ch-info-lightbox").colorbox({transition:"elastic",rel:"lightbox",fixed:!0,maxWidth:"100%",maxHeight:"100%",opacity:0.7}),jQuery(".section .related_lightbox").colorbox({transition:"elastic",rel:"lightbox2",fixed:!0,maxWidth:"100%",maxHeight:"100%",opacity:0.7})):(jQuery("a.thumb.img, .overlay_img, .section.portfolio .related_proj, a.ch-info-lightbox, a.ch-info-lightbox").colorbox({transition:"elastic",
    rel:"lightbox",fixed:!0,maxWidth:"80%",maxHeight:"80%",opacity:0.7}),jQuery(".section.portfolio .related_lightbox").colorbox({transition:"elastic",rel:"lightbox2",fixed:!0,maxWidth:"80%",maxHeight:"80%",opacity:0.7}));jQuery("a.thumb.video, .overlay_video, .section.portfolio .related_video, a.ch-info-lightbox-video").colorbox({transition:"elastic",rel:"lightbox",fixed:!0,maxWidth:"60%",maxHeight:"80%",innerWidth:"60%",innerHeight:"80%",opacity:0.7,iframe:!0,onOpen:function(){a("#cBoxContent").css({"-webkit-overflow-scrolling":"touch"})}});
    jQuery(".section.portfolio .lightbox_related_video").colorbox({transition:"elastic",rel:"lightbox2",fixed:!0,maxWidth:"60%",maxHeight:"80%",innerWidth:"60%",innerHeight:"80%",opacity:0.7,iframe:!0,onOpen:function(){a("#cBoxContent").css({"-webkit-overflow-scrolling":"touch"})}})})();a(".picture_overlay").hover(function(){var b=a(this).find(".overlay div").innerWidth(),c=a(this).find(".overlay div").innerHeight();a(this).find(".overlay div").css({"margin-top":-c/2,"margin-left":-b/2});YIT_Browser.isIE8()&&
a(this).find(".overlay > div").show()},function(){YIT_Browser.isIE8()&&a(this).find(".overlay > div").hide()}).each(function(){var b=a(this).find(".overlay div").innerWidth(),c=a(this).find(".overlay div").innerHeight();a(this).find(".overlay div").css({"margin-top":-c/2,"margin-left":-b/2})});a("#primary").imagesLoaded(function(){0<a("#footer").length?a("#footer").stickyFooter():a("#copyright").stickyFooter()});a(".portfolio-simply").each(function(){var b,c=a(this);(b=function(){var a=c.find(".work-skillsdate").height()+
    14;c.find(".work-description").css("padding-bottom",a+"px")})();a(window).resize(b)});a(".opera .quantity input.input-text.qty").replaceWith(function(){a(this).attr("value");return'<input type="text" class="input-text qty text" name="quantity" value="'+a(this).attr("value")+'" />'});a("#back-top").hide();a(function(){a(window).scroll(function(){100<a(this).scrollTop()?a("#back-top").fadeIn():a("#back-top").fadeOut()});a("#back-top a").click(function(){a("body,html").animate({scrollTop:0},800);return!1})});
    a("a.bookmark").click(function(b){b.preventDefault();b=a(this).attr("href");var c=a(this).attr("title");if(window.sidebar)window.sidebar.addPanel(c,b,"");else if(window.external)window.external.AddFavorite(b,c);else if(window.opera&&window.print)return!0})});