parcelRequire=function(e,r,t,n){var i,o="function"==typeof parcelRequire&&parcelRequire,u="function"==typeof require&&require;function f(t,n){if(!r[t]){if(!e[t]){var i="function"==typeof parcelRequire&&parcelRequire;if(!n&&i)return i(t,!0);if(o)return o(t,!0);if(u&&"string"==typeof t)return u(t);var c=new Error("Cannot find module '"+t+"'");throw c.code="MODULE_NOT_FOUND",c}p.resolve=function(r){return e[t][1][r]||r},p.cache={};var l=r[t]=new f.Module(t);e[t][0].call(l.exports,p,l,l.exports,this)}return r[t].exports;function p(e){return f(p.resolve(e))}}f.isParcelRequire=!0,f.Module=function(e){this.id=e,this.bundle=f,this.exports={}},f.modules=e,f.cache=r,f.parent=o,f.register=function(r,t){e[r]=[function(e,r){r.exports=t},{}]};for(var c=0;c<t.length;c++)try{f(t[c])}catch(e){i||(i=e)}if(t.length){var l=f(t[t.length-1]);"object"==typeof exports&&"undefined"!=typeof module?module.exports=l:"function"==typeof define&&define.amd?define(function(){return l}):n&&(this[n]=l)}if(parcelRequire=f,i)throw i;return f}({"jEQo":[function(require,module,exports) {
function e(e,o){(null==o||o>e.length)&&(o=e.length);for(var l=0,r=new Array(o);l<o;l++)r[l]=e[l];return r}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"o3SL":[function(require,module,exports) {
var r=require("./arrayLikeToArray.js");function e(e){if(Array.isArray(e))return r(e)}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{"./arrayLikeToArray.js":"jEQo"}],"lZpU":[function(require,module,exports) {
function e(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"Dbv9":[function(require,module,exports) {
var r=require("./arrayLikeToArray.js");function e(e,t){if(e){if("string"==typeof e)return r(e,t);var o=Object.prototype.toString.call(e).slice(8,-1);return"Object"===o&&e.constructor&&(o=e.constructor.name),"Map"===o||"Set"===o?Array.from(e):"Arguments"===o||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(o)?r(e,t):void 0}}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{"./arrayLikeToArray.js":"jEQo"}],"NCaH":[function(require,module,exports) {
function e(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"I9dH":[function(require,module,exports) {
var e=require("./arrayWithoutHoles.js"),r=require("./iterableToArray.js"),o=require("./unsupportedIterableToArray.js"),u=require("./nonIterableSpread.js");function t(t){return e(t)||r(t)||o(t)||u()}module.exports=t,module.exports.__esModule=!0,module.exports.default=module.exports;
},{"./arrayWithoutHoles.js":"o3SL","./iterableToArray.js":"lZpU","./unsupportedIterableToArray.js":"Dbv9","./nonIterableSpread.js":"NCaH"}],"DCTP":[function(require,module,exports) {
function e(e){if(Array.isArray(e))return e}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"LoeL":[function(require,module,exports) {
function l(l,e){var r=null==l?null:"undefined"!=typeof Symbol&&l[Symbol.iterator]||l["@@iterator"];if(null!=r){var t,o,u=[],n=!0,a=!1;try{for(r=r.call(l);!(n=(t=r.next()).done)&&(u.push(t.value),!e||u.length!==e);n=!0);}catch(d){a=!0,o=d}finally{try{n||null==r.return||r.return()}finally{if(a)throw o}}return u}}module.exports=l,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"MWEO":[function(require,module,exports) {
function e(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}module.exports=e,module.exports.__esModule=!0,module.exports.default=module.exports;
},{}],"DERy":[function(require,module,exports) {
var e=require("./arrayWithHoles.js"),r=require("./iterableToArrayLimit.js"),o=require("./unsupportedIterableToArray.js"),t=require("./nonIterableRest.js");function u(u,s){return e(u)||r(u,s)||o(u,s)||t()}module.exports=u,module.exports.__esModule=!0,module.exports.default=module.exports;
},{"./arrayWithHoles.js":"DCTP","./iterableToArrayLimit.js":"LoeL","./unsupportedIterableToArray.js":"Dbv9","./nonIterableRest.js":"MWEO"}],"gr8I":[function(require,module,exports) {
"use strict";Object.defineProperty(exports,"__esModule",{value:!0}),exports.EXTRA_DATA=exports.AVATAR_SIZES=void 0;var e=wp,s=e.i18n.__,l=[{label:s("None","buddypress"),value:"none"},{label:s("Thumb","buddypress"),value:"thumb"},{label:s("Full","buddypress"),value:"full"}];exports.AVATAR_SIZES=l;var t=[{label:s("None","buddypress"),value:"none"},{label:s("Last time the user was active","buddypress"),value:"last_activity"},{label:s("Latest activity the user posted","buddypress"),value:"latest_update"}];exports.EXTRA_DATA=t;
},{}],"PZSE":[function(require,module,exports) {
"use strict";Object.defineProperty(exports,"__esModule",{value:!0}),exports.default=void 0;var e=a(require("@babel/runtime/helpers/toConsumableArray")),t=a(require("@babel/runtime/helpers/slicedToArray")),n=require("./constants");function a(e){return e&&e.__esModule?e:{default:e}}var r=wp,s=r.blockEditor,l=s.InspectorControls,i=s.BlockControls,o=r.components,u=o.Placeholder,d=o.PanelBody,c=o.SelectControl,m=o.ToggleControl,p=o.Button,b=o.Dashicon,y=o.Tooltip,h=o.ToolbarGroup,v=o.RangeControl,f=r.element,g=f.createElement,_=f.Fragment,A=f.useState,k=r.i18n,C=k.__,x=k.sprintf,S=r.apiFetch,N=r.url.addQueryArgs,T=bp,D=T.blockComponents.AutoCompleter,I=T.blockData.isActive,M=lodash,P=M.reject,q=M.remove,w=M.sortBy,B=function(e){return e&&e.mention_name?e.mention_name:null},E=function(a){var r,s=a.attributes,o=a.setAttributes,f=a.isSelected,k=I("members","avatar"),T=I("activity","mentions"),M=s.itemIDs,E=s.avatarSize,R=s.displayMentionSlug,O=s.displayUserName,j=s.extraData,z=s.layoutPreference,L=s.columns,F=0!==M.length,G=A([]),Q=(0,t.default)(G,2),U=Q[0],V=Q[1],X=[{icon:"text",title:C("List view","buddypress"),onClick:function(){return o({layoutPreference:"list"})},isActive:"list"===z},{icon:"screenoptions",title:C("Grid view","buddypress"),onClick:function(){return o({layoutPreference:"grid"})},isActive:"grid"===z}],H="bp-block-members avatar-"+E,Z=n.EXTRA_DATA;"grid"===z&&(H+=" is-grid columns-"+L,Z=n.EXTRA_DATA.filter(function(e){return"latest_update"!==e.value}));return F&&M.length!==U.length&&S({path:N("/buddypress/v1/members",{populate_extras:!0,include:M})}).then(function(e){V(w(e,[function(e){return M.indexOf(e.id)}]))}),U.length&&(r=U.map(function(e){var t=!1,n="member-content";return"list"===z&&"latest_update"===j&&e.latest_update&&e.latest_update.rendered&&(t=!0,n="member-content has-activity"),g("div",{key:"bp-member-"+e.id,className:n},f&&g(y,{text:C("Remove member","buddypress")},g(p,{className:"is-right",onClick:function(){var t;(t=e.id)&&-1!==M.indexOf(t)&&(V(P(U,["id",t])),o({itemIDs:q(M,function(e){return e!==t})}))},label:C("Remove member","buddypress")},g(b,{icon:"no"}))),k&&"none"!==E&&g("div",{className:"item-header-avatar"},g("a",{href:e.link,target:"_blank"},g("img",{key:"avatar-"+e.id,className:"avatar",alt:x(C("Profile photo of %s","buddypress"),e.name),src:e.avatar_urls[E]}))),g("div",{className:"member-description"},t&&g("blockquote",{className:"wp-block-quote"},g("div",{dangerouslySetInnerHTML:{__html:e.latest_update.rendered}}),g("cite",null,O&&g("span",null,e.name)," ",T&&R&&g("a",{href:e.link,target:"_blank"},"(@",e.mention_name,")"))),!t&&O&&g("strong",null,g("a",{href:e.link,target:"_blank"},e.name)),!t&&T&&R&&g("span",{className:"user-nicename"},"@",e.mention_name),"last_activity"===j&&e.last_activity&&e.last_activity.date&&g("time",{dateTime:e.last_activity.date},x(C("Active %s","buddypress"),e.last_activity.timediff))))})),g(_,null,g(l,null,g(d,{title:C("Settings","buddypress"),initialOpen:!0},g(m,{label:C("Display the user name","buddypress"),checked:!!O,onChange:function(){o({displayUserName:!O})},help:C(O?"Include the user's display name.":"Toggle to include user's display name.","buddypress")}),T&&g(m,{label:C("Display Mention slug","buddypress"),checked:!!R,onChange:function(){o({displayMentionSlug:!R})},help:C(R?"Include the user's mention name under their display name.":"Toggle to display the user's mention name under their display name.","buddypress")}),k&&g(c,{label:C("Avatar size","buddypress"),value:E,options:n.AVATAR_SIZES,help:C('Select "None" to disable the avatar.',"buddypress"),onChange:function(e){o({avatarSize:e})}}),g(c,{label:C("BuddyPress extra information","buddypress"),value:j,options:Z,help:C('Select "None" to show no extra information.',"buddypress"),onChange:function(e){o({extraData:e})}}),"grid"===z&&g(v,{label:C("Columns","buddypress"),value:L,onChange:function(e){return o({columns:e})},min:2,max:4,required:!0}))),g(i,null,g(h,{controls:X})),F&&g("div",{className:H},r),(f||0===M.length)&&g(u,{icon:F?"":"groups",label:F?"":C("BuddyPress Members","buddypress"),instructions:C("Start typing the name of the member you want to add to the members list.","buddypress"),className:0!==M.length?"is-appender":"is-large"},g(D,{component:"members",objectQueryArgs:{exclude:M},slugValue:B,ariaLabel:C("Member's username","buddypress"),placeholder:C("Enter Member's username here…","buddypress"),onSelectItem:function(t){var n=t.itemID;n&&-1===M.indexOf(n)&&o({itemIDs:[].concat((0,e.default)(M),[parseInt(n,10)])})},useAvatar:k})))},R=E;exports.default=R;
},{"@babel/runtime/helpers/toConsumableArray":"I9dH","@babel/runtime/helpers/slicedToArray":"DERy","./constants":"gr8I"}],"XEHU":[function(require,module,exports) {
"use strict";var e=t(require("./members/edit"));function t(e){return e&&e.__esModule?e:{default:e}}var r=wp,s=r.blocks.registerBlockType,a=r.i18n.__;s("bp/members",{title:a("Members","buddypress"),description:a("BuddyPress Members.","buddypress"),icon:{background:"#fff",foreground:"#d84800",src:"groups"},category:"buddypress",attributes:{itemIDs:{type:"array",items:{type:"integer"},default:[]},avatarSize:{type:"string",default:"full"},displayMentionSlug:{type:"boolean",default:!0},displayUserName:{type:"boolean",default:!0},extraData:{type:"string",default:"none"},layoutPreference:{type:"string",default:"list"},columns:{type:"number",default:2}},edit:e.default});
},{"./members/edit":"PZSE"}]},{},["XEHU"], null)
//# sourceMappingURL=/bp-members/js/blocks/members.js.map