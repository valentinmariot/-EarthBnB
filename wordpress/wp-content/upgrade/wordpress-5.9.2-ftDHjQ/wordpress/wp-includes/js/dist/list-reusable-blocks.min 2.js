/*! This file is auto-generated */
this.wp=this.wp||{},this.wp.listReusableBlocks=function(e){var t={};function n(o){if(t[o])return t[o].exports;var i=t[o]={i:o,l:!1,exports:{}};return e[o].call(i.exports,i,i.exports,n),i.l=!0,i.exports}return n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(o,i,function(t){return e[t]}.bind(null,i));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s="SdGz")}({GRId:function(e,t){e.exports=window.wp.element},K9lf:function(e,t){e.exports=window.wp.compose},SdGz:function(e,t,n){"use strict";n.r(t);var o=n("GRId"),i=n("l3Sj"),r=n("YLtl"),s=n("ywyh"),l=n.n(s);var a=async function(e){const t=await l()({path:"/wp/v2/types/wp_block"}),n=await l()({path:`/wp/v2/${t.rest_base}/${e}?context=edit`}),o=n.title.raw,i=n.content.raw,s=JSON.stringify({__file:"wp_block",title:o,content:i},null,2);!function(e,t,n){const o=new window.Blob([t],{type:n});if(window.navigator.msSaveOrOpenBlob)window.navigator.msSaveOrOpenBlob(o,e);else{const t=document.createElement("a");t.href=URL.createObjectURL(o),t.download=e,t.style.display="none",document.body.appendChild(t),t.click(),document.body.removeChild(t)}}(Object(r.kebabCase)(o)+".json",s,"application/json")},c=n("tI+e"),u=n("K9lf");var d=async function(e){const t=await function(e){const t=new window.FileReader;return new Promise(n=>{t.onload=()=>{n(t.result)},t.readAsText(e)})}(e);let n;try{n=JSON.parse(t)}catch(e){throw new Error("Invalid JSON file")}if(!("wp_block"===n.__file&&n.title&&n.content&&Object(r.isString)(n.title)&&Object(r.isString)(n.content)))throw new Error("Invalid Reusable block JSON file");const o=await l()({path:"/wp/v2/types/wp_block"});return await l()({path:"/wp/v2/"+o.rest_base,data:{title:n.title,content:n.content,status:"publish"},method:"POST"})};class p extends o.Component{constructor(){super(...arguments),this.state={isLoading:!1,error:null,file:null},this.isStillMounted=!0,this.onChangeFile=this.onChangeFile.bind(this),this.onSubmit=this.onSubmit.bind(this)}componentWillUnmount(){this.isStillMounted=!1}onChangeFile(e){this.setState({file:e.target.files[0],error:null})}onSubmit(e){e.preventDefault();const{file:t}=this.state,{onUpload:n}=this.props;t&&(this.setState({isLoading:!0}),d(t).then(e=>{this.isStillMounted&&(this.setState({isLoading:!1}),n(e))}).catch(e=>{if(!this.isStillMounted)return;let t;switch(e.message){case"Invalid JSON file":t=Object(i.__)("Invalid JSON file");break;case"Invalid Reusable block JSON file":t=Object(i.__)("Invalid Reusable block JSON file");break;default:t=Object(i.__)("Unknown error")}this.setState({isLoading:!1,error:t})}))}onDismissError(){this.setState({error:null})}render(){const{instanceId:e}=this.props,{file:t,isLoading:n,error:r}=this.state,s="list-reusable-blocks-import-form-"+e;return Object(o.createElement)("form",{className:"list-reusable-blocks-import-form",onSubmit:this.onSubmit},r&&Object(o.createElement)(c.Notice,{status:"error",onRemove:()=>this.onDismissError()},r),Object(o.createElement)("label",{htmlFor:s,className:"list-reusable-blocks-import-form__label"},Object(i.__)("File")),Object(o.createElement)("input",{id:s,type:"file",onChange:this.onChangeFile}),Object(o.createElement)(c.Button,{type:"submit",isBusy:n,disabled:!t||n,variant:"secondary",className:"list-reusable-blocks-import-form__button"},Object(i._x)("Import","button label")))}}var b=Object(u.withInstanceId)(p);var f=function(e){let{onUpload:t}=e;return Object(o.createElement)(c.Dropdown,{position:"bottom right",contentClassName:"list-reusable-blocks-import-dropdown__content",renderToggle:e=>{let{isOpen:t,onToggle:n}=e;return Object(o.createElement)(c.Button,{"aria-expanded":t,onClick:n,variant:"primary"},Object(i.__)("Import from JSON"))},renderContent:e=>{let{onClose:n}=e;return Object(o.createElement)(b,{onUpload:Object(r.flow)(n,t)})}})};document.body.addEventListener("click",e=>{e.target.classList.contains("wp-list-reusable-blocks__export")&&(e.preventDefault(),a(e.target.dataset.id))}),document.addEventListener("DOMContentLoaded",()=>{const e=document.querySelector(".page-title-action");if(!e)return;const t=document.createElement("div");t.className="list-reusable-blocks__container",e.parentNode.insertBefore(t,e),Object(o.render)(Object(o.createElement)(f,{onUpload:()=>{const e=document.createElement("div");e.className="notice notice-success is-dismissible",e.innerHTML=`<p>${Object(i.__)("Reusable block imported successfully!")}</p>`;const t=document.querySelector(".wp-header-end");t&&t.parentNode.insertBefore(e,t)}}),t)})},YLtl:function(e,t){e.exports=window.lodash},l3Sj:function(e,t){e.exports=window.wp.i18n},"tI+e":function(e,t){e.exports=window.wp.components},ywyh:function(e,t){e.exports=window.wp.apiFetch}});