/*!
 * jQuery UI Core 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/category/ui-core/
 */
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)}(function(e){function t(t,n){var s,a,o,r=t.nodeName.toLowerCase();return"area"===r?(a=(s=t.parentNode).name,!(!t.href||!a||"map"!==s.nodeName.toLowerCase())&&(!!(o=e("img[usemap='#"+a+"']")[0])&&i(o))):(/^(input|select|textarea|button|object)$/.test(r)?!t.disabled:"a"===r&&t.href||n)&&i(t)}function i(t){return e.expr.filters.visible(t)&&!e(t).parents().addBack().filter(function(){return"hidden"===e.css(this,"visibility")}).length}var n,s,a,o;e.ui=e.ui||{},e.extend(e.ui,{version:"1.11.4",keyCode:{BACKSPACE:8,COMMA:188,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SPACE:32,TAB:9,UP:38}}),e.fn.extend({scrollParent:function(t){var i=this.css("position"),n="absolute"===i,s=t?/(auto|scroll|hidden)/:/(auto|scroll)/,a=this.parents().filter(function(){var t=e(this);return(!n||"static"!==t.css("position"))&&s.test(t.css("overflow")+t.css("overflow-y")+t.css("overflow-x"))}).eq(0);return"fixed"!==i&&a.length?a:e(this[0].ownerDocument||document)},uniqueId:(n=0,function(){return this.each(function(){this.id||(this.id="ui-id-"+ ++n)})}),removeUniqueId:function(){return this.each(function(){/^ui-id-\d+$/.test(this.id)&&e(this).removeAttr("id")})}}),e.extend(e.expr[":"],{data:e.expr.createPseudo?e.expr.createPseudo(function(t){return function(i){return!!e.data(i,t)}}):function(t,i,n){return!!e.data(t,n[3])},focusable:function(i){return t(i,!isNaN(e.attr(i,"tabindex")))},tabbable:function(i){var n=e.attr(i,"tabindex"),s=isNaN(n);return(s||n>=0)&&t(i,!s)}}),e("<a>").outerWidth(1).jquery||e.each(["Width","Height"],function(t,i){function n(t,i,n,a){return e.each(s,function(){i-=parseFloat(e.css(t,"padding"+this))||0,n&&(i-=parseFloat(e.css(t,"border"+this+"Width"))||0),a&&(i-=parseFloat(e.css(t,"margin"+this))||0)}),i}var s="Width"===i?["Left","Right"]:["Top","Bottom"],a=i.toLowerCase(),o={innerWidth:e.fn.innerWidth,innerHeight:e.fn.innerHeight,outerWidth:e.fn.outerWidth,outerHeight:e.fn.outerHeight};e.fn["inner"+i]=function(t){return t===undefined?o["inner"+i].call(this):this.each(function(){e(this).css(a,n(this,t)+"px")})},e.fn["outer"+i]=function(t,s){return"number"!=typeof t?o["outer"+i].call(this,t):this.each(function(){e(this).css(a,n(this,t,!0,s)+"px")})}}),e.fn.addBack||(e.fn.addBack=function(e){return this.add(null==e?this.prevObject:this.prevObject.filter(e))}),e("<a>").data("a-b","a").removeData("a-b").data("a-b")&&(e.fn.removeData=(s=e.fn.removeData,function(t){return arguments.length?s.call(this,e.camelCase(t)):s.call(this)})),e.ui.ie=!!/msie [\w.]+/.exec(navigator.userAgent.toLowerCase()),e.fn.extend({focus:(o=e.fn.focus,function(t,i){return"number"==typeof t?this.each(function(){var n=this;setTimeout(function(){e(n).focus(),i&&i.call(n)},t)}):o.apply(this,arguments)}),disableSelection:(a="onselectstart"in document.createElement("div")?"selectstart":"mousedown",function(){return this.bind(a+".ui-disableSelection",function(e){e.preventDefault()})}),enableSelection:function(){return this.unbind(".ui-disableSelection")},zIndex:function(t){if(t!==undefined)return this.css("zIndex",t);if(this.length)for(var i,n,s=e(this[0]);s.length&&s[0]!==document;){if(("absolute"===(i=s.css("position"))||"relative"===i||"fixed"===i)&&(n=parseInt(s.css("zIndex"),10),!isNaN(n)&&0!==n))return n;s=s.parent()}return 0}}),e.ui.plugin={add:function(t,i,n){var s,a=e.ui[t].prototype;for(s in n)a.plugins[s]=a.plugins[s]||[],a.plugins[s].push([i,n[s]])},call:function(e,t,i,n){var s,a=e.plugins[t];if(a&&(n||e.element[0].parentNode&&11!==e.element[0].parentNode.nodeType))for(s=0;s<a.length;s++)e.options[a[s][0]]&&a[s][1].apply(e.element,i)}}}),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)}(function(e){return e.ui=e.ui||{},e.ui.version="1.12.1"}),
/*!
 * jQuery UI Widget 1.12.1
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 */
function(e){"function"==typeof define&&define.amd?define(["jquery","./version"],e):e(jQuery)}(function(e){var t,i=0,n=Array.prototype.slice;return e.cleanData=(t=e.cleanData,function(i){var n,s,a;for(a=0;null!=(s=i[a]);a++)try{(n=e._data(s,"events"))&&n.remove&&e(s).triggerHandler("remove")}catch(o){}t(i)}),e.widget=function(t,i,n){var s,a,o,r={},h=t.split(".")[0],d=h+"-"+(t=t.split(".")[1]);return n||(n=i,i=e.Widget),e.isArray(n)&&(n=e.extend.apply(null,[{}].concat(n))),e.expr[":"][d.toLowerCase()]=function(t){return!!e.data(t,d)},e[h]=e[h]||{},s=e[h][t],a=e[h][t]=function(e,t){if(!this._createWidget)return new a(e,t);arguments.length&&this._createWidget(e,t)},e.extend(a,s,{version:n.version,_proto:e.extend({},n),_childConstructors:[]}),(o=new i).options=e.widget.extend({},o.options),e.each(n,function(t,n){e.isFunction(n)?r[t]=function(){function e(){return i.prototype[t].apply(this,arguments)}function s(e){return i.prototype[t].apply(this,e)}return function(){var t,i=this._super,a=this._superApply;return this._super=e,this._superApply=s,t=n.apply(this,arguments),this._super=i,this._superApply=a,t}}():r[t]=n}),a.prototype=e.widget.extend(o,{widgetEventPrefix:s&&o.widgetEventPrefix||t},r,{constructor:a,namespace:h,widgetName:t,widgetFullName:d}),s?(e.each(s._childConstructors,function(t,i){var n=i.prototype;e.widget(n.namespace+"."+n.widgetName,a,i._proto)}),delete s._childConstructors):i._childConstructors.push(a),e.widget.bridge(t,a),a},e.widget.extend=function(t){for(var i,s,a=n.call(arguments,1),o=0,r=a.length;o<r;o++)for(i in a[o])s=a[o][i],a[o].hasOwnProperty(i)&&s!==undefined&&(e.isPlainObject(s)?t[i]=e.isPlainObject(t[i])?e.widget.extend({},t[i],s):e.widget.extend({},s):t[i]=s);return t},e.widget.bridge=function(t,i){var s=i.prototype.widgetFullName||t;e.fn[t]=function(a){var o="string"==typeof a,r=n.call(arguments,1),h=this;return o?this.length||"instance"!==a?this.each(function(){var i,n=e.data(this,s);return"instance"===a?(h=n,!1):n?e.isFunction(n[a])&&"_"!==a.charAt(0)?(i=n[a].apply(n,r))!==n&&i!==undefined?(h=i&&i.jquery?h.pushStack(i.get()):i,!1):void 0:e.error("no such method '"+a+"' for "+t+" widget instance"):e.error("cannot call methods on "+t+" prior to initialization; attempted to call method '"+a+"'")}):h=undefined:(r.length&&(a=e.widget.extend.apply(null,[a].concat(r))),this.each(function(){var t=e.data(this,s);t?(t.option(a||{}),t._init&&t._init()):e.data(this,s,new i(a,this))})),h}},e.Widget=function(){},e.Widget._childConstructors=[],e.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",defaultElement:"<div>",options:{classes:{},disabled:!1,create:null},_createWidget:function(t,n){n=e(n||this.defaultElement||this)[0],this.element=e(n),this.uuid=i++,this.eventNamespace="."+this.widgetName+this.uuid,this.bindings=e(),this.hoverable=e(),this.focusable=e(),this.classesElementLookup={},n!==this&&(e.data(n,this.widgetFullName,this),this._on(!0,this.element,{remove:function(e){e.target===n&&this.destroy()}}),this.document=e(n.style?n.ownerDocument:n.document||n),this.window=e(this.document[0].defaultView||this.document[0].parentWindow)),this.options=e.widget.extend({},this.options,this._getCreateOptions(),t),this._create(),this.options.disabled&&this._setOptionDisabled(this.options.disabled),this._trigger("create",null,this._getCreateEventData()),this._init()},_getCreateOptions:function(){return{}},_getCreateEventData:e.noop,_create:e.noop,_init:e.noop,destroy:function(){var t=this;this._destroy(),e.each(this.classesElementLookup,function(e,i){t._removeClass(i,e)}),this.element.off(this.eventNamespace).removeData(this.widgetFullName),this.widget().off(this.eventNamespace).removeAttr("aria-disabled"),this.bindings.off(this.eventNamespace)},_destroy:e.noop,widget:function(){return this.element},option:function(t,i){var n,s,a,o=t;if(0===arguments.length)return e.widget.extend({},this.options);if("string"==typeof t)if(o={},t=(n=t.split(".")).shift(),n.length){for(s=o[t]=e.widget.extend({},this.options[t]),a=0;a<n.length-1;a++)s[n[a]]=s[n[a]]||{},s=s[n[a]];if(t=n.pop(),1===arguments.length)return s[t]===undefined?null:s[t];s[t]=i}else{if(1===arguments.length)return this.options[t]===undefined?null:this.options[t];o[t]=i}return this._setOptions(o),this},_setOptions:function(e){var t;for(t in e)this._setOption(t,e[t]);return this},_setOption:function(e,t){return"classes"===e&&this._setOptionClasses(t),this.options[e]=t,"disabled"===e&&this._setOptionDisabled(t),this},_setOptionClasses:function(t){var i,n,s;for(i in t)s=this.classesElementLookup[i],t[i]!==this.options.classes[i]&&s&&s.length&&(n=e(s.get()),this._removeClass(s,i),n.addClass(this._classes({element:n,keys:i,classes:t,add:!0})))},_setOptionDisabled:function(e){this._toggleClass(this.widget(),this.widgetFullName+"-disabled",null,!!e),e&&(this._removeClass(this.hoverable,null,"ui-state-hover"),this._removeClass(this.focusable,null,"ui-state-focus"))},enable:function(){return this._setOptions({disabled:!1})},disable:function(){return this._setOptions({disabled:!0})},_classes:function(t){function i(i,a){var o,r;for(r=0;r<i.length;r++)o=s.classesElementLookup[i[r]]||e(),o=t.add?e(e.unique(o.get().concat(t.element.get()))):e(o.not(t.element).get()),s.classesElementLookup[i[r]]=o,n.push(i[r]),a&&t.classes[i[r]]&&n.push(t.classes[i[r]])}var n=[],s=this;return t=e.extend({element:this.element,classes:this.options.classes||{}},t),this._on(t.element,{remove:"_untrackClassesElement"}),t.keys&&i(t.keys.match(/\S+/g)||[],!0),t.extra&&i(t.extra.match(/\S+/g)||[]),n.join(" ")},_untrackClassesElement:function(t){var i=this;e.each(i.classesElementLookup,function(n,s){-1!==e.inArray(t.target,s)&&(i.classesElementLookup[n]=e(s.not(t.target).get()))})},_removeClass:function(e,t,i){return this._toggleClass(e,t,i,!1)},_addClass:function(e,t,i){return this._toggleClass(e,t,i,!0)},_toggleClass:function(e,t,i,n){n="boolean"==typeof n?n:i;var s="string"==typeof e||null===e,a={extra:s?t:i,keys:s?e:t,element:s?this.element:e,add:n};return a.element.toggleClass(this._classes(a),n),this},_on:function(t,i,n){var s,a=this;"boolean"!=typeof t&&(n=i,i=t,t=!1),n?(i=s=e(i),this.bindings=this.bindings.add(i)):(n=i,i=this.element,s=this.widget()),e.each(n,function(n,o){function r(){if(t||!0!==a.options.disabled&&!e(this).hasClass("ui-state-disabled"))return("string"==typeof o?a[o]:o).apply(a,arguments)}"string"!=typeof o&&(r.guid=o.guid=o.guid||r.guid||e.guid++);var h=n.match(/^([\w:-]*)\s*(.*)$/),d=h[1]+a.eventNamespace,c=h[2];c?s.on(d,c,r):i.on(d,r)})},_off:function(t,i){i=(i||"").split(" ").join(this.eventNamespace+" ")+this.eventNamespace,t.off(i).off(i),this.bindings=e(this.bindings.not(t).get()),this.focusable=e(this.focusable.not(t).get()),this.hoverable=e(this.hoverable.not(t).get())},_delay:function(e,t){function i(){return("string"==typeof e?n[e]:e).apply(n,arguments)}var n=this;return setTimeout(i,t||0)},_hoverable:function(t){this.hoverable=this.hoverable.add(t),this._on(t,{mouseenter:function(t){this._addClass(e(t.currentTarget),null,"ui-state-hover")},mouseleave:function(t){this._removeClass(e(t.currentTarget),null,"ui-state-hover")}})},_focusable:function(t){this.focusable=this.focusable.add(t),this._on(t,{focusin:function(t){this._addClass(e(t.currentTarget),null,"ui-state-focus")},focusout:function(t){this._removeClass(e(t.currentTarget),null,"ui-state-focus")}})},_trigger:function(t,i,n){var s,a,o=this.options[t];if(n=n||{},(i=e.Event(i)).type=(t===this.widgetEventPrefix?t:this.widgetEventPrefix+t).toLowerCase(),i.target=this.element[0],a=i.originalEvent)for(s in a)s in i||(i[s]=a[s]);return this.element.trigger(i,n),!(e.isFunction(o)&&!1===o.apply(this.element[0],[i].concat(n))||i.isDefaultPrevented())}},e.each({show:"fadeIn",hide:"fadeOut"},function(t,i){e.Widget.prototype["_"+t]=function(n,s,a){var o;"string"==typeof s&&(s={effect:s});var r=s?!0===s||"number"==typeof s?i:s.effect||i:t;"number"==typeof(s=s||{})&&(s={duration:s}),o=!e.isEmptyObject(s),s.complete=a,s.delay&&n.delay(s.delay),o&&e.effects&&e.effects.effect[r]?n[t](s):r!==t&&n[r]?n[r](s.duration,s.easing,a):n.queue(function(i){e(this)[t](),a&&a.call(n[0]),i()})}}),e.widget}),
/*!
 * jQuery UI Accordion 1.11.4
 * http://jqueryui.com
 *
 * Copyright jQuery Foundation and other contributors
 * Released under the MIT license.
 * http://jquery.org/license
 *
 * http://api.jqueryui.com/accordion/
 */
function(e){"function"==typeof define&&define.amd?define(["jquery","./core","./widget"],e):e(jQuery)}(function(e){return e.widget("ui.accordion",{version:"1.11.4",options:{active:0,animate:{},collapsible:!1,event:"click",header:"> li > :first-child,> :not(li):even",heightStyle:"auto",icons:{activeHeader:"ui-icon-triangle-1-s",header:"ui-icon-triangle-1-e"},activate:null,beforeActivate:null},hideProps:{borderTopWidth:"hide",borderBottomWidth:"hide",paddingTop:"hide",paddingBottom:"hide",height:"hide"},showProps:{borderTopWidth:"show",borderBottomWidth:"show",paddingTop:"show",paddingBottom:"show",height:"show"},_create:function(){var t=this.options;this.prevShow=this.prevHide=e(),this.element.addClass("ui-accordion ui-widget ui-helper-reset").attr("role","tablist"),t.collapsible||!1!==t.active&&null!=t.active||(t.active=0),this._processPanels(),t.active<0&&(t.active+=this.headers.length),this._refresh()},_getCreateEventData:function(){return{header:this.active,panel:this.active.length?this.active.next():e()}},_createIcons:function(){var t=this.options.icons;t&&(e("<span>").addClass("ui-accordion-header-icon ui-icon "+t.header).prependTo(this.headers),this.active.children(".ui-accordion-header-icon").removeClass(t.header).addClass(t.activeHeader),this.headers.addClass("ui-accordion-icons"))},_destroyIcons:function(){this.headers.removeClass("ui-accordion-icons").children(".ui-accordion-header-icon").remove()},_destroy:function(){var e;this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"),this.headers.removeClass("ui-accordion-header ui-accordion-header-active ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-selected").removeAttr("aria-controls").removeAttr("tabIndex").removeUniqueId(),this._destroyIcons(),e=this.headers.next().removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-state-disabled").css("display","").removeAttr("role").removeAttr("aria-hidden").removeAttr("aria-labelledby").removeUniqueId(),"content"!==this.options.heightStyle&&e.css("height","")},_setOption:function(e,t){"active"!==e?("event"===e&&(this.options.event&&this._off(this.headers,this.options.event),this._setupEvents(t)),this._super(e,t),"collapsible"!==e||t||!1!==this.options.active||this._activate(0),"icons"===e&&(this._destroyIcons(),t&&this._createIcons()),"disabled"===e&&(this.element.toggleClass("ui-state-disabled",!!t).attr("aria-disabled",t),this.headers.add(this.headers.next()).toggleClass("ui-state-disabled",!!t))):this._activate(t)},_keydown:function(t){if(!t.altKey&&!t.ctrlKey){var i=e.ui.keyCode,n=this.headers.length,s=this.headers.index(t.target),a=!1;switch(t.keyCode){case i.RIGHT:case i.DOWN:a=this.headers[(s+1)%n];break;case i.LEFT:case i.UP:a=this.headers[(s-1+n)%n];break;case i.SPACE:case i.ENTER:this._eventHandler(t);break;case i.HOME:a=this.headers[0];break;case i.END:a=this.headers[n-1]}a&&(e(t.target).attr("tabIndex",-1),e(a).attr("tabIndex",0),a.focus(),t.preventDefault())}},_panelKeyDown:function(t){t.keyCode===e.ui.keyCode.UP&&t.ctrlKey&&e(t.currentTarget).prev().focus()},refresh:function(){var t=this.options;this._processPanels(),!1===t.active&&!0===t.collapsible||!this.headers.length?(t.active=!1,this.active=e()):!1===t.active?this._activate(0):this.active.length&&!e.contains(this.element[0],this.active[0])?this.headers.length===this.headers.find(".ui-state-disabled").length?(t.active=!1,this.active=e()):this._activate(Math.max(0,t.active-1)):t.active=this.headers.index(this.active),this._destroyIcons(),this._refresh()},_processPanels:function(){var e=this.headers,t=this.panels;this.headers=this.element.find(this.options.header).addClass("ui-accordion-header ui-state-default ui-corner-all"),this.panels=this.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").filter(":not(.ui-accordion-content-active)").hide(),t&&(this._off(e.not(this.headers)),this._off(t.not(this.panels)))},_refresh:function(){var t,i=this.options,n=i.heightStyle,s=this.element.parent();this.active=this._findActive(i.active).addClass("ui-accordion-header-active ui-state-active ui-corner-top").removeClass("ui-corner-all"),this.active.next().addClass("ui-accordion-content-active").show(),this.headers.attr("role","tab").each(function(){var t=e(this),i=t.uniqueId().attr("id"),n=t.next(),s=n.uniqueId().attr("id");t.attr("aria-controls",s),n.attr("aria-labelledby",i)}).next().attr("role","tabpanel"),this.headers.not(this.active).attr({"aria-selected":"false","aria-expanded":"false",tabIndex:-1}).next().attr({"aria-hidden":"true"}).hide(),this.active.length?this.active.attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0}).next().attr({"aria-hidden":"false"}):this.headers.eq(0).attr("tabIndex",0),this._createIcons(),this._setupEvents(i.event),"fill"===n?(t=s.height(),this.element.siblings(":visible").each(function(){var i=e(this),n=i.css("position");"absolute"!==n&&"fixed"!==n&&(t-=i.outerHeight(!0))}),this.headers.each(function(){t-=e(this).outerHeight(!0)}),this.headers.next().each(function(){e(this).height(Math.max(0,t-e(this).innerHeight()+e(this).height()))}).css("overflow","auto")):"auto"===n&&(t=0,this.headers.next().each(function(){t=Math.max(t,e(this).css("height","").height())}).height(t))},_activate:function(t){var i=this._findActive(t)[0];i!==this.active[0]&&(i=i||this.active[0],this._eventHandler({target:i,currentTarget:i,preventDefault:e.noop}))},_findActive:function(t){return"number"==typeof t?this.headers.eq(t):e()},_setupEvents:function(t){var i={keydown:"_keydown"};t&&e.each(t.split(" "),function(e,t){i[t]="_eventHandler"}),this._off(this.headers.add(this.headers.next())),this._on(this.headers,i),this._on(this.headers.next(),{keydown:"_panelKeyDown"}),this._hoverable(this.headers),this._focusable(this.headers)},_eventHandler:function(t){var i=this.options,n=this.active,s=e(t.currentTarget),a=s[0]===n[0],o=a&&i.collapsible,r=o?e():s.next(),h={oldHeader:n,oldPanel:n.next(),newHeader:o?e():s,newPanel:r};t.preventDefault(),a&&!i.collapsible||!1===this._trigger("beforeActivate",t,h)||(i.active=!o&&this.headers.index(s),this.active=a?e():s,this._toggle(h),n.removeClass("ui-accordion-header-active ui-state-active"),i.icons&&n.children(".ui-accordion-header-icon").removeClass(i.icons.activeHeader).addClass(i.icons.header),a||(s.removeClass("ui-corner-all").addClass("ui-accordion-header-active ui-state-active ui-corner-top"),i.icons&&s.children(".ui-accordion-header-icon").removeClass(i.icons.header).addClass(i.icons.activeHeader),s.next().addClass("ui-accordion-content-active")))},_toggle:function(t){var i=t.newPanel,n=this.prevShow.length?this.prevShow:t.oldPanel;this.prevShow.add(this.prevHide).stop(!0,!0),this.prevShow=i,this.prevHide=n,this.options.animate?this._animate(i,n,t):(n.hide(),i.show(),this._toggleComplete(t)),n.attr({"aria-hidden":"true"}),n.prev().attr({"aria-selected":"false","aria-expanded":"false"}),i.length&&n.length?n.prev().attr({tabIndex:-1,"aria-expanded":"false"}):i.length&&this.headers.filter(function(){return 0===parseInt(e(this).attr("tabIndex"),10)}).attr("tabIndex",-1),i.attr("aria-hidden","false").prev().attr({"aria-selected":"true","aria-expanded":"true",tabIndex:0})},_animate:function(e,t,i){var n,s,a,o=this,r=0,h=e.css("box-sizing"),d=e.length&&(!t.length||e.index()<t.index()),c=this.options.animate||{},l=d&&c.down||c,u=function(){o._toggleComplete(i)};return"number"==typeof l&&(a=l),"string"==typeof l&&(s=l),s=s||l.easing||c.easing,a=a||l.duration||c.duration,t.length?e.length?(n=e.show().outerHeight(),t.animate(this.hideProps,{duration:a,easing:s,step:function(e,t){t.now=Math.round(e)}}),void e.hide().animate(this.showProps,{duration:a,easing:s,complete:u,step:function(e,i){i.now=Math.round(e),"height"!==i.prop?"content-box"===h&&(r+=i.now):"content"!==o.options.heightStyle&&(i.now=Math.round(n-t.outerHeight()-r),r=0)}})):t.animate(this.hideProps,a,s,u):e.animate(this.showProps,a,s,u)},_toggleComplete:function(e){var t=e.oldPanel;t.removeClass("ui-accordion-content-active").prev().removeClass("ui-corner-top").addClass("ui-corner-all"),t.length&&(t.parent()[0].className=t.parent()[0].className),this._trigger("activate",null,e)}})});