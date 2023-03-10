/* gettext library */

var catalog = new Array();

function pluralidx(count) { return (count == 1) ? 0 : 1; }


function gettext(msgid) {
	var value = catalog[msgid];
	if (typeof (value) == 'undefined') {
		return msgid;
	} else {
		return (typeof (value) == 'string') ? value : value[0];
	}
}

function ngettext(singular, plural, count) {
	value = catalog[singular];
	if (typeof (value) == 'undefined') {
		return (count == 1) ? singular : plural;
	} else {
		return value[pluralidx(count)];
	}
}

function gettext_noop(msgid) { return msgid; }

function pgettext(context, msgid) {
	var value = gettext(context + '' + msgid);
	if (value.indexOf('') != -1) {
		value = msgid;
	}
	return value;
}

function npgettext(context, singular, plural, count) {
	var value = ngettext(context + '' + singular, context + '' + plural, count);
	if (value.indexOf('') != -1) {
		value = ngettext(singular, plural, count);
	}
	return value;
}

function interpolate(fmt, obj, named) {
	if (named) {
		return fmt.replace(/%\(\w+\)s/g, function (match) { return String(obj[match.slice(2, -2)]) });
	} else {
		return fmt.replace(/%s/g, function (match) { return String(obj.shift()) });
	}
}

/* formatting library */

var formats = new Array();

formats['DATETIME_FORMAT'] = 'N j, Y, P';
formats['DATE_FORMAT'] = 'N j, Y';
formats['DECIMAL_SEPARATOR'] = '.';
formats['MONTH_DAY_FORMAT'] = 'F j';
formats['NUMBER_GROUPING'] = '3';
formats['TIME_FORMAT'] = 'P';
formats['FIRST_DAY_OF_WEEK'] = '0';
formats['TIME_INPUT_FORMATS'] = ['%H:%M:%S', '%H:%M'];
formats['THOUSAND_SEPARATOR'] = ',';
formats['DATE_INPUT_FORMATS'] = ['%Y-%m-%d', '%m/%d/%Y', '%m/%d/%y'];
formats['YEAR_MONTH_FORMAT'] = 'F Y';
formats['SHORT_DATE_FORMAT'] = 'm/d/Y';
formats['SHORT_DATETIME_FORMAT'] = 'm/d/Y P';
formats['DATETIME_INPUT_FORMATS'] = ['%Y-%m-%d %H:%M:%S', '%Y-%m-%d %H:%M', '%Y-%m-%d', '%m/%d/%Y %H:%M:%S', '%m/%d/%Y %H:%M', '%m/%d/%Y', '%m/%d/%y %H:%M:%S', '%m/%d/%y %H:%M', '%m/%d/%y'];

function get_format(format_type) {
	var value = formats[format_type];
	if (typeof (value) == 'undefined') {
		return msgid;
	} else {
		return value;
	}
}
/* End gettext */

