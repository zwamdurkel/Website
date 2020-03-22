var FR = {
	chooser: false, UI: {tree: {}},
	defaultPerms: {
		upload: 0, download: 1, comment: 1, read_comments: 1, share: 0, alter: 0
	},
	addUsers: function() {
		if (!FR.chooser) {
			FR.chooser = new UserChooser({
				addGuest: function() {
					new Ext.ux.prompt({
						title: FR.T('Guest user\'s name'), defaultValue: '', confirmBtnLabel: FR.T('Next'),
						confirmHandler: function(name) {
							if (!name) {return false;}
							new Ext.ux.prompt({
								title: FR.T('%1\'s e-mail address').replace('%1', name), defaultValue: '',
								confirmBtnLabel: FR.T('Add user'),
								confirmHandler: function(email) {
									if (!email) {return false;}
									FR.addToList({
										text: name,
										iconCls: 'fa-user-plus',
										uid: email,
										guest: 1
									});
								},
								cancelHandler: function() {FR.addUsers();}
							});
						},
						cancelHandler: function() {FR.addUsers();}
					});
				}
			});
		}
		FR.chooser.clearChecked();
		FR.chooser.show(Ext.getCmp('addUsersBtn').getEl(), function(data) {
			var treeRoot = FR.UI.tree.rootNode;
			if (data.users) {
				Ext.each(data.users, function(user) {
					if (!treeRoot.findChild('uid', user.uid)) {
						FR.addToList({
							text: user.name, uid: user.uid,
							icon:'a/?uid='+user.uid
						});
					}
				});
			}
			if (data.groups) {
				Ext.each(data.groups, function(group) {
					if (!treeRoot.findChild('gid', group.gid)) {
						FR.addToList({
							text: group.name,
							iconCls:'fa-group', gid: group.gid
						});
					}
				});
			}
		});
	},
	addToList: function(data) {
		data.leaf = true;
		if (!data.perms) {data.perms = FR.defaultPerms;}
		if (!data.anonymous) {data.anonymous = 0;}
		if (!data.alias && window.parent.FR.sharing.path == '/ROOT/HOME') {data.alias = window.parent.FR.sharing.name;}
		var newTreeNode = new Ext.tree.TreeNode(data);
		FR.UI.tree.rootNode.appendChild(newTreeNode);
		if (!FR.UI.tree.panel.getSelectionModel().getSelectedNode()) {
			newTreeNode.select();
		}
	},
	getInfo: function() {
		FR.popupBody.mask(FR.T('Loading data...'));
		Ext.Ajax.request({
			url: URLRoot+'/?module=share&section=ajax&page=load',
			method: 'post',
			params: {path: window.parent.FR.sharing.path},
			success: function(req){
				FR.popupBody.unmask();
				try {
					var rs = Ext.util.JSON.decode(req.responseText);
				} catch (er){return false;}
				if (rs) {
					FR.applyInfo(rs);
				}
			}
		});
	},
	applyInfo: function(shareInfo) {
		var error = shareInfo.error || shareInfo.msg;
		if (error) {
			FR.popupBody.mask(error);
			return false;
		}
		if (window.parent.FR.sharing.type == 'file') {
			Ext.getCmp('options_panel').disable();
		} else {
			Ext.getCmp('options_panel').enable();
		}
		var troot = FR.UI.tree.rootNode;
		while (troot.firstChild) {troot.removeChild(troot.firstChild);}
		Ext.each(shareInfo, function(record) {
			var r = {
				name: record.name, text: record.name, leaf: true,
				anonymous: record.anonymous,
				perms: record.perms,
				alias: record.alias
			};
			if (record.uid) {
				r.icon = 'a/?uid='+record.uid;
				r.uid = record.uid;
			} else {
				r.iconCls = 'fa-group';
				r.gid = record.gid;
			}
			FR.addToList(r);
		});
		if (troot.childNodes.length > 0) {
			troot.firstChild.select();
		} else {
			FR.addUsers();
		}
	},
	saveInfo: function() {
		var pars = {
			'path': window.parent.FR.sharing.path,
			'csrf': FR.csrf_token,
			'actors[]': []
		};
		FR.UI.tree.rootNode.eachChild(function(node) {
			if (!node.disabled) {
				var a = node.attributes;
				var data = {
					'name': node.text,
					'upload': a.perms.upload?1:0,
					'download': a.perms.download?1:0,
					'alter': a.perms.alter?1:0,
					'read_comments': a.perms.read_comments?1:0,
					'comment': a.perms.comment?1:0,
					'share': a.perms.share?1:0,
					'anonymous': a.anonymous?1:0,
					'alias': a.alias
				};
				if (a.gid) {
					data.type = 'group';
					data.id = a.gid;
				} else {
					data.type = a.guest ? 'guest' : 'user';
					data.id = a.uid;
				}
				pars['actors[]'].push(JSON.stringify(data));
			}
		});
		FR.viewPort.el.mask(FR.T('Saving options...'));
		Ext.Ajax.request({
			url: URLRoot+'/?module=share&section=ajax&page=save',
			method: 'post', params: pars,
			success: function(req){
				FR.viewPort.el.unmask();
				try {
					var rs = Ext.util.JSON.decode(req.responseText);
				} catch (er){return false;}
				if (rs.success) {
					window.parent.FR.UI.popups.folderShare.hide();
					if (rs.update) {
						window.parent.FR.utils.applyFileUpdates(rs.update.path, rs.update.updates);
					}
				}
				window.parent.FR.UI.feedback(rs.msg, (rs.success === false));
			}
		});
	}
};

