!function(a){var b="uic_table",c={init:function(c){var d=a.extend(!0,{css:["paddingLeft","paddingTop","paddingRight","paddingBottom","backgroundColor","backgroundImage"],additionalCSS:[]},a.fn.uicTable.defaults,c);return Array.isArray(d.additionalCSS)&&d.css.push.apply(d.css,d.additionalCSS),this.each(function(){var c=this,e=a(c),f=e.data(b);if(!f)if(window.CSS&&window.CSS.supports&&window.CSS.supports("(position: -webkit-sticky)"))e.find("thead:eq(0)").css({position:"-webkit-sticky",top:"0px"});else{e.data(b,{}),e.data(b).settings=d;var g=e.data(b).storage={arrHeaderDivs:[]},h=document.createElement("div");a(h).addClass("uicTable-Container"),a(h).css({position:"absolute",left:"0px",top:"0px",right:"0px",bottom:"0px",overflow:"auto"});var j=window.getComputedStyle?window.getComputedStyle(e.parent().get(0)).position:e.parent().get(0).currentStyle.position;"static"==j&&"body"!==e.parent().get(0).tagName.toLowerCase()&&e.parent().css("position","relative"),e.wrap(h),e.addClass("uicTable"),e.find("thead:eq(0) th","thead:eq(0) td").each(function(){var b=(a(this),document.createElement("div"));for(g.arrHeaderDivs.push(b),b.style.position="relative",i=0;i<d.css.length;i++)b.style[d.css[i]]=window.getComputedStyle?window.getComputedStyle(this)[d.css[i]]:this.currentStyle[d.css[i]]}),e.find("thead:eq(0) th","thead:eq(0) td").each(function(b){var c=a(this);for(i=0;i<d.css.length;i++)this.style[d.css[i]]="initial";a(g.arrHeaderDivs[b]).html(a(this).html()),c.html(g.arrHeaderDivs[b])}),e.closest(".uicTable-Container").on("scroll",function(){for(g.arrHeaderDivs,i=0;i<g.arrHeaderDivs.length;i++)g.arrHeaderDivs[i].style.top=this.scrollTop+"px"})}})}};a.fn.uicTable=function(b){return c[b]?c[b].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof b&&b?void a.error("Method "+b+" does not exist."):c.init.apply(this,arguments)}}(jQuery);