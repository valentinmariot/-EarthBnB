/*! This file is auto-generated */
this.wp=this.wp||{},this.wp.mediaUtils=function(e){var t={};function i(o){if(t[o])return t[o].exports;var l=t[o]={i:o,l:!1,exports:{}};return e[o].call(l.exports,l,l.exports,i),l.l=!0,l.exports}return i.m=e,i.c=t,i.d=function(e,t,o){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(i.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var l in e)i.d(o,l,function(t){return e[t]}.bind(null,l));return o},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s="Lb+8")}({GRId:function(e,t){e.exports=window.wp.element},"Lb+8":function(e,t,i){"use strict";i.r(t),i.d(t,"MediaUpload",(function(){return u})),i.d(t,"uploadMedia",(function(){return g}));var o=i("YLtl"),l=i("GRId"),a=i("l3Sj");const{wp:r}=window,s=[],n=()=>r.media.view.MediaFrame.Select.extend({featuredImageToolbar(e){this.createSelectToolbar(e,{text:r.media.view.l10n.setFeaturedImage,state:this.options.state})},editState(){const e=this.state("featured-image").get("selection"),t=new r.media.view.EditImage({model:e.single(),controller:this}).render();this.content.set(t),t.loadEditor()},createStates:function(){this.on("toolbar:create:featured-image",this.featuredImageToolbar,this),this.on("content:render:edit-image",this.editState,this),this.states.add([new r.media.controller.FeaturedImage,new r.media.controller.EditImage({model:this.options.editImage})])}}),d=()=>r.media.view.MediaFrame.Post.extend({galleryToolbar(){const e=this.state().get("editing");this.toolbar.set(new r.media.view.Toolbar({controller:this,items:{insert:{style:"primary",text:e?r.media.view.l10n.updateGallery:r.media.view.l10n.insertGallery,priority:80,requires:{library:!0},click(){const e=this.controller,t=e.state();e.close(),t.trigger("update",t.get("library")),e.setState(e.options.state),e.reset()}}}}))},editState(){const e=this.state("gallery").get("selection"),t=new r.media.view.EditImage({model:e.single(),controller:this}).render();this.content.set(t),t.loadEditor()},createStates:function(){this.on("toolbar:create:main-gallery",this.galleryToolbar,this),this.on("content:render:edit-image",this.editState,this),this.states.add([new r.media.controller.Library({id:"gallery",title:r.media.view.l10n.createGalleryTitle,priority:40,toolbar:"main-gallery",filterable:"uploaded",multiple:"add",editable:!1,library:r.media.query(Object(o.defaults)({type:"image"},this.options.library))}),new r.media.controller.EditImage({model:this.options.editImage}),new r.media.controller.GalleryEdit({library:this.options.selection,editing:this.options.editing,menu:"gallery",displaySettings:!1,multiple:!0}),new r.media.controller.GalleryAdd])}}),p=e=>Object(o.pick)(e,["sizes","mime","type","subtype","id","url","alt","link","caption"]),c=e=>r.media.query({order:"ASC",orderby:"post__in",post__in:e,posts_per_page:-1,query:!0,type:"image"});class m extends l.Component{constructor(e){let{allowedTypes:t,gallery:i=!1,unstableFeaturedImageFlow:o=!1,modalClass:l,multiple:s=!1,title:n=Object(a.__)("Select or Upload Media")}=e;if(super(...arguments),this.openModal=this.openModal.bind(this),this.onOpen=this.onOpen.bind(this),this.onSelect=this.onSelect.bind(this),this.onUpdate=this.onUpdate.bind(this),this.onClose=this.onClose.bind(this),i)this.buildAndSetGalleryFrame();else{const e={title:n,multiple:s};t&&(e.library={type:t}),this.frame=r.media(e)}l&&this.frame.$el.addClass(l),o&&this.buildAndSetFeatureImageFrame(),this.initializeListeners()}initializeListeners(){this.frame.on("select",this.onSelect),this.frame.on("update",this.onUpdate),this.frame.on("open",this.onOpen),this.frame.on("close",this.onClose)}buildAndSetGalleryFrame(){const{addToGallery:e=!1,allowedTypes:t,multiple:i=!1,value:o=s}=this.props;if(o===this.lastGalleryValue)return;let l;this.lastGalleryValue=o,this.frame&&this.frame.remove(),l=e?"gallery-library":o&&o.length?"gallery-edit":"gallery",this.GalleryDetailsMediaFrame||(this.GalleryDetailsMediaFrame=d());const a=c(o),n=new r.media.model.Selection(a.models,{props:a.props.toJSON(),multiple:i});this.frame=new this.GalleryDetailsMediaFrame({mimeType:t,state:l,multiple:i,selection:n,editing:!(!o||!o.length)}),r.media.frame=this.frame,this.initializeListeners()}buildAndSetFeatureImageFrame(){const e=n(),t=c(this.props.value),i=new r.media.model.Selection(t.models,{props:t.props.toJSON()});this.frame=new e({mimeType:this.props.allowedTypes,state:"featured-image",multiple:this.props.multiple,selection:i,editing:!!this.props.value}),r.media.frame=this.frame}componentWillUnmount(){this.frame.remove()}onUpdate(e){const{onSelect:t,multiple:i=!1}=this.props,o=this.frame.state(),l=e||o.get("selection");l&&l.models.length&&t(i?l.models.map(e=>p(e.toJSON())):p(l.models[0].toJSON()))}onSelect(){const{onSelect:e,multiple:t=!1}=this.props,i=this.frame.state().get("selection").toJSON();e(t?i:i[0])}onOpen(){var e;this.updateCollection();if(!(Array.isArray(this.props.value)?!(null===(e=this.props.value)||void 0===e||!e.length):!!this.props.value))return;const t=this.props.gallery,i=this.frame.state().get("selection");t||Object(o.castArray)(this.props.value).forEach(e=>{i.add(r.media.attachment(e))});const l=c(Object(o.castArray)(this.props.value));l.more().done((function(){var e;t&&null!=l&&null!==(e=l.models)&&void 0!==e&&e.length&&i.add(l.models)}))}onClose(){const{onClose:e}=this.props;e&&e()}updateCollection(){const e=this.frame.content.get();if(e&&e.collection){const t=e.collection;t.toArray().forEach(e=>e.trigger("destroy",e)),t.mirroring._hasMore=!0,t.more()}}openModal(){this.props.gallery&&this.buildAndSetGalleryFrame(),this.frame.open()}render(){return this.props.render({open:this.openModal})}}var u=m,h=i("ywyh"),y=i.n(h),f=i("xTGt");async function g(e){let{allowedTypes:t,additionalData:i={},filesList:r,maxUploadFileSize:s,onError:n=o.noop,onFileChange:d,wpAllowedMimeTypes:p=null}=e;const c=[...r],m=[],u=(e,t)=>{Object(f.revokeBlobURL)(Object(o.get)(m,[e,"url"])),m[e]=t,d(Object(o.compact)(m))},h=e=>!t||Object(o.some)(t,t=>Object(o.includes)(t,"/")?t===e:Object(o.startsWith)(e,t+"/")),y=(g=p)?Object(o.flatMap)(g,(e,t)=>{const[i]=e.split("/"),l=t.split("|");return[e,...Object(o.map)(l,e=>`${i}/${e}`)]}):g;var g;const w=e=>{e.message=[Object(l.createElement)("strong",{key:"filename"},e.file.name),": ",e.message],n(e)},O=[];for(const e of c)y&&e.type&&(S=e.type,!Object(o.includes)(y,S))?w({code:"MIME_TYPE_NOT_ALLOWED_FOR_USER",message:Object(a.__)("Sorry, you are not allowed to upload this file type."),file:e}):!e.type||h(e.type)?s&&e.size>s?w({code:"SIZE_ABOVE_LIMIT",message:Object(a.__)("This file exceeds the maximum upload size for this site."),file:e}):e.size<=0?w({code:"EMPTY_FILE",message:Object(a.__)("This file is empty."),file:e}):(O.push(e),m.push({url:Object(f.createBlobURL)(e)}),d(m)):w({code:"MIME_TYPE_NOT_SUPPORTED",message:Object(a.__)("Sorry, this file type is not supported here."),file:e});var S;for(let e=0;e<O.length;++e){const t=O[e];try{const l=await b(t,i);u(e,{...Object(o.omit)(l,["alt_text","source_url"]),alt:l.alt_text,caption:Object(o.get)(l,["caption","raw"],""),title:l.title.raw,url:l.source_url})}catch(i){let l;u(e,null),l=Object(o.has)(i,["message"])?Object(o.get)(i,["message"]):Object(a.sprintf)(Object(a.__)("Error while uploading file %s to the media library."),t.name),n({code:"GENERAL",message:l,file:t})}}}function b(e,t){const i=new window.FormData;return i.append("file",e,e.name||e.type.replace("/",".")),Object(o.forEach)(t,(e,t)=>i.append(t,e)),y()({path:"/wp/v2/media",body:i,method:"POST"})}},YLtl:function(e,t){e.exports=window.lodash},l3Sj:function(e,t){e.exports=window.wp.i18n},xTGt:function(e,t){e.exports=window.wp.blob},ywyh:function(e,t){e.exports=window.wp.apiFetch}});