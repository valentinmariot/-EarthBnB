/*! This file is auto-generated */
!function(){function e(e){var t,s;if(e)for(t in e)e.hasOwnProperty(t)&&(this.settings[t]=e[t]);(s=this.settings.l10n.shortcodes)&&s.length&&(this.settings.shortcodesRegExp=new RegExp("\\[\\/?(?:"+s.join("|")+")[^\\]]*?\\]","g"))}e.prototype.settings={HTMLRegExp:/<\/?[a-z][^>]*?>/gi,HTMLcommentRegExp:/<!--[\s\S]*?-->/g,spaceRegExp:/&nbsp;|&#160;/gi,HTMLEntityRegExp:/&\S+?;/g,connectorRegExp:/--|\u2014/g,removeRegExp:new RegExp(["[","!-@[-`{-~","\x80-\xbf\xd7\xf7","\u2000-\u2bff","\u2e00-\u2e7f","]"].join(""),"g"),astralRegExp:/[\uD800-\uDBFF][\uDC00-\uDFFF]/g,wordsRegExp:/\S\s+/g,characters_excluding_spacesRegExp:/\S/g,characters_including_spacesRegExp:/[^\f\n\r\t\v\u00AD\u2028\u2029]/g,l10n:window.wordCountL10n||{}},e.prototype.count=function(e,t){var s=0;return"characters_excluding_spaces"!==(t=t||this.settings.l10n.type)&&"characters_including_spaces"!==t&&(t="words"),e&&(e=(e=(e+="\n").replace(this.settings.HTMLRegExp,"\n")).replace(this.settings.HTMLcommentRegExp,""),e=(e=this.settings.shortcodesRegExp?e.replace(this.settings.shortcodesRegExp,"\n"):e).replace(this.settings.spaceRegExp," "),(e=(e="words"===t?(e=(e=e.replace(this.settings.HTMLEntityRegExp,"")).replace(this.settings.connectorRegExp," ")).replace(this.settings.removeRegExp,""):(e=e.replace(this.settings.HTMLEntityRegExp,"a")).replace(this.settings.astralRegExp,"a")).match(this.settings[t+"RegExp"]))&&(s=e.length)),s},window.wp=window.wp||{},window.wp.utils=window.wp.utils||{},window.wp.utils.WordCounter=e}();