(function (win) {
	// This represents the site configuration
	win.mdn = {
		build: '1843b89',
		// Properties and settings for CKEditor will go here
		ckeditor: {},
		// Feature test results and methods will be placed here
		features: {},
		// The path to media (images, CSS, JS) in MDN
		mediaPath: 'https://developer.cdn.mozilla.net/media/',
		// Optimizely API
		optimizely: win['optimizely'] || [],
		// Site notifications
		notifications: [],
		// Wiki-specific settings will be placed here
		wiki: {
			autosuggestTitleUrl: '/en-US/docs/get-documents'
		},
		searchFilters: [{
			"name": "Document type",
			"slug": "type",
			"order": 1,
			"filters": [{
				"name": "Tools",
				"slug": "tools",
				"shortcut": null
			}, {
				"name": "Code Samples",
				"slug": "code",
				"shortcut": null
			}, {
				"name": "How-To & Tutorial",
				"slug": "howto",
				"shortcut": null
			}]
		}, {
			"name": "Skill level",
			"slug": "skill",
			"order": 1,
			"filters": [{
				"name": "I'm an Expert",
				"slug": "advanced",
				"shortcut": null
			}, {
				"name": "Intermediate",
				"slug": "intermediate",
				"shortcut": null
			}, {
				"name": "I'm Learning",
				"slug": "beginner",
				"shortcut": null
			}]
		}, {
			"name": "Topics",
			"slug": "topic",
			"order": 1,
			"filters": [{
				"name": "Open Web Apps",
				"slug": "apps",
				"shortcut": null
			}, {
				"name": "HTML",
				"slug": "html",
				"shortcut": null
			}, {
				"name": "CSS",
				"slug": "css",
				"shortcut": null
			}, {
				"name": "JavaScript",
				"slug": "js",
				"shortcut": null
			}, {
				"name": "APIs and DOM",
				"slug": "api",
				"shortcut": null
			}, {
				"name": "Canvas",
				"slug": "canvas",
				"shortcut": null
			}, {
				"name": "SVG",
				"slug": "svg",
				"shortcut": null
			}, {
				"name": "MathML",
				"slug": "mathml",
				"shortcut": null
			}, {
				"name": "WebGL",
				"slug": "webgl",
				"shortcut": null
			}, {
				"name": "XUL",
				"slug": "xul",
				"shortcut": null
			}, {
				"name": "Marketplace",
				"slug": "marketplace",
				"shortcut": null
			}, {
				"name": "Firefox",
				"slug": "firefox",
				"shortcut": null
			}, {
				"name": "Firefox for Android",
				"slug": "firefox-mobile",
				"shortcut": "fennec"
			}, {
				"name": "Firefox for Desktop",
				"slug": "firefox-desktop",
				"shortcut": "fx"
			}, {
				"name": "Firefox OS",
				"slug": "firefox-os",
				"shortcut": "fxos"
			}, {
				"name": "Mobile",
				"slug": "mobile",
				"shortcut": null
			}, {
				"name": "Web Development",
				"slug": "webdev",
				"shortcut": null
			}, {
				"name": "Add-ons & Extensions",
				"slug": "addons",
				"shortcut": null
			}, {
				"name": "Games",
				"slug": "games",
				"shortcut": null
			}, {
				"name": "Writing Documentation",
				"slug": "docs",
				"shortcut": null
			}]
		}]
	};

	// Ensures gettext always returns something, is always set
	win.gettext = function (x) {
		return x;
	}
})(window);

(function (e, t, a) {
	a.extend({
		parseQuerystring: function (e) {
			var t = {};
			var n = (e || location.search).replace("?", "");
			var i = n.split("&");
			a.each(i, function (e, a) {
				var n = a.split("=");
				t[n[0]] = n[1]
			});
			return t
		},
		slugifyString: function (e, t, a) {
			var n = new RegExp("[?&\"'#*$" + (t ? "" : "/") + " +?]", "g");
			var i = e.replace(n, "_").replace(/\$/g, "");
			if (!a) {
				i = i.replace(/_+/g, "_")
			}
			return i
		}
	});
})(window, document, jQuery);

