/*! This file is auto-generated */
!function(w){var l=w(document);window.wpWidgets={hoveredSidebar:null,dirtyWidgets:{},init:function(){var r,o,g=this,d=w(".widgets-chooser"),s=d.find(".widgets-chooser-sidebars"),e=w("div.widgets-sortables"),c=!("undefined"==typeof isRtl||!isRtl);w("#widgets-right .sidebar-name").on("click",function(){var e=w(this),i=e.closest(".widgets-holder-wrap "),t=e.find(".handlediv");i.hasClass("closed")?(i.removeClass("closed"),t.attr("aria-expanded","true"),e.parent().sortable("refresh")):(i.addClass("closed"),t.attr("aria-expanded","false")),l.triggerHandler("wp-pin-menu")}).find(".handlediv").each(function(e){0!==e&&w(this).attr("aria-expanded","false")}),w(window).on("beforeunload.widgets",function(e){var i,t=[];if(w.each(g.dirtyWidgets,function(e,i){i&&t.push(e)}),0!==t.length)return(i=w("#widgets-right").find(".widget").filter(function(){return-1!==t.indexOf(w(this).prop("id").replace(/^widget-\d+_/,""))})).each(function(){w(this).hasClass("open")||w(this).find(".widget-title-action:first").trigger("click")}),i.first().each(function(){this.scrollIntoViewIfNeeded?this.scrollIntoViewIfNeeded():this.scrollIntoView(),w(this).find(".widget-inside :tabbable:first").trigger("focus")}),e.returnValue=wp.i18n.__("The changes you made will be lost if you navigate away from this page."),e.returnValue}),w("#widgets-left .sidebar-name").on("click",function(){var e=w(this).closest(".widgets-holder-wrap");e.toggleClass("closed").find(".handlediv").attr("aria-expanded",!e.hasClass("closed")),l.triggerHandler("wp-pin-menu")}),w(document.body).on("click.widgets-toggle",function(e){var i,t,d,a,s,n,r=w(e.target),o={},l=r.closest(".widget").find(".widget-top button.widget-action");r.parents(".widget-top").length&&!r.parents("#available-widgets").length?(t=(i=r.closest("div.widget")).children(".widget-inside"),d=parseInt(i.find("input.widget-width").val(),10),a=i.parent().width(),n=t.find(".widget-id").val(),i.data("dirty-state-initialized")||((s=t.find(".widget-control-save")).prop("disabled",!0).val(wp.i18n.__("Saved")),t.on("input change",function(){g.dirtyWidgets[n]=!0,i.addClass("widget-dirty"),s.prop("disabled",!1).val(wp.i18n.__("Save"))}),i.data("dirty-state-initialized",!0)),t.is(":hidden")?(250<d&&a<d+30&&i.closest("div.widgets-sortables").length&&(o[i.closest("div.widget-liquid-right").length?c?"margin-right":"margin-left":c?"margin-left":"margin-right"]=a-(d+30)+"px",i.css(o)),l.attr("aria-expanded","true"),t.slideDown("fast",function(){i.addClass("open")})):(l.attr("aria-expanded","false"),t.slideUp("fast",function(){i.attr("style",""),i.removeClass("open")}))):r.hasClass("widget-control-save")?(wpWidgets.save(r.closest("div.widget"),0,1,0),e.preventDefault()):r.hasClass("widget-control-remove")?wpWidgets.save(r.closest("div.widget"),1,1,0):r.hasClass("widget-control-close")?((i=r.closest("div.widget")).removeClass("open"),l.attr("aria-expanded","false"),wpWidgets.close(i)):"inactive-widgets-control-remove"===r.attr("id")&&(wpWidgets.removeInactiveWidgets(),e.preventDefault())}),e.children(".widget").each(function(){var e=w(this);wpWidgets.appendTitle(this),e.find("p.widget-error").length&&e.find(".widget-action").trigger("click").attr("aria-expanded","true")}),w("#widget-list").children(".widget").draggable({connectToSortable:"div.widgets-sortables",handle:"> .widget-top > .widget-title",distance:2,helper:"clone",zIndex:101,containment:"#wpwrap",refreshPositions:!0,start:function(e,i){var t=w(this).find(".widgets-chooser");i.helper.find("div.widget-description").hide(),o=this.id,t.length&&(w("#wpbody-content").append(t.hide()),i.helper.find(".widgets-chooser").remove(),g.clearWidgetSelection())},stop:function(){r&&w(r).hide(),r=""}}),e.droppable({tolerance:"intersect",over:function(e){var i=w(e.target).parent();wpWidgets.hoveredSidebar&&!i.is(wpWidgets.hoveredSidebar)&&wpWidgets.closeSidebar(e),i.hasClass("closed")&&(wpWidgets.hoveredSidebar=i).removeClass("closed").find(".handlediv").attr("aria-expanded","true"),w(this).sortable("refresh")},out:function(e){wpWidgets.hoveredSidebar&&wpWidgets.closeSidebar(e)}}),e.sortable({placeholder:"widget-placeholder",items:"> .widget",handle:"> .widget-top > .widget-title",cursor:"move",distance:2,containment:"#wpwrap",tolerance:"pointer",refreshPositions:!0,start:function(e,i){var t=w(this),d=t.parent(),a=i.item.children(".widget-inside");"block"===a.css("display")&&(i.item.removeClass("open"),i.item.find(".widget-top button.widget-action").attr("aria-expanded","false"),a.hide(),w(this).sortable("refreshPositions")),d.hasClass("closed")||(i=i.item.hasClass("ui-draggable")?t.height():1+t.height(),t.css("min-height",i+"px"))},stop:function(e,i){var t,d,a,s=i.item,n=o;if(wpWidgets.hoveredSidebar=null,s.hasClass("deleting"))return wpWidgets.save(s,1,0,1),void s.remove();t=s.find("input.add_new").val(),d=s.find("input.multi_number").val(),s.attr("style","").removeClass("ui-draggable"),o="",t&&("multi"===t?(s.html(s.html().replace(/<[^<>]+>/g,function(e){return e.replace(/__i__|%i%/g,d)})),s.attr("id",n.replace("__i__",d)),d++,w("div#"+n).find("input.multi_number").val(d)):"single"===t&&(s.attr("id","new-"+n),r="div#"+n),wpWidgets.save(s,0,0,1),s.find("input.add_new").val(""),l.trigger("widget-added",[s])),(a=s.parent()).parent().hasClass("closed")&&(a.parent().removeClass("closed").find(".handlediv").attr("aria-expanded","true"),1<(i=a.children(".widget")).length&&(n=i.get(0),i=s.get(0),n.id&&i.id&&n.id!==i.id&&w(n).before(s))),t?s.find(".widget-action").trigger("click"):wpWidgets.saveOrder(a.attr("id"))},activate:function(){w(this).parent().addClass("widget-hover")},deactivate:function(){w(this).css("min-height","").parent().removeClass("widget-hover")},receive:function(e,i){i=w(i.sender);-1<this.id.indexOf("orphaned_widgets")?i.sortable("cancel"):-1<i.attr("id").indexOf("orphaned_widgets")&&!i.children(".widget").length&&i.parents(".orphan-sidebar").slideUp(400,function(){w(this).remove()})}}).sortable("option","connectWith","div.widgets-sortables"),w("#available-widgets").droppable({tolerance:"pointer",accept:function(e){return"widget-list"!==w(e).parent().attr("id")},drop:function(e,i){i.draggable.addClass("deleting"),w("#removing-widget").hide().children("span").empty()},over:function(e,i){i.draggable.addClass("deleting"),w("div.widget-placeholder").hide(),i.draggable.hasClass("ui-sortable-helper")&&w("#removing-widget").show().children("span").html(i.draggable.find("div.widget-title").children("h3").html())},out:function(e,i){i.draggable.removeClass("deleting"),w("div.widget-placeholder").show(),w("#removing-widget").hide().children("span").empty()}}),w("#widgets-right .widgets-holder-wrap").each(function(e,i){var t=w(i),d=t.find(".sidebar-name h2").text()||"",a=t.find(".sidebar-name").data("add-to"),i=t.find(".widgets-sortables").attr("id"),t=w("<li>"),d=w("<button>",{type:"button","aria-pressed":"false",class:"widgets-chooser-button","aria-label":a}).text(d.toString().trim());t.append(d),0===e&&(t.addClass("widgets-chooser-selected"),d.attr("aria-pressed","true")),s.append(t),t.data("sidebarId",i)}),w("#available-widgets .widget .widget-top").on("click.widgets-chooser",function(){var e=w(this).closest(".widget"),i=w(this).find(".widget-action"),t=s.find(".widgets-chooser-button");e.hasClass("widget-in-question")||w("#widgets-left").hasClass("chooser")?(i.attr("aria-expanded","false"),g.closeChooser()):(g.clearWidgetSelection(),w("#widgets-left").addClass("chooser"),e.addClass("widget-in-question").children(".widget-description").after(d),d.slideDown(300,function(){i.attr("aria-expanded","true")}),t.on("click.widgets-chooser",function(){s.find(".widgets-chooser-selected").removeClass("widgets-chooser-selected"),t.attr("aria-pressed","false"),w(this).attr("aria-pressed","true").closest("li").addClass("widgets-chooser-selected")}))}),d.on("click.widgets-chooser",function(e){e=w(e.target);e.hasClass("button-primary")?(g.addWidget(d),g.closeChooser()):e.hasClass("widgets-chooser-cancel")&&g.closeChooser()}).on("keyup.widgets-chooser",function(e){e.which===w.ui.keyCode.ESCAPE&&g.closeChooser()})},saveOrder:function(e){var i={action:"widgets-order",savewidgets:w("#_wpnonce_widgets").val(),sidebars:[]};e&&w("#"+e).find(".spinner:first").addClass("is-active"),w("div.widgets-sortables").each(function(){w(this).sortable&&(i["sidebars["+w(this).attr("id")+"]"]=w(this).sortable("toArray").join(","))}),w.post(ajaxurl,i,function(){w("#inactive-widgets-control-remove").prop("disabled",!w("#wp_inactive_widgets .widget").length),w(".spinner").removeClass("is-active")})},save:function(t,d,a,s){var n=this,r=t.closest("div.widgets-sortables").attr("id"),e=t.find("form"),i=t.find("input.add_new").val();(d||i||!e.prop("checkValidity")||e[0].checkValidity())&&(i=e.serialize(),t=w(t),w(".spinner",t).addClass("is-active"),e={action:"save-widget",savewidgets:w("#_wpnonce_widgets").val(),sidebar:r},d&&(e.delete_widget=1),i+="&"+w.param(e),w.post(ajaxurl,i,function(e){var i=w("input.widget-id",t).val();d?(w("input.widget_number",t).val()||w("#available-widgets").find("input.widget-id").each(function(){w(this).val()===i&&w(this).closest("div.widget").show()}),a?(s=0,t.slideUp("fast",function(){w(this).remove(),wpWidgets.saveOrder(),delete n.dirtyWidgets[i]})):(t.remove(),delete n.dirtyWidgets[i],"wp_inactive_widgets"===r&&w("#inactive-widgets-control-remove").prop("disabled",!w("#wp_inactive_widgets .widget").length))):(w(".spinner").removeClass("is-active"),e&&2<e.length&&(w("div.widget-content",t).html(e),wpWidgets.appendTitle(t),t.find(".widget-control-save").prop("disabled",!0).val(wp.i18n.__("Saved")),t.removeClass("widget-dirty"),delete n.dirtyWidgets[i],l.trigger("widget-updated",[t]),"wp_inactive_widgets"===r&&w("#inactive-widgets-control-remove").prop("disabled",!w("#wp_inactive_widgets .widget").length))),s&&wpWidgets.saveOrder()}))},removeInactiveWidgets:function(){var e,i=w(".remove-inactive-widgets"),t=this;w(".spinner",i).addClass("is-active"),e={action:"delete-inactive-widgets",removeinactivewidgets:w("#_wpnonce_remove_inactive_widgets").val()},e=w.param(e),w.post(ajaxurl,e,function(){w("#wp_inactive_widgets .widget").each(function(){var e=w(this);delete t.dirtyWidgets[e.find("input.widget-id").val()],e.remove()}),w("#inactive-widgets-control-remove").prop("disabled",!0),w(".spinner",i).removeClass("is-active")})},appendTitle:function(e){var i=(i=w('input[id*="-title"]',e).val()||"")&&": "+i.replace(/<[^<>]+>/g,"").replace(/</g,"&lt;").replace(/>/g,"&gt;");w(e).children(".widget-top").children(".widget-title").children().children(".in-widget-title").html(i)},close:function(e){e.children(".widget-inside").slideUp("fast",function(){e.attr("style","").find(".widget-top button.widget-action").attr("aria-expanded","false").focus()})},addWidget:function(e){var i=e.find(".widgets-chooser-selected").data("sidebarId"),t=w("#"+i),d=w("#available-widgets").find(".widget-in-question").clone(),a=d.attr("id"),e=d.find("input.add_new").val(),s=d.find("input.multi_number").val();d.find(".widgets-chooser").remove(),"multi"===e?(d.html(d.html().replace(/<[^<>]+>/g,function(e){return e.replace(/__i__|%i%/g,s)})),d.attr("id",a.replace("__i__",s)),s++,w("#"+a).find("input.multi_number").val(s)):"single"===e&&(d.attr("id","new-"+a),w("#"+a).hide()),t.closest(".widgets-holder-wrap").removeClass("closed").find(".handlediv").attr("aria-expanded","true"),t.append(d),t.sortable("refresh"),wpWidgets.save(d,0,0,1),d.find("input.add_new").val(""),l.trigger("widget-added",[d]),e=(i=w(window).scrollTop())+w(window).height(),(a=t.offset()).bottom=a.top+t.outerHeight(),(i>a.bottom||e<a.top)&&w("html, body").animate({scrollTop:a.top-130},200),window.setTimeout(function(){d.find(".widget-title").trigger("click"),window.wp.a11y.speak(wp.i18n.__("Widget has been added to the selected sidebar"),"assertive")},250)},closeChooser:function(){var e=this,i=w("#available-widgets .widget-in-question");w(".widgets-chooser").slideUp(200,function(){w("#wpbody-content").append(this),e.clearWidgetSelection(),i.find(".widget-action").attr("aria-expanded","false").focus()})},clearWidgetSelection:function(){w("#widgets-left").removeClass("chooser"),w(".widget-in-question").removeClass("widget-in-question")},closeSidebar:function(e){this.hoveredSidebar.addClass("closed").find(".handlediv").attr("aria-expanded","false"),w(e.target).css("min-height",""),this.hoveredSidebar=null}},w(function(){wpWidgets.init()})}(jQuery),wpWidgets.l10n=wpWidgets.l10n||{save:"",saved:"",saveAlert:"",widgetAdded:""},wpWidgets.l10n=window.wp.deprecateL10nObject("wpWidgets.l10n",wpWidgets.l10n,"5.5.0");