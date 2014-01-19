# 数据库结构

## 用户

	CREATE TABLE "user" (
		id			BIG SERIAL,
			-- 账号
		account	TEXT,
			-- 登录名
		creation	TIMESTAMP WITH TIMEZONE,
			-- 创建时间
		password	TEXT,
			-- 密码
		realname	TEXT,
			-- 真名
		nickname	TEXT,
			-- 显示名
		disabled	BOOL
			-- 是否禁用
	);

## 用户联系方式

## 组织

名称，编号，是否公开

## 组织联系方式

## 系统组织授权方式

组织编号，用户账户，最长单次授权期

## 用户－组织表

用户账户，组织编号，所属分组［管理｜编辑｜普通｜列席］

## 对象－组织权限表
对象名，组织编号，权限类型［管理｜阅读］，授权期

对象名是“类型＋路径”，比如："page:/su/info/", "orgmgmt:/set_public"（创建公开组织）, "orgmgmt:/add_member"（添加普通成员）

## 对象－用户权限表

对象名，用户账户，权限类型［任务编辑］，授权期

比如："admin:/disable_user"（禁用用户）, "admin:/drop_organization"（删除组织）

## 用户消息

账号，发件账号，发送时间，消息标题，消息内容，是否已经抄送用户邮箱

当标题为"!SYS: [type]"时则是系统消息，是功能性，不能被直接阅读，作用比如：申请加入组织，申请将列席成员转为普通成员，申请将内部组织转为公开组织，要求确认账户权限、否则冻结权限
用户－组织事件表（事件类型［授权｜权限撤销｜权限冻结｜权限解冻］，发生时间，用户账户，组织编号，事件数据）

## UIS 数据记录

UIS 账号，名称，邮箱，类型，部门，记录时间

## UIS 绑定

用户账号，UIS 账号

## 用户会话

会话号，过期时间，账号，会话类型［名字会话｜实质会话］

## 系统组织令牌

会话号，特权期开始时间，系统组织编号