(function () {

	/*/
	CKEDITOR.on('instanceReady', function(ev) {
		var writer = ev.editor.dataProcessor.writer;

		// Tighten up the indentation a bit from the default of wide tabs.
		writer.indentationChars = ' ';

		// Configure this set of tags to open and close all on the same line, if
		// possible.
		var oneliner_tags = [
			'hgroup', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
			'p', 'th', 'td', 'li'
		];
		for (var i = 0, tag; tag = oneliner_tags[i]; i++) {
			writer.setRules(tag, {
				indent: true,
				breakBeforeOpen: true,
				breakAfterOpen: false,
				breakBeforeClose: false,
				breakAfterClose: true
			});
		}

		// Retrieve nodes important to moving the path bar to the top
		var tbody = ev.editor._.cke_contents.$.parentNode.parentNode;
		var pathP = tbody.lastChild.childNodes[0].childNodes[1];
		var toolbox = tbody.childNodes[0].childNodes[0].childNodes[0];

		if (toolbox && pathP) {
			toolbox.appendChild(pathP);
		}

		// Callback for inline, if necessary
		var callback = CKEDITOR.inlineCallback;
		callback && callback(ev);
	});
	//*/

	// Prevent bad on* attributes (https://github.com/ckeditor/ckeditor-dev/commit/1b9a322)
	var oldHtmlDataProcessorProto = CKEDITOR.htmlDataProcessor.prototype.toHtml;
	CKEDITOR.htmlDataProcessor.prototype.toHtml = function (data, fixForBody) {
		data = protectInsecureAttributes(data);
		data = oldHtmlDataProcessorProto.apply(this, arguments);
		data = data.replace(new RegExp('data-cke-' + CKEDITOR.rnd + '-', 'ig'), '');

		function protectInsecureAttributes(html) {
			return html.replace(/([^a-z0-9<\-])(on\w{3,})(?!>)/gi, '$1data-cke-' + CKEDITOR.rnd + '-$2');
		}
		return data;
	};

	// Provide redirect pattern for corresponding plugin
	mdn.ckeditor.redirectPattern = 'REDIRECT <a class="redirect" href="%(href)s">%(title)s</a>';

	(function () {
		// Brick dialog "changed" prompts
		/*/
		var originalOn = CKEDITOR.dialog.prototype.on;
		CKEDITOR.dialog.prototype.on = function(event, callback) {
			// If it's the cancel event that pops up the confirmation, just get out
			if (event == 'cancel' && callback.toString().indexOf('confirmCancel') != -1) {
				return true;
			}
			originalOn.apply(this, arguments);
		};
		//*/

		// <time> elements should be inline
		CKEDITOR.dtd.$inline['time'] = 1;
		delete CKEDITOR.dtd.$block['time'];

		// Tell CKEditor that <i> elements are block so empty <i>'s aren't removed
		// This is essentially for Font-Awesome
		CKEDITOR.dtd.$block['i'] = 1;
		delete CKEDITOR.dtd.$removeEmpty['i'];

		// Manage key presses
		var keys = mdn.ckeditor.keys = {
			control2: CKEDITOR.CTRL + 50,
			control3: CKEDITOR.CTRL + 51,
			control4: CKEDITOR.CTRL + 52,
			control5: CKEDITOR.CTRL + 53,
			control6: CKEDITOR.CTRL + 54,
			controlK: CKEDITOR.CTRL + 75,
			controlL: CKEDITOR.CTRL + 76,
			controlShiftL: CKEDITOR.CTRL + CKEDITOR.SHIFT + 76,
			controlS: CKEDITOR.CTRL + 83,
			controlO: CKEDITOR.CTRL + 79,
			controlP: CKEDITOR.CTRL + 80,
			controlShiftO: CKEDITOR.CTRL + CKEDITOR.SHIFT + 79,
			controlShiftS: CKEDITOR.CTRL + CKEDITOR.SHIFT + 83,
			shiftSpace: CKEDITOR.SHIFT + 32,
			tab: 9,
			shiftTab: CKEDITOR.SHIFT + 9,
			enter: 13,
			back: 1114149,
			forward: 1114151
		};
		var block = function (k) {
			return CKEDITOR.config.blockedKeystrokes.push(keys[k]);
		};

		// Prevent key handling
		block('tab');
		block('shiftTab');
		block('control2');
		block('control3');
		block('control4');
		block('control5');
		block('control6');
		block('controlO');
		block('controlS');
		block('controlShiftL');
		block('controlShiftO');
	})();


	/**
	 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
	 * For licensing, see LICENSE.html or http://ckeditor.com/license
	 */
	CKEDITOR.editorConfig = function (config) {

		/***
		 * CKeditor config
		 * Resize
				config.resize_enabled
				config.resize_minWidth and config.resize_maxWidth
				config.resize_minHeight and config.resize_maxHeight
		 * Filebrowser
				config.filebrowserBrowseUrl = "../../resource/ckeditor/ckfinder/ckfinder.html",
				config.filebrowserUploadUrl = "../../resource/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
				config.filebrowserImageUploadUrl = "../../resource/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
				config.filebrowserFlashUploadUrl = "../../resource/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
				config.filebrowserImageThumbsUploadUrl = 'upload.php?type=Images&makeThumb=true';
				config.filebrowserImageResizeUploadUrl = 'upload.php?type=Images&resize=true';
				config.doksoft_uploader_url = '';
		 * Basic Plugin
					config.plugins = 'dialogui,dialog,about,basicstyles,clipboard,button,toolbar,enterkey,entities,floatingspace,wysiwygarea,indent,indentlist,fakeobjects,link,list,undo';
		 * Standard Plugin
					config.plugins = 'dialogui,dialog,about,a11yhelp,basicstyles,blockquote,clipboard,panel,floatpanel,menu,contextmenu,resize,button,toolbar,elementspath,enterkey,entities,popup,filebrowser,floatingspace,listblock,richcombo,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentlist,fakeobjects,link,list,magicline,maximize,pastetext,pastefromword,removeformat,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,undo,wsc';
		 * Full Plugin
					config.plugins = 'dialogui,dialog,about,a11yhelp,dialogadvtab,basicstyles,bidi,blockquote,clipboard,button,panelbutton,panel,floatpanel,colorbutton,colordialog,templates,menu,contextmenu,div,resize,toolbar,elementspath,enterkey,entities,popup,filebrowser,find,fakeobjects,flash,floatingspace,listblock,richcombo,font,forms,format,horizontalrule,htmlwriter,iframe,wysiwygarea,image,indent,indentblock,indentlist,smiley,justify,menubutton,language,link,list,liststyle,magicline,maximize,newpage,pagebreak,pastetext,pastefromword,preview,print,removeformat,save,selectall,showblocks,showborders,sourcearea,specialchar,scayt,stylescombo,tab,table,tabletools,undo,wsc';
		***/

		// Ngon ngu
		config.language = 'vi';

		// UI color
		config.uiColor = '#CCCCCC';

		// Skin
		config.skin = 'moono_blue';

		// Css
		//config.contentsCss		= ['/admin/resource/ckeditor/bootstrap.css'];	

		/***
		 * Cho phep cac the
		 * config.allowedcontent = "p h1{text-align}; a[!href]; strong em; p(tip)";
		***/
		config.allowedContent = true; // to allow all

		// Cho phep them mot so the
		config.extraAllowedContent = '';

		// Khong tu dong kt chinh ta
		config.scayt_autoStartup = false;
		config.disableNativeSpellChecker = true;

		// File browser
		config.filebrowserBrowseUrl = "http://localhost:8189/ckeditor/ckfinder/ckfinder.php",
			config.filebrowserUploadUrl = "http://localhost:8189/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
			config.filebrowserImageUploadUrl = "http://localhost:8189/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
			config.filebrowserFlashUploadUrl = "http://localhost:8189/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash",

			// My Plugin
			/*/		
			config.plugins =
			// Plugin
				'dialogui,' + // Core
				'dialog,' + // Core
				'dialogadvtab,' +	// Core - D??ng n??ng cao cho dialog Link,Image,Flash,Table,IFrame,Div Container						
				'button,' + // Core
				'panelbutton,' + // Core - N??ng cao c???a button tr??nh ????n th??? xu???ng, vd: b???ng ??i???u khi???n m??u s???c, ...
				'panel,' + // Plugin n??y s??? d???ng c??ng v???i c??c plugin floatpanel cung c???p c?? s??? c???a t???t c??? c??c b???ng giao di???n ng?????i d??ng bi??n t???p - th??? xu???ng, menu, vv
				'floatpanel,' + // Plugin n??y c??ng v???i c??c plugin c???a b???ng ??i???u khi???n l?? cung c???p c?? s??? c???a t???t c??? c??c b???ng giao di???n ng?????i d??ng bi??n t???p - th??? xu???ng, menu, vv	
				'menu,' + // Plugin ch???a ph????ng ph??p ????? x??y d???ng th???c ????n CKEditor (v?? d??? nh?? tr??nh ????n ng??? c???nh ho???c menu th??? xu???ng).
				'contextmenu,' + // menu ng??? c???nh s??? d???ng thay v?? tr??nh duy???t, manage menu item and group
				'resize,' + // thay ?????i k??ch th?????c editor
				'elementspath,' + // ??? d?????i c??ng cho bi???t danh s??ch HTML v?? th??? HTML hi???n t???i ??? v??? tr?? con tr???
				'enterkey,' + // ??i???u ch???nh h??nh ?????ng khi nh???n enter, shift + enter, ...
				'entities,' + // entities code
				'popup,' + // th??m m???t ch???c n??ng c??ng c??? ????? m??? trang web trong c???a s??? popup.
				'filebrowser,' + // Li??n k???t ckeditor v???i b???t k??? tr??nh qu???n l?? file n??o b??n ngo??i	
				'fakeobjects,' +
				'floatingspace,' + // ??i???u ch???nh v??? tr?? t???t nh???t cho ckeditor ??? ch??? ????? inline
				'listblock,' + // x??y d???ng m???t danh s??ch th??? trong b???ng bi??n t???p. vd: th???y trong rich combo, list item with label 
				'richcombo,' + // s??? d???ng ????? x??y d???ng Dropdowns nh?? Styles, ?????nh d???ng, c??? ch???, vv
				'htmlwriter,' + // linh ho???t ?????u ra ?????nh d???ng HTML, v???i m???t s??? t??y ch???n c???u h??nh ????? ki???m so??t c??c ?????nh d???ng ?????u ra tr??nh bi??n t???p.
				'menubutton,' + // cung c???p m???t giao di???n ng?????i d??ng ph???n n??t menu khi nh???p v??o s??? m??? ra m???t tr??nh ????n th??? xu???ng v???i m???t danh s??ch c??c t??y ch???n.
				'liststyle,' + // Th??m danh s??ch s???
				'magicline,' + // l??m d??? d??ng h??n ????? ?????t con tr??? v?? th??m n???i dung t???i th??? nh?? images, tables ho???c <div>
				'showborders,' + // hi???n th??? ???????ng vi???n xung quanh b???ng.
				'tab,' + // H??? tr??? x??? l?? tab tr??n editor. vd: tab tr??n table
			// Line 1
				'sourcearea,' + // M?? nh??ng
				//'save,' + // L??u
				//'newpage,' + // Trang m???i
				'preview,' + // Xem tr?????c
				'print,' + // In
				//'templates,' + // M???u
				'clipboard,' + // Cut, Copy, Paste
				'pastetext,' + // Copy nh?? text
				'pastefromword,' + // Copy t??? word - G???m c??? clipboard
				'undo,' + // Ho??n t??c
				'find,' + // T??m v?? thay th???
				//'selectall,' + // Ch???n t???t c???
				//'wsc,' + // Button ki???m tra ch??nh t???
				//'scayt,' + // Ki???m tra ch??nh t???
				//'forms,' + // Form
			// Line 2		
				'basicstyles,' + // B, I, U ...
				'removeformat,' + // Lo???i b??? style
				'list,' + // Ul,li
				'indent,' + // marginleft 40px
				'indentblock,' + // marginleft 40px
				'indentlist,' + // marginleft 40px
				'blockquote,' + // Quote
				//'div,' + // Div
				'justify,' + // C??n ch???nh
				//'bidi,' + // Tr??i sang ph???i, ph???i s??ng tr??i
				//'language,' + // Ch???n ng??n ng???
				'link,' + // ???????ng d???n
				'image,' + // ???nh
				//'flash,' + // Flash
				'table,' + // K??? b???ng
				'tabletools,' + // K??? b???ng
				'horizontalrule,' + // Line <hr>
				//'smiley,' + // M???t c?????i
				//'specialchar,' + // K?? t??? ?????c bi???t
				//'pagebreak,' + // Ng???t trang
				'iframe,' + // Iframe
			// Line 3
				'stylescombo,' + // Style
				'format,' + // Format
				'font,' + // Font + size	
				'colorbutton,' + // Color button
				'colordialog,' + // Color dialog
				'maximize,' + // Full width height ckeditor
				//'showblocks,' + // Show block
				//'about,' + // Gi???i thi???u
				//'a11yhelp,' + // Help - D??ng alt + 0 ????? b???t h?????ng d???n
			// Toolbar create			
				'toolbar,' + // Thanh c??ng c???
				'wysiwygarea' // Kh???i t???o
				;
			//*/


			// Them Plugin
			config.extraPlugins = 'mdn-buttons,mdn-sampler,mdn-keystrokes,mdn-syntaxhighlighter,image2,quicktable,simpleuploads,accordion,doksoft_stat,doksoft_backup,doksoft_button,doksoft_youtube,doksoft_maps,doksoft_html';

		// Xoa Plugin
		//config.removePlugins = 'forms, save, print, newpage, templates, bidi';

		/***
		 * Toolbar
		 * config.toolbarCanCollapse = false;
		 * config.colorButton_enableMore = false;
		 * Full
				  config.toolbar = [
					{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
					{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
					{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
					{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 
						'HiddenField' ] },
					'/',
					{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
					{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
					'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
					{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
					{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
					'/',
					{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
					{ name: 'colors', items : [ 'TextColor','BGColor' ] },
					{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
				];
		***/
		config.toolbar = [
			// { name: 'document', items: ['autoFormat', 'CommentSelectedRange', 'UncommentSelectedRange', 'AutoComplete'] },
			// { name: 'more', items: ['Preview', 'Print', 'Find'] },
			// { name: 'clipboard', items: ['PasteText', 'PasteFromWord'] },
			// { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
			{ name: 'insert', items: ['Image', 'addImage', 'addFile', 'ImageMaps' ,'-','doksoft_youtube'] },
			// { name: 'smart', items: ['Table', 'doksoft_button', 'doksoft_youtube', 'doksoft_maps', 'doksoft_backup_save', 'doksoft_backup_load', 'Accordion'] },
			// { name: 'paragraph', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
			// '/',
			{ name: 'styles', items: ['Font', 'FontSize'] },
			// { name: 'buttonH', items: ['h1Button', 'h2Button', 'h3Button', 'h4Button', 'h5Button', 'h6Button', 'preButton', 'codeButton', 'mdn-syntaxhighlighter', 'Syntaxhighlight', 'mdn-sampler'] },
			{ name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', '-', 'RemoveFormat'] },
			{ name: 'colors', items: ['TextColor', 'BGColor'] },
			// { name: 'tools', items: ['Maximize'] },
		];

		/***
		 * SimpleUpload Config
		  ***/

		// Dung luong file cho phep
		config.simpleuploads_maxFileSize = '';

		// File khong hop le
		config.simpleuploads_invalidExtensions = '';

		// File hop le
		config.simpleuploads_acceptedExtensions = 'doc|docx|xls|xlsx|ppt|pdf|txt|rar|zip|jpeg|JPEG|jpg|gif|png|bmp';

		// File anh hop le
		config.simpleuploads_imageExtensions = 'JPEG|jpeg|gif|png|bmp|jpg';

		// Kiem tra kich thuoc toi da
		config.simpleuploads_maximumDimensions = true;

		// Convert file tu bmp sang png
		config.simpleuploads_convertBmp = true;

		/***
		 * Doksoft Backup
		  ***/
		config.doksoft_backup_interval = 3E4; // 30s
		config.doksoft_backup_snapshots_limit = 20; // 20 ban ghi
		config.doksoft_backup_save_before_load = true; // Luu truoc khi soan thao
		config.doksoft_backup_move_to_footer = true;
		config.doksoft_backup_add_background_in_footer = true;
		config.doksoft_backup_add_text_to_load_button = true;
		config.doksoft_backup_date_format = "HH:MM dd/mm/yyyy";
		config.doksoft_backup_additional_id = "";

		/***
		 * Doksoft Youtube
		  ***/
		config.doksoft_youtube_apiKey = 'AIzaSyA-aKbivWEGhF97A57LAEnyKl1-j57YBEc';
		config.doksoft_youtube_maxResults = 25;
		config.doksoft_youtube_showSuggested = true;
		config.doksoft_youtube_enablePrivacyMode = false;
		config.doksoft_youtube_useOldCode = false;

	};


})();