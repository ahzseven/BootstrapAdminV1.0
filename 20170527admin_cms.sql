/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : admin_cms

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Author : seven
Date   : 2017-05-27 17:58:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_access
-- ----------------------------
DROP TABLE IF EXISTS `cms_access`;
CREATE TABLE `cms_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_access
-- ----------------------------
INSERT INTO `cms_access` VALUES ('1', '1', '1', null);
INSERT INTO `cms_access` VALUES ('2', '13', '2', null);
INSERT INTO `cms_access` VALUES ('2', '12', '3', null);
INSERT INTO `cms_access` VALUES ('1', '2', '2', null);
INSERT INTO `cms_access` VALUES ('2', '11', '3', null);
INSERT INTO `cms_access` VALUES ('2', '10', '2', null);
INSERT INTO `cms_access` VALUES ('2', '9', '3', null);
INSERT INTO `cms_access` VALUES ('2', '8', '2', null);
INSERT INTO `cms_access` VALUES ('2', '7', '2', null);
INSERT INTO `cms_access` VALUES ('2', '1', '1', null);
INSERT INTO `cms_access` VALUES ('3', '17', '3', null);
INSERT INTO `cms_access` VALUES ('3', '16', '2', null);
INSERT INTO `cms_access` VALUES ('3', '12', '3', null);
INSERT INTO `cms_access` VALUES ('3', '11', '3', null);
INSERT INTO `cms_access` VALUES ('3', '10', '2', null);
INSERT INTO `cms_access` VALUES ('3', '1', '1', null);
INSERT INTO `cms_access` VALUES ('1', '3', '3', null);
INSERT INTO `cms_access` VALUES ('1', '4', '3', null);
INSERT INTO `cms_access` VALUES ('1', '5', '3', null);
INSERT INTO `cms_access` VALUES ('1', '6', '3', null);
INSERT INTO `cms_access` VALUES ('1', '7', '2', null);
INSERT INTO `cms_access` VALUES ('1', '8', '2', null);
INSERT INTO `cms_access` VALUES ('1', '9', '3', null);
INSERT INTO `cms_access` VALUES ('1', '10', '2', null);
INSERT INTO `cms_access` VALUES ('1', '11', '3', null);
INSERT INTO `cms_access` VALUES ('1', '12', '3', null);
INSERT INTO `cms_access` VALUES ('1', '13', '2', null);
INSERT INTO `cms_access` VALUES ('1', '14', '3', null);
INSERT INTO `cms_access` VALUES ('1', '15', '3', null);
INSERT INTO `cms_access` VALUES ('1', '16', '2', null);
INSERT INTO `cms_access` VALUES ('1', '17', '3', null);
INSERT INTO `cms_access` VALUES ('2', '14', '3', null);
INSERT INTO `cms_access` VALUES ('2', '15', '3', null);
INSERT INTO `cms_access` VALUES ('2', '16', '2', null);
INSERT INTO `cms_access` VALUES ('2', '17', '3', null);

-- ----------------------------
-- Table structure for cms_menu
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu` (
  `menu_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `description` varchar(40) NOT NULL,
  `edittime` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`),
  KEY `listorder` (`listorder`),
  KEY `parentid` (`parentid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_menu
-- ----------------------------
INSERT INTO `cms_menu` VALUES ('1', '科技', '0', '', '0', '信息咨询', '1492531972', '1', '1');
-- ----------------------------
-- Table structure for cms_news
-- ----------------------------
DROP TABLE IF EXISTS `cms_news`;
CREATE TABLE `cms_news` (
  `news_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `posids` varchar(250) NOT NULL DEFAULT '',
  `listorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `username` char(20) NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `count` int(10) unsigned NOT NULL DEFAULT '0',
  `menu_id` mediumint(6) unsigned DEFAULT '0' COMMENT '所属菜单',
  PRIMARY KEY (`news_id`),
  KEY `status` (`status`,`listorder`,`news_id`),
  KEY `listorder` (`status`,`listorder`,`news_id`),
  KEY `menu_id` (`menu_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_news
-- ----------------------------
INSERT INTO `cms_news` VALUES ('25', '苹果收购睡眠监测厂商 Beddit，Apple Watch 或许是最大的受益者', '苹果收购睡眠监测厂商 Beddi ', '/upload/2017/05/16/591a8e1d30c0b.jpg', 'Beddit，Apple Watch', '苹果收购睡眠监测厂商 Beddit，Apple Watch 或许是最大的受益者', '', '0', '1', 'admin', '1492502837', '0', '63', '4');

-- ----------------------------
-- Table structure for cms_news_content
-- ----------------------------
DROP TABLE IF EXISTS `cms_news_content`;
CREATE TABLE `cms_news_content` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` mediumint(8) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_news_content
-- ----------------------------
INSERT INTO `cms_news_content` VALUES ('1', '25', '&lt;span style=&quot;color:#333333;font-family:&amp;quot;font-size:16px;line-height:28.8px;background-color:#FFFFFF;&quot;&gt;\r\n&lt;div class=&quot;topic-cover&quot; style=&quot;color:#333333;font-family:&amp;quot;font-size:14px;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;img alt=&quot;苹果收购睡眠监测厂商 Beddit，Apple Watch 或许是最大的受益者&quot; src=&quot;https://ocpk3ohd2.qnssl.com/uploads/image/file/7b/27/7b27a8e1120e6b70a406a8c84611aa05.jpg?imageView2/2/w/744/interlace/1/q/88/ignore-error/1/&quot; class=&quot;js-lazy loaded&quot; style=&quot;width:700px;&quot; /&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;article-content&quot; style=&quot;font-size:1.6rem;color:#333333;font-family:&amp;quot;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;p&gt;\r\n		苹果又收购了一家小公司，这已经是今年的第三笔了。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		前两次分别是以色列的专业面部识别公司 RealFace 和 iOS 平台自动化工具 Workflow，靠收购小公司来获取研发成本较高的技术一直是大公司的惯用伎俩，这次轮到睡眠监测设备厂商 Beddit 了。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		Beddit 是一家软硬件兼具的专业睡眠监测厂商，它在 iOS 和 WatchOS 上都有配套的应用。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		周一，Beddit 悄悄地在其隐私条款中宣布了被收购的消息，随后，用户在周二的 Beddit iOS 应用更新中收到了隐私条款更新的提醒。\r\n	&lt;/p&gt;\r\n	&lt;blockquote style=&quot;color:#666666;&quot;&gt;\r\n		&lt;p&gt;\r\n			Beddit 已被苹果公司收购。您的个人数据将按照苹果的隐私条款被搜集、使用和公开。\r\n		&lt;/p&gt;\r\n	&lt;/blockquote&gt;\r\n	&lt;p&gt;\r\n		&lt;img alt=&quot;微信截图_20170510154859.png&quot; class=&quot;js-lazy loaded&quot; src=&quot;https://ocpk3ohd2.qnssl.com/uploads/image/file/38/ce/38ce0703bd4a1badb52c5097b8cf9338.png?imageView2/2/w/744/interlace/1/q/88/ignore-error/1/&quot; height=&quot;636.0145666423889&quot; style=&quot;height:auto;&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		具体的收购情况我们还不得而知，但 Beddit 硬件的消费者可以不用担心，你们还可以继续使用购买的产品并享受相应的服务。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		此前，Beddit 推出了一款全新的睡眠监测设备，它可以在用户睡觉的时候追踪用户的动作。心率和其他生物特征的数据。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		这款睡眠监测设备配备了一块电容式压感触摸屏、温度和湿度传感器，它可以测量用户的心率，呼吸频率以及各种环境变量，通过监测到的数据来生成用户睡眠情况的整体描述。只要用户允许其配套的 iOS 应用获取 iPhone 上的麦克风使用权限，它甚至可以监测用户的打鼾情况。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&lt;img alt=&quot;f9283d8ddd3459b978aaadd0f45696f0.jpg&quot; class=&quot;js-lazy loaded&quot; src=&quot;https://ocpk3ohd2.qnssl.com/uploads/image/file/20/b7/20b7ca34d83f859b06b9b454e00a8b37.jpg?imageView2/2/w/744/interlace/1/q/88/ignore-error/1/&quot; height=&quot;556.8&quot; style=&quot;height:auto;&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&lt;i&gt;&lt;i&gt;（Beddit 3 睡眠检测设备）&lt;/i&gt;&lt;br /&gt;\r\n&lt;/i&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		由硬件设备搜集到的数据将自动被发送到用户的 iPhone 上，后者将信息储存，并生成方便用户理解的图表形式。这样做的目的是根据可以测量的数据，让用户改变不良的睡眠习惯和睡眠环境。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		Beddit 还集成到了 HealthKit 中，便于用户使用原生的健康应用以及 Apple Watch 追踪查看睡眠和健康数据。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		苹果公司也在其官网和实体店中出售 Beddit 的最新产品——售价 150 美元（约人民币 1036 元）的 Beddit 3。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		虽然苹果公司并未对这次收购行为作出评论，但 Beddit 和其整个团队很有可能会加入到这家科技巨头不断扩充的生物医药工程的大部队之中。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&lt;img alt=&quot;微信图片_20170510154713.jpg&quot; class=&quot;js-lazy loaded&quot; src=&quot;https://ocpk3ohd2.qnssl.com/uploads/image/file/6b/17/6b17063c87c7c3d429a18161f830112d.jpg?imageView2/2/w/744/interlace/1/q/88/ignore-error/1/&quot; height=&quot;554.6379928315412&quot; style=&quot;height:auto;&quot; /&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		&lt;i&gt;（Beddit 的 iOS 应用）&lt;/i&gt;\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		在过去的一年里，Apple Watch 的销量不断上涨，最新的调查报告表明，Apple Watch 已经成为了全球可穿戴设备的销量冠军，在 2017 年 Q1 季度出货量达到了 350 万部。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		虽然这款产品在刚发布的时候受到了不少的诟病，依托于整个苹果的生态，Apple Watch 还是成为了最受欢迎的可穿戴设备。现在，Apple Watch 可以说已经成为了苹果生态中非常重要的一环，苹果想要用 Apple Watch 反过来留住其他平台的用户了。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		从这次的收购行为我们可以看出，苹果计划将更专业的睡眠追踪功能集成到 Apple Watch 上。但需要点明的是，目前 Apple Watch 的电池续航情况只能维持一个白天的使用时间，要想让用户在夜间睡眠时继续佩戴使用，苹果首先要在未来的新款手表上解决电池的问题。\r\n	&lt;/p&gt;\r\n	&lt;p&gt;\r\n		自 2014 年推出 HealthKit 和 Apple Watch 以来，苹果公司一直对健康和保健类的产品保持高度的关注，这其实是为了&lt;b&gt;将 Apple Watch Series 2 打造成一款全能的运动手表&lt;/b&gt;。上个月，一个调查报告显示苹果正在研究用于追踪血糖水平的无创血糖监测技术，这项科技被广泛视为现代医疗科学领域的「圣杯」。\r\n	&lt;/p&gt;\r\n	&lt;div&gt;\r\n		&lt;br /&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/span&gt;', '0', '0');

-- ----------------------------
-- Table structure for cms_node
-- ----------------------------
DROP TABLE IF EXISTS `cms_node`;
CREATE TABLE `cms_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`,`status`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_node
-- ----------------------------
INSERT INTO `cms_node` VALUES ('1', 'Admin', '后台管理', '1', null, '1', '0', '1');
INSERT INTO `cms_node` VALUES ('2', 'Rbac', '权限管理', '1', null, '1', '1', '2');
INSERT INTO `cms_node` VALUES ('3', 'roleList', '角色列表', '1', null, '1', '2', '3');
INSERT INTO `cms_node` VALUES ('4', 'addRole', '添加角色', '1', null, '2', '2', '3');
INSERT INTO `cms_node` VALUES ('5', 'nodeList', '权限列表', '1', null, '3', '2', '3');
INSERT INTO `cms_node` VALUES ('6', 'addNode', '添加权限', '1', null, '4', '2', '3');
INSERT INTO `cms_node` VALUES ('7', 'Menu', '菜单管理', '1', null, '2', '1', '2');
INSERT INTO `cms_node` VALUES ('8', 'Content', '文章管理', '1', null, '3', '1', '2');
INSERT INTO `cms_node` VALUES ('9', 'add', '创作文章', '1', null, '2', '8', '3');
INSERT INTO `cms_node` VALUES ('10', 'System', '系统管理', '1', null, '4', '1', '2');
INSERT INTO `cms_node` VALUES ('11', 'index', '系统配置', '1', null, '1', '10', '3');
INSERT INTO `cms_node` VALUES ('12', 'info', '系统信息', '1', null, '2', '10', '3');
INSERT INTO `cms_node` VALUES ('13', 'Users', '用户管理', '1', null, '5', '1', '2');
INSERT INTO `cms_node` VALUES ('14', 'index', '用户列表', '1', null, '1', '13', '3');
INSERT INTO `cms_node` VALUES ('15', 'add', '添加用户', '1', null, '2', '13', '3');
INSERT INTO `cms_node` VALUES ('16', 'Login', '安全管理', '1', null, '6', '1', '2');
INSERT INTO `cms_node` VALUES ('17', 'logout', '安全退出', '1', null, '1', '16', '3');
INSERT INTO `cms_node` VALUES ('18', 'index', '文章列表', '1', null, '1', '8', '3');

-- ----------------------------
-- Table structure for cms_role
-- ----------------------------
DROP TABLE IF EXISTS `cms_role`;
CREATE TABLE `cms_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_role
-- ----------------------------
INSERT INTO `cms_role` VALUES ('1', '超级管理员', null, '1', '拥有所有管理权限');
INSERT INTO `cms_role` VALUES ('2', '管理员', null, '1', '拥有部分管理权限');
INSERT INTO `cms_role` VALUES ('3', '会员', null, '1', '拥有文章管理权限');

-- ----------------------------
-- Table structure for cms_role_user
-- ----------------------------
DROP TABLE IF EXISTS `cms_role_user`;
CREATE TABLE `cms_role_user` (
  `role_id` mediumint(9) unsigned NOT NULL,
  `user_id` char(32) NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `group_id` (`role_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_role_user
-- ----------------------------
INSERT INTO `cms_role_user` VALUES ('1', '1');
INSERT INTO `cms_role_user` VALUES ('2', '2');
INSERT INTO `cms_role_user` VALUES ('3', '10');
INSERT INTO `cms_role_user` VALUES ('3', '11');
INSERT INTO `cms_role_user` VALUES ('3', '12');
INSERT INTO `cms_role_user` VALUES ('3', '13');
INSERT INTO `cms_role_user` VALUES ('3', '14');
INSERT INTO `cms_role_user` VALUES ('3', '15');
INSERT INTO `cms_role_user` VALUES ('3', '16');
INSERT INTO `cms_role_user` VALUES ('3', '17');
INSERT INTO `cms_role_user` VALUES ('3', '18');
INSERT INTO `cms_role_user` VALUES ('3', '19');
INSERT INTO `cms_role_user` VALUES ('3', '20');
INSERT INTO `cms_role_user` VALUES ('3', '21');
INSERT INTO `cms_role_user` VALUES ('3', '3');
INSERT INTO `cms_role_user` VALUES ('3', '4');
INSERT INTO `cms_role_user` VALUES ('3', '5');
INSERT INTO `cms_role_user` VALUES ('3', '6');
INSERT INTO `cms_role_user` VALUES ('3', '7');
INSERT INTO `cms_role_user` VALUES ('3', '8');
INSERT INTO `cms_role_user` VALUES ('3', '9');

-- ----------------------------
-- Table structure for cms_user
-- ----------------------------
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(30) DEFAULT '0',
  `registertime` int(10) NOT NULL,
  `lastlogintime` int(10) unsigned NOT NULL DEFAULT '0',
  `age` tinyint(2) NOT NULL,
  `email` varchar(40) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `count` mediumint(6) unsigned DEFAULT '0' COMMENT '统计登录次数',
  PRIMARY KEY (`id`),
  KEY `status` (`status`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_user
-- ----------------------------
INSERT INTO `cms_user` VALUES ('1', 'admin', 'd099d126030d3207ba102efa8e60630a', '0.0.0.0', '1493633493', '1495260584', '38', 'ahzseven@outlook.com', 'seven', '1', '4');
INSERT INTO `cms_user` VALUES ('2', 'seven', '9f24445952d45f7138a1b54eb74a2fdd', '::1', '1493633493', '1492531881', '28', 'ahzseven@outlook.com', '浩', '1', null);
