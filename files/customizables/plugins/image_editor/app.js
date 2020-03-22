var FR = {
	UI: {}, changesSaved: true,
	init: function() {
		Ext.QuickTips.init();
		Ext.getBody().mask(FR.T('Loading image..'));
		new Ext.Viewport({
			layout: 'fit',
			items: {
				layout: 'fit',
				html: '<div id="editor"></div>',
				tbar: {
				enableOverflow: true,
				items: [
					{
						text: FR.T("Save"), cls: 'fr-btn-primary',
						handler: function(){this.save(false);}, scope: this
					},
					{
						text: FR.T("Save and close"), cls: 'fr-btn-primary', style: 'margin-left:5px', hidden: !FR.vars.windowId,
						handler: function(){this.save(true);}, scope: this
					},
					{
						text: FR.T("Close"), style: 'margin-left:5px', hidden: !FR.vars.windowId,
						handler: function(){FR.closeWindow();}
					},
					{
						xtype: 'tbtext', id: 'status', text: '', style: 'margin-left:10px;'
					},
					'->',
					{
						iconCls: 'fa fa-lg fa-check icon-green', hidden: true, style: 'margin-right:10px',
						id: 'apply', text: FR.T('Apply'),
						handler: function () {
							this.applyChanges();
						}, scope: this
					},
					{
						iconCls: 'fa fa-lg fa-times icon-red', hidden: true, style: 'margin-right:10px',
						id: 'cancel', text: FR.T('Cancel'),
						handler: function () {
							this.cancelChanges();
						}, scope: this
					},
					{
						iconCls: 'fa fa-lg fa-crop-alt icon-blue', enableToggle: true,
						id: 'cropToggle', tooltip: FR.T('Crop'),
						toggleHandler: function (btn, pressed) {
							if (pressed) {
								this.editor.crop();
							} else {
								this.editor.clear();
							}
							Ext.getCmp('apply').setVisible(pressed);
							Ext.getCmp('cancel').setVisible(pressed);
						}, scope: this
					},
					{
						xtype: 'tbtext', id: 'resolution', text: ''
					},
					{
						iconCls: 'fa fa-lg fa-expand-alt icon-blue',
						tooltip: FR.T('Scale down'),
						menuAlign: 't-b',
						menu: [
							new Ext.slider.SingleSlider({
								id: 'scaleSlider',
								vertical: true,
								height: 200,
								decimalPrecision: 2,
								value: 1,
								minValue: 0.1,
								maxValue: 1,
								clickToChange: false,
								listeners: {
									change: function(s, newValue) {
										this.editor.scale(newValue, newValue);
										Ext.get('resolution').update(
											Math.round(this.currentImageData.naturalWidth*newValue)+
											' <i class="fa fa-times"></i> '+
											Math.round(this.currentImageData.naturalHeight*newValue)
										)
									},
									changecomplete: function() {
										Ext.getCmp('apply').setVisible(true);
										Ext.getCmp('cancel').setVisible(true);
									},
									scope: this
								}
							})
						],
						listeners: {
							menushow: function() {
								this.currentImageData = this.editor.getImageData();
								this.editor.zoomTo(1);
							}, scope: this
						}
					},
					'-',
					{
						iconCls: 'fa fa-lg fa-redo icon-blue',
						tooltip: FR.T('Rotate'),
						menu: [
							{
								iconCls: 'fa fa-undo',
								text: '90&deg;',
								handler: function () {
									this.editor.rotate(-90);
									return false;
								}, scope: this
							},
							{
								iconCls: 'fa fa-redo',
								text: '90&deg;',
								handler: function () {
									this.editor.rotate(90);
									return false;
								}, scope: this
							},
							{
								text: '1&deg;',
								handler: function() {return false;},
								menu: {
									items: [new Ext.slider.SingleSlider({
										vertical: true,
										height: 200,
										value: 0,
										minValue: -90,
										maxValue: 90,
										clickToChange: false,
										listeners: {
											change: function (s, newValue) {
												this.editor.rotateTo(newValue);
											}, scope: this
										}
									})],
									listeners: {
										show: function(menu) {
											var slider = menu.items.items[0];
											var editorData = this.editor.getData();
											var currentRoateAngle = editorData.rotate;
											slider.setMinValue(currentRoateAngle-90);
											slider.setMaxValue(currentRoateAngle+90);
											slider.setValue(currentRoateAngle);
										}, scope: this
									}
								}
							},
							'-',
							{
								iconCls: 'fa fa-times',
								text: FR.T('Reset'),
								handler: function() {this.editor.rotateTo(0);}, scope: this
							}
						]
					},
					{
						iconCls: 'fa fa-lg fa-arrows-h icon-blue',
						tooltip: FR.T('Flip horizontal'),
						handler: function () {
							this.editor.scaleX(-this.editor.getData().scaleX);
						}, scope: this
					},
					{
						iconCls: 'fa fa-lg fa-arrows-v icon-blue',
						tooltip: FR.T('Flip vertical'),
						handler: function () {
							this.editor.scaleY(-this.editor.getData().scaleY);
						}, scope: this
					},
					'-',
					{
						iconCls: 'fa fa-lg fa-compress',
						tooltip: FR.T('Fit to screen'),
						handler: function () {
							this.editor.reset();
							var canvasData = this.editor.getCanvasData();
							Ext.get('zoomStatus').update(Math.round(canvasData.width/canvasData.naturalWidth*100)+'%');
						}, scope: this
					},
					{
						xtype: 'tbtext', id: 'zoomStatus', text: ''
					},
					{
						iconCls: 'fa fa-lg fa-expand',
						tooltip: FR.T('Full size'),
						handler: function () {
							this.editor.zoomTo(1);
						}, scope: this
					},
					'-',
					{
						iconCls: 'fa fa-lg fa-refresh',
						style: 'margin-right:10px',
						tooltip: FR.T('Reload image'),
						handler: function () {
							this.editor.replace(FR.vars.imageURL);
						}, scope: this
					}
				]}
			},
			listeners: {
				'afterrender': function() {
					this.status = Ext.getCmp('status');
					var image = Ext.DomHelper.append('editor', {tag: 'img', src: FR.vars.imageURL, style: 'visibility:hidden'});
					this.editor = new Cropper(image, {
						viewMode: 1,
						autoCrop: false,
						dragMode: 'move',
						highlight: false,
						toggleDragModeOnDblclick: false,
						ready: function() {
							Ext.getBody().unmask();
							var imageData = FR.editor.getImageData();
							Ext.get('resolution').update(
								imageData.naturalWidth+
								' <i class="fa fa-times"></i> '+
								imageData.naturalHeight
							);
							FR.editor.zoom(-0.1);
						},
						crop: function(e) {
							if (!event.detail.width) {return true;}
							Ext.get('resolution').update(
								Math.round(event.detail.width)+
								' <i class="fa fa-times"></i> '+
								Math.round(event.detail.height)
							)
						},
						zoom: function(e) {
							Ext.get('zoomStatus').update(Math.round(event.detail.ratio*100)+'%');
						}
					});
				}, scope: this
			}
		});
	},
	applyChanges: function() {
		this.editor.replace(this.editor.getCroppedCanvas().toDataURL());
		Ext.getCmp('scaleSlider').setValue(1);
		Ext.getCmp('cropToggle').toggle(0, true);
		Ext.getCmp('apply').setVisible(false);
		Ext.getCmp('cancel').setVisible(false);
	},
	cancelChanges: function() {
		Ext.getCmp('cropToggle').toggle(0);
		Ext.getCmp('scaleSlider').setValue(1);
		Ext.getCmp('apply').setVisible(false);
		Ext.getCmp('cancel').setVisible(false);
	},
	closeWindow: function() {
		var win = FR.vars.windowId ? window.parent.FR.UI.popups[FR.vars.windowId] : window;
		if (!FR.changesSaved) {
			new Ext.ux.prompt({text: FR.T('Discard the changes made?'),
				confirmHandler: function() {
					win.close();
				}});
			return false;
		}
		win.close();
	},
	save: function(close) {
		this.closeAfterSave = close;
		var canvas = this.editor.getCroppedCanvas();
		canvas.toBlob(function(blob) {
			blob.fileName = FR.vars.saveFileName;
			var upload = new Flow({
				target: FR.vars.URLRoot+'/?module=fileman&section=do&page=up',
				chunkSize: FR.vars.UploadChunkSize, maxChunkRetries: 3, resumeLargerThan: 104857600,
				validateChunkResponse: function(status, message) {
					if (status != '200') {return 'retry';}
					try {var rs = Ext.decode(message);} catch (er){return 'retry';}
					if (rs) {if (rs.success) {return 'success';} else {return 'error';}}
				}, validateChunkResponseScope: this, startOnSubmit: true,
				validateGetOffsetResponse: function(file, status, message) {
					if (status == 200) {
						try {
							var rs = Ext.util.JSON.decode(message);
						} catch (er){return false;}
						if (rs && rs.success) {
							if (rs.offset) {
								rs.offset = parseInt(rs.offset);
								if (!isNaN(rs.offset) && isFinite(rs.offset)) {
									file.offset = rs.offset;
								}
							}
							return true;
						}
					}
				}, validateGetOffsetResponseScope: this,
				query: {path: FR.vars.folderPath}
			});
			upload.on('fileSuccess', function(f, sr) {
				try {var rs = Ext.decode(sr);} catch (er){}
				FR.changesSaved = true;
				if (rs && rs.msg) {
					if (FR.vars.windowId) {
						FR.status.update('');
						window.parent.FR.UI.feedback(rs.msg);
					} else {
						FR.status.update(rs.msg);
					}
				}
				if (FR.closeAfterSave) {
					FR.closeWindow();
				}
			});
			upload.on('fileError', function(f, sr) {
				FR.status.update('');
				try {var rs = Ext.decode(sr);} catch (er){}
				if (rs && rs.msg) {
					new Ext.ux.prompt({text: rs.msg});
				}
			});
			upload.on('progress', function(flow) {
				var progress = flow.getProgress();
				var percent = Math.floor(progress*100);
				FR.status.update(FR.T('Uploading image..')+' '+percent+'%');
			});
			upload.on('uploadStart', function(flow) {
				FR.status.update(FR.T('Uploading image..'));
			});
			upload.addFile(blob);

		}, FR.vars.saveMimeType);
	}
};