Ext.onReady(function() {
	FR.update = FR.getInfo;
	
	FR.popupBody = window.parent.Ext.get(window.parent.FR.UI.popups.folderShare.getLayout().container.body.dom);
	FR.popupBody.unmask();

	FR.UI.tree.panel = new Ext.tree.TreePanel({
		id: 'usersList', cls: 'userslist',
		animate: true, containerScroll: true,
		rootVisible:false, autoScroll: true, lines: false
	});
	FR.UI.tree.panel.getSelectionModel().on('selectionchange', function(sel, node){
		if (sel.getSelectedNode()) {
			Ext.getCmp('removeBtn').show();
			Ext.getCmp('optPane').getEl().unmask();
		} else {
			Ext.getCmp('removeBtn').hide();
			Ext.getCmp('optPane').getEl().mask();
		}
		if (!node) {return false;}
		FR.currentlySelectedNode = node;
		Ext.getCmp('optsTitle').setText(node.text);
		Ext.getCmp('perms_upload').setValue(node.attributes.perms.upload);
		Ext.getCmp('perms_download').setValue(node.attributes.perms.download);
		Ext.getCmp('perms_comment').setValue(node.attributes.perms.comment);
		Ext.getCmp('perms_share').setValue(node.attributes.perms.share);
		Ext.getCmp('perms_read_comments').setValue(node.attributes.perms.read_comments);
		Ext.getCmp('perms_alter').setValue(node.attributes.perms.alter);
		Ext.getCmp('anonymous').setValue(node.attributes.anonymous);

		Ext.getCmp('alias').setEmptyText(window.parent.FR.sharing.name);
		Ext.getCmp('alias').setValue(node.attributes.alias);

	});
	FR.UI.tree.rootNode = new Ext.tree.TreeNode({});
	FR.UI.tree.panel.setRootNode(FR.UI.tree.rootNode);


	FR.viewPort = new Ext.Viewport({
		layout: 'border',
		items: [
			{
				region: 'center',
				layout: 'border',
				items: [
					{
						region: 'west', split: true,
						width: 240, layout: 'fit', items: FR.UI.tree.panel,
						tbar: [
							{xtype: 'tbtext', style: 'font-weight:bold;font-size:14px', text: FR.T('Share with')},
							'->',
							{
								id: 'addUsersBtn',
								text: FR.T('Add Users'), cls:'fr-btn-smaller', iconCls: 'fa fa-fw fa-user-plus icon-gray',
								handler: FR.addUsers
							}
						]
					},
					{
						id: 'optPane',
						region: 'center',
						tbar: [
							{xtype: 'tbtext', style: 'font-weight:bold;font-size:14px;padding-top:4px;padding-bottom:4px;overflow: hidden;max-width:165px;text-overflow:ellipsis;', id: 'optsTitle', text: '&nbsp;'},
							'->',
							{
								id: 'removeBtn', text: FR.T('Remove'), cls:'fr-btn-smaller', iconCls: 'fa fa-fw fa-remove icon-red', hidden: true,
								handler: function() {
									FR.UI.tree.rootNode.removeChild(FR.UI.tree.panel.getSelectionModel().getSelectedNode());
									if (FR.UI.tree.rootNode.firstChild) {FR.UI.tree.rootNode.firstChild.select();}
								}
							}
						],
						items: [
							{
								xtype: 'tabpanel',
								activeTab: 0,
								deferredRender: false,
								items: [
									{
										title: FR.T('Permissions'),
										items: {
											xtype: 'form',
											labelAlign: 'right', autoWidth: true, autoScroll: true,
											bodyStyle: 'padding:10px', labelWidth: 0,
											items: [
												{
													id: 'perms_download', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Download'), hideLabel: true, name: 'perms_download', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.download = checked;
														}
													}
												},
												{xtype: 'displayfield', value:''},
												{
													id: 'perms_read_comments', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Read comments'), hideLabel: true, name: 'perms_read_comments', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.read_comments = checked;
														}
													}
												},
												{
													id: 'perms_comment', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Add comments'), hideLabel: true, name: 'perms_comment', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.comment = checked;
														}
													}
												},
												{xtype: 'displayfield', value:''},
												{
													id: 'perms_upload', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Upload'), hideLabel: true, name: 'perms_upload', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.upload = checked;
														}
													}
												},
												{
													id: 'perms_alter', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Make changes'), hideLabel: true, name: 'perms_alter', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.alter = checked;
														}
													}
												},
												{xtype: 'displayfield', value:''},
												{
													id: 'perms_share', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Share links'), hideLabel: true, name: 'perms_share', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.perms.share = checked;
														}
													}
												}
											]
										}
									},
									{
										title: FR.T('Options'),
										id: 'options_panel',
										items: {
											xtype: 'form',
											autoWidth: true,
											bodyStyle: 'padding:10px;font-size:12px;',
											labelWidth: (window.parent.FR.language == 'french') ? 95 : 80,
											items: [
												{
													xtype: 'textfield', id:'alias', anchor: '100%', enableKeyEvents: true,
													fieldLabel: FR.T('Share as'),
													listeners: {
														'keyup': function(inpt) {
															FR.currentlySelectedNode.attributes.alias = inpt.getValue();
														}
													}
												},
												{xtype: 'displayfield', value:''},
												{
													id: 'anonymous', xtype:'checkbox', inputType: 'checkbox',
													boxLabel: FR.T('Share anonymously'), hideLabel: true, name: 'anonymous', value: 1,
													listeners: {
														'check': function(inpt, checked) {
															FR.currentlySelectedNode.attributes.anonymous = checked;
														}
													}
												}
											]
										}
									}
								]
							}
						]
					}
				],
				buttonAlign: 'left',
				buttons: [{
					text: FR.T("Save"), cls: 'fr-btn-primary',
					handler: function() {FR.saveInfo();}
				}, {
					text: FR.T("Cancel"), style: 'margin-left:10px',
					handler: function() {window.parent.FR.UI.popups.folderShare.hide();}
				}]
			}
		]
	});

	FR.applyInfo(FR.shareInfo);
	if (FR.shareInfo.length < 1) {Ext.getCmp('optPane').getEl().mask();}
});