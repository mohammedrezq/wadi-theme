/*! For license information please see navigation.js.LICENSE */
(()=>{function c(e,t){var n="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!n){if(Array.isArray(e)||(n=function(e,t){if(e){if("string"==typeof e)return s(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Map"===(n="Object"===n&&e.constructor?e.constructor.name:n)||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?s(e,t):void 0}}(e))||t&&e&&"number"==typeof e.length){n&&(e=n);var r=0,t=function(){};return{s:t,n:function(){return r>=e.length?{done:!0}:{done:!1,value:e[r++]}},e:function(e){throw e},f:t}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,o=!0,i=!1;return{s:function(){n=n.call(e)},n:function(){var e=n.next();return o=e.done,e},e:function(e){i=!0,a=e},f:function(){try{o||null==n.return||n.return()}finally{if(i)throw a}}}}function s(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}!function(){var t=document.getElementById("site-navigation");if(t){var n=t.getElementsByTagName("button")[0];if(void 0!==n){var e=t.getElementsByTagName("ul")[0];if(void 0!==e){e.classList.contains("nav-menu")||e.classList.add("nav-menu"),n.addEventListener("click",function(){t.classList.toggle("toggled"),"true"===n.getAttribute("aria-expanded")?n.setAttribute("aria-expanded","false"):n.setAttribute("aria-expanded","true")}),document.addEventListener("click",function(e){t.contains(e.target)||(t.classList.remove("toggled"),n.setAttribute("aria-expanded","false"))});var r,a=e.getElementsByTagName("a"),e=e.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a"),o=c(a);try{for(o.s();!(r=o.n()).done;){var i=r.value;i.addEventListener("focus",u,!0),i.addEventListener("blur",u,!0)}}catch(e){o.e(e)}finally{o.f()}var s,l=c(e);try{for(l.s();!(s=l.n()).done;)s.value.addEventListener("touchstart",u,!1)}catch(e){l.e(e)}finally{l.f()}}else n.style.display="none"}}function u(){if("focus"===event.type||"blur"===event.type)for(var e=this;!e.classList.contains("nav-menu");)"li"===e.tagName.toLowerCase()&&e.classList.toggle("focus"),e=e.parentNode;if("touchstart"===event.type){var t=this.parentNode;event.preventDefault();var n,r=c(t.parentNode.children);try{for(r.s();!(n=r.n()).done;){var a=n.value;t!==a&&a.classList.remove("focus")}}catch(e){r.e(e)}finally{r.f()}t.classList.toggle("focus")}}}()})();
//# sourceMappingURL=navigation.js.map