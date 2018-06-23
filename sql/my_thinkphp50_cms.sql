/*
 Navicat Premium Data Transfer

 Source Server         : MySQL_on_Mac
 Source Server Type    : MySQL
 Source Server Version : 50716
 Source Host           : localhost
 Source Database       : my_thinkphp50_cms

 Target Server Type    : MySQL
 Target Server Version : 50716
 File Encoding         : utf-8

 Date: 06/24/2018 01:20:29 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `bk_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`),
  KEY `index_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_admin`
-- ----------------------------
BEGIN;
INSERT INTO `bk_admin` VALUES ('1', 'admin', 'c4ca4238a0b923820dcc509a6f75849b'), ('28', 'admin111', 'c4ca4238a0b923820dcc509a6f75849b'), ('42', '郭富城', 'c4ca4238a0b923820dcc509a6f75849b'), ('32', '杨过', 'c4ca4238a0b923820dcc509a6f75849b'), ('33', '东邪', 'c4ca4238a0b923820dcc509a6f75849b'), ('34', '西毒', 'c4ca4238a0b923820dcc509a6f75849b'), ('35', '南帝', 'c4ca4238a0b923820dcc509a6f75849b'), ('36', '北丐', 'c4ca4238a0b923820dcc509a6f75849b'), ('37', '周杰伦', 'c4ca4238a0b923820dcc509a6f75849b'), ('38', '张学友', 'c4ca4238a0b923820dcc509a6f75849b'), ('39', 'PHP', 'c4ca4238a0b923820dcc509a6f75849b'), ('40', 'Java', 'c4ca4238a0b923820dcc509a6f75849b'), ('43', '刘备', 'c4ca4238a0b923820dcc509a6f75849b'), ('45', '黄蓉', 'c4ca4238a0b923820dcc509a6f75849b'), ('44', '郭靖', 'c4ca4238a0b923820dcc509a6f75849b'), ('46', 'a', 'c4ca4238a0b923820dcc509a6f75849b'), ('47', '1', 'c4ca4238a0b923820dcc509a6f75849b'), ('49', 'aaa', 'c4ca4238a0b923820dcc509a6f75849b'), ('50', '1', 'c4ca4238a0b923820dcc509a6f75849b'), ('51', 'bbb', 'c4ca4238a0b923820dcc509a6f75849b'), ('52', 'ccc', 'c4ca4238a0b923820dcc509a6f75849b'), ('53', '汪峰', 'c4ca4238a0b923820dcc509a6f75849b');
COMMIT;

-- ----------------------------
--  Table structure for `bk_article`
-- ----------------------------
DROP TABLE IF EXISTS `bk_article`;
CREATE TABLE `bk_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) NOT NULL COMMENT '文章标题',
  `keywords` varchar(100) NOT NULL COMMENT '关键词',
  `desc` varchar(255) NOT NULL COMMENT '描述',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `thumb` varchar(160) NOT NULL COMMENT '缩略图',
  `content` text NOT NULL COMMENT '内容',
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击数',
  `zan` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL COMMENT '发布时间',
  `cateid` mediumint(9) NOT NULL COMMENT '所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_article`
-- ----------------------------
BEGIN;
INSERT INTO `bk_article` VALUES ('6', '', '', '', '', '', '', '0', '0', '0', '0', '25'), ('7', '1', '', '', '', '', '<p>1<br/></p>', '0', '0', '0', '0', '25'), ('8', '固齿公开赛现场 全国fixed gear车友单车及装备展示', '大视野,固齿,公开赛,fixed gear,车友单车,装备展示', '图中为全国fixed gear车友单车及装备，每年的固齿公开赛就像一场豪华的死飞展会，今年男伙伴里钟情粉色系，女伙伴们热爱黑色系，这世界变化了。 ', '童攀', '/uploads/20180524/640c73c325ee1c042cf94b5aa7401f20.jpeg', '<p>o8月18日，第五届固齿公开赛在北京激情上演，数百名死飞自行车爱好者参与了街区竞速、马球、跳高、定车、平地花式等项目的争夺。“死飞”(FixedGear)为固定齿轮自行车，最早源于美国纽约邮递员所骑的固定齿轮组单车，在日本流行后，迅速在全世界蔓延，于2008年左右传入中国，成为街头文化的代表。</p><p>o图中为全国fixed gear车友单车及装备，每年的固齿公开赛就像一场豪华的死飞展会，今年男伙伴里钟情粉色系，女伙伴们热爱黑色系，这世界变化了。</p><p>o&nbsp;</p><p>o（摄影：马平 Jason智伟 宋双子 小虎JOP 富田 邓伟 陈悦 floralzc）</p><p><br/></p>', '5', '0', '0', '0', '26'), ('9', '固齿公开赛新增街区竞速赛 现场惊险刺激', '固齿公开赛,新增街区,竞速赛,惊险刺激', '图中为车手们正在进行街区竞速比赛，比赛现场惊险刺激，有选手受伤了仍然坚持比赛，这种锲而不舍的死飞精神值得大家学习，也希望受伤的车友早日康复！ ', 'tongpan', '/uploads/20180524/76f406d6c2db7f7a845aa2c44b363222.jpeg', '<p>8月18日，第五届固齿公开赛在北京激情上演，数百名死飞自行车爱好者参与了街区竞速、马球、跳高、定车、平地花式等项目的争夺。“死飞”(FixedGear)为固定齿轮自行车，最早源于美国纽约邮递员所骑的固定齿轮组单车，在日本流行后，迅速在全世界蔓延，于2008年左右传入中国，成为街头文化的代表。</p><p>图中为车手们正在进行街区竞速比赛，比赛现场惊险刺激，有选手受伤了仍然坚持比赛，这种锲而不舍的死飞精神值得大家学习，也希望受伤的车友早日康复！</p><p style=\"margin: 0px 0px 25px; padding: 0px; border: 0px; font-size: 14px; vertical-align: baseline; line-height: 29.390625px; font-family: 宋体; color: rgb(102, 102, 102); background-color: rgb(244, 244, 244); text-align: center;\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">Fixed Gear Open5街区竞速获奖名单</span></p><table style=\"width: 766px;\" width=\"810\"><tbody style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\"><tr style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\" class=\"firstRow\"><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\" width=\"11%\" height=\"17\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">奖项</span></td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\" width=\"25%\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">第一名</span></td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\" width=\"25%\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">第二名</span></td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\" width=\"25%\"><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\">第三名</span></td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\"><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">街区竞速男</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">Daniels</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">廖锡荣</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">廖建宁</td></tr><tr style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline;\"><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">街区竞速女</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">佟宇环</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">伊泉</td><td style=\"margin: 0px; padding: 3px 10px; border: 1px solid rgb(238, 238, 238); font-size: 14px; vertical-align: top;\">刘红豆</td></tr></tbody></table><p><br/></p><p><strong>小贴士：街区竞速比赛规则</strong></p><p>选手必须佩带头盔、 建议安装刹车。 每组两位选手（根据报名顺序自由分配）同时出发，每组比赛两圈，先越过终点线者晋级 采取淘汰制，直至决出冠军、亚军、季军。<br/></p><p>（摄影：马平 李远 Jason智伟 宋双子 &nbsp;邓伟 陈悦）</p><p><span style=\"color:#ff0000;\">注：上述图片中有部分未戴头盔练习画面，请勿模仿，危险。</span></p><p><br/></p>', '0', '0', '0', '0', '26'), ('10', '微电影：Aventon A team征战西班牙巴塞罗那 Redhook', '微电影,Aventon A team,征战', 'Aventon A team参加设在西班牙巴塞罗那的Redhook决赛所拍摄的微电影！本次比赛汇集了世界顶尖场地车手，记录了Aventon A team车手Fabian和Zach的参赛过程及精彩... ', 'tp', '/uploads/20180524/a300b6c9dfc5c97d2183495f677f15c8.jpeg', '<p>Aventon &nbsp;A team参加设在西班牙巴塞罗那的Redhook决赛所拍摄的微电影！Redhook西班牙站比赛8月24日在巴塞罗那举行，本次比赛汇集了世界顶尖场地车手，记录了Aventon A team车手Fabian和Zach的参赛过程及精彩瞬间！</p><p>Redhook\r\n Crit（场地绕圈赛）由自行车爱好者 David August \r\nTrimble于2008年为了庆祝自己生日在纽约创立。活动从最初极小规模只有20来个人参与快速发展到今天国际认可的场地绕圈系列型赛事。RHC \r\n(Redhook Crit \r\n缩写）今年第3站已于8月24号在西班牙巴塞罗那举办，将近200名优秀车手从15个国家纷纷聚集到一起参与这场顶级固齿盛宴。赛事采取各赛点积分制，目前个人排名前三的分别是：Neil\r\n Bezdek, Kyle Murphy, Evan Murphy, 全部来自美国。车队排名前三的是：MASH SF, IRIDE DEMODE\r\n SQUADRA CORSE, TEAM CINELLI MILANO。 冠军站将于1月份在意大利米兰举行。</p><p><br/></p>', '41', '2', '0', '0', '26'), ('11', '硬朗骑士归来，NEIGHBORHOOD 2013秋冬型录一览', '硬朗骑士,,NEIGHBORHOOD', '作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。 ', '童年', '/uploads/20180524/011c2c9e32bd6182ad515758e5b96fc5.jpeg', '<p>作为潮流界的硬汉，NEIGHBORHOOD其每一件的单品都给人以干净，利落，硬朗的印象。当然了，此次NEIGHBORHOOD推出的2013秋冬型录自然也不例外。无论是其外套还是衬衫，都在大叔的示范下显得质感十足，而且加上环境的映衬，使单品的机能性也得以体现。另外值得一提的是，此次NEIGHBORHOOD还在其单品中融入了不少的复古元素，相信不少古着爱好者也会对其产生浓厚的兴趣。</p>', '0', '0', '0', '0', '27'), ('12', '采用PANTONE含羞草花色 ABICI与PANTONE合作车款', 'PANTONE,含羞草花色 ,ABICI,PANTONE', 'ABICI与PANTONE合作车款，车体涂装采用PANTONE年度主打色， 三层粉末静电喷涂，这台ABICI采用PANTONE 14-0848 含羞草花色。 ', '童攀', '/uploads/20180524/37bfc6d846a97cedb7463d9c61e17b09.jpeg', '<p>ABICI与PANTONE合作车款，车体涂装采用PANTONE年度主打色， 三层粉末静电喷涂。</p><p>这台ABICI采用PANTONE\r\n 14-0848 含羞草花色，该色位于Pantone F+H \r\ncotton色卡14页1行69列，其实应该没有几个人知道，含羞草的花是饱和的黄色这件事，黄色象征太阳、可爱和温暖，这个颜色可以激发许多想象力和创新，除了能与焦褐色、铁灰色搭配成为典型的秋季色彩，若与紫色配对，也具有令人惊艳的效果。</p><p><br/></p>', '0', '0', '0', '0', '27'), ('13', '33oz跨时空场地自行车展，渗透复古文化气息', '33oz,,自行车展,复古文化', '炎热夏季结束之前， 国内规模最大的美式复古文化推广网站33oz联合国内知名死飞车队 Triple Cross 在成都的美式复古文化体验店UID Café中共同举办名为“时光，咖啡，场地自行车”的... ', 'tp', '/uploads/20180525/b5352b0b4f016f0a79aa8e811bda584d.jpg', '<p>炎热夏季结束之前， 国内规模最大的美式复古文化推广网站33oz联合国内知名死飞车队 Triple Cross \r\n在成都的美式复古文化体验店UID \r\nCafé中共同举办名为“时光，咖啡，场地自行车”的主题展览。展出的场地自行车藏品全部产自上世纪80年代－90年代，包括意大利Colnago \r\n，Rossin \r\n，Campagnolo等品牌，原日本场地自行车女子国家队比赛用车，日本NJS认证车辆，以及国产的永久自行车架。在浓浓的咖啡香气和美式复古装修的氛围中，让更多人感受有故事的场地自行车的魅力和风采。</p><p><img src=\"http://www.700bike.com/upload/2013/08/201308161154269397.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308161154271042.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308161154297445.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308160324231033.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/20130816032432435.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308160324451939.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308160324494164.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308160324505460.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308161154303691.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308161154335925.jpg\" alt=\"\"/>&nbsp;<img src=\"http://www.700bike.com/upload/2013/08/201308161154374936.jpg\" alt=\"\"/></p><p>此次33oz主导的“时光，咖啡，场地自行车”展览，让喜欢复古文化的朋友们更轻松的了解复古文化中的元素和细节内容。\r\n 1790的欧洲人开始用两个轮子装在木马上，一步一步的改良慢慢形成了现在的自行车。 \r\n自行车是日常生活中是很重要的一个生活交通工具，现代人更多的为了健康骑车出行。 而场地自行车更多在比赛场上看到， \r\n1896年首届奥运会就有场地自行车比赛项目，为了让车子在圆形跑到上越骑越快，所以只采用一个齿轮，无闸的自行车。今天我们在现场看到的就是这些很帅气的场地自行车。而说到与咖啡的结合，在二十世纪初期，意大利的咖啡机制造商FAEMA\r\n 就开始赞助场地自行车队，支持这样的运动和生活方式。 \r\n欧洲人一直都保有这样的生活方式，喝一杯咖啡，骑车去上班，或者出行，时刻感受生活最真实的一面。 此次展览场地选择在咖啡店， \r\n也是鼓励和支持生活在都市里的人，更多的感受这样的生活氛围。&nbsp;<br/><br/></p><p>本次展览免费对外开放，只要对自行车感兴趣的朋友， 都可以前来观看。 展览持续十天， 从8月9日开始到8月19日， 每天中午12点至晚上10点 ， 都可以前来。 展览地址，水碾河南三街37号U37 创意仓库六栋一层的UID Café 。</p><p><span style=\"font-weight: bold;\">主办方介绍：</span></p><p><strong>&nbsp;</strong>作为美式复古文化的推广平台， 从年初转型开始， 努力拓展平台的宽度，将更多的复古元素可以带入到日常生活中来， 让更多人亲身感受原本认为是殿堂级的内容。 最近网站重新改版调整了原有版面， 吸引更多的年轻朋友加入到复古文化中，感受更潮的更经典的时尚气息。&nbsp;<br/><br/><strong>Triple Cross</strong> 是成都本土的死飞车队，一直致力于死飞文化的推广发展，通过自媒体为更多爱好者介绍国外的优秀的死飞文化。此次也是由团队成员提供的场地自行车收藏品与美式复古文化结合共同打造的一次藏品展览。&nbsp;<br/><br/><strong>UID Café </strong>作为目前成都的精品咖啡店之一，努力推广咖啡文化，为成都乃至全国的朋友送出最好的咖啡生活体验。 UID Café 从咖啡豆的烘焙开始， 到最终的出品都为自身设定了严格的要求。 近期更多的咖啡体验交流会吸引了很多爱好者来参加，学习和了解更多的咖啡文化。 <br/></p><p><br/></p>', '3', '0', '0', '0', '27'), ('14', '测试文章', '', '测试文章测试文章测试文章', '测试文章', '/uploads/20180528/fdf6356bf52c432371bd0f7c8bf928b2.jpeg', '<p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p>测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章测试文章</p><p><br/></p>', '0', '0', '0', '1482221540', '27'), ('15', 'COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚', 'COACH,王力宏', 'COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚', '王力宏', '/uploads/20180528/e706bbe19a1fbe2154fdf5fa4138d879.jpeg', '<p>COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚COACH再度携手王力宏 踩单车演绎2013秋冬男士纽约风尚<br/></p>', '0', '0', '0', '0', '33'), ('16', '骑看世界：三个女孩的欧洲骑行之路', '骑看世界', '骑看世界：三个女孩的欧洲骑行之路', '童年', '/uploads/20180528/fdf6356bf52c432371bd0f7c8bf928b2.jpeg', '<p>骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路骑看世界：三个女孩的欧洲骑行之路</p>', '1', '0', '0', '0', '33'), ('17', '骑看世界：探索地中海科西嘉岛', '探索地中海科西嘉岛', '骑看世界：探索地中海科西嘉岛', 'tongpan', '/uploads/20180529/9cecfbff1543b58fc5eb8939d909cc8d.jpeg', '<p>骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛骑看世界：探索地中海科西嘉岛</p>', '22', '0', '1', '1482321519', '33'), ('18', '骑行40000公里 英国胶片摄影师的骑游之旅', '骑行', '骑行40000公里 英国胶片摄影师的骑游之旅', '童攀', '/uploads/20180529/e5226649507fb87216b4870b4e8fe817.jpeg', '<p>骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅骑行40000公里 英国胶片摄影师的骑游之旅</p>', '2', '0', '0', '1482321519', '31'), ('19', '测试轮播1', '', '', '', '/uploads/20180529/d4aebe268898fbe49a95a58c89fa9100.jpg', '<p>测试录播1测试录播1测试录播1测试录播1测试录播1</p>', '2', '0', '1', '1483793251', '26'), ('20', '测试轮播2', '', '', '', '/uploads/20180529/022083600d9ac8c5aa42edee1c457ae2.jpg', '<p>测试轮播2测试轮播2测试轮播2</p>', '9', '0', '1', '1483793294', '27'), ('21', '测试轮播3', '', '', '', '/uploads/20180529/09866f30dafb95e88156b649d114b800.jpg', '<p>sdfasdfasdfasdfasdf<br/></p>', '7', '0', '1', '1483793328', '30'), ('31', '第一篇中文博客！！哈哈', '1，2，3', '哈哈', '1', '/uploads/20180526/69f4c333d71e55baeb8eeb883eb13d8a.jpeg', '<p>第一篇中文博客的内容！！</p>', '1', '0', '0', '0', '46'), ('32', '啦啦测试！', '啦啦测试！', '啦啦测试！啦啦测试！', '啦啦测试！', '', '<p>啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！</p><p><br/></p><p>啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！啦啦测试！</p>', '17', '19', '0', '1527494332', '27'), ('33', '第一篇中文博客！！哈哈xxx', '关键,第一篇,中文博客', '这是第一篇中文博客', 'nnngu', '/uploads/20180529/1545632856245fd0f23f01d6d7634339.jpg', '<p>这是内容！！看看时间会不会被修改。</p><p><br/></p><p>第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx</p><p><br/></p><p><br/></p><p><br/></p><p>第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx第一篇中文博客！！哈哈xxx</p>', '251', '70', '0', '1527494332', '27'), ('34', '我的测试轮播1', '', '', '', '/uploads/20180529/368e948d7cad67e4b62a494266bee7a5.jpg', '<p>我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1我的测试轮播1</p>', '5', '0', '1', '1527550036', '26');
COMMIT;

-- ----------------------------
--  Table structure for `bk_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_group`;
CREATE TABLE `bk_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_auth_group`
-- ----------------------------
BEGIN;
INSERT INTO `bk_auth_group` VALUES ('1', '超级管理员', '1', '71,55,56,57,58,59,66,1,11,12,13,14,9,2,3,10,20,4'), ('3', '链接专员', '1', '1,2,3,20,10,4'), ('4', '配置管理员', '1', '1,9,11,14,13,12'), ('5', '超级用户组', '1', ''), ('7', '郭靖组', '1', '55,56,57,58,59,2,3,10,20,4'), ('8', '黄蓉组', '1', '-1'), ('9', '杨过组', '1', ''), ('10', '小龙女组', '1', '55,56,57,58,59,2,3,10,20,4'), ('11', '周杰伦组', '0', '-1'), ('12', '林俊杰组', '1', '-1'), ('13', '李白组', '1', '-1');
COMMIT;

-- ----------------------------
--  Table structure for `bk_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_group_access`;
CREATE TABLE `bk_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_auth_group_access`
-- ----------------------------
BEGIN;
INSERT INTO `bk_auth_group_access` VALUES ('1', '1'), ('28', '3'), ('32', '1'), ('33', '1'), ('34', '1'), ('35', '1'), ('36', '1'), ('37', '1'), ('38', '1'), ('39', '1'), ('40', '1'), ('42', '4'), ('43', '1'), ('44', '7'), ('45', '1'), ('46', '1'), ('47', '1'), ('49', '13'), ('50', '9'), ('51', '9'), ('52', '13'), ('53', '8');
COMMIT;

-- ----------------------------
--  Table structure for `bk_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_rule`;
CREATE TABLE `bk_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(5) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_auth_rule`
-- ----------------------------
BEGIN;
INSERT INTO `bk_auth_rule` VALUES ('1', 'index/index', '后台首页', '1', '1', '', '0', '0', '7'), ('2', 'link', '友情链接', '1', '1', '', '0', '0', '4'), ('3', 'link/lst', '链接列表', '1', '1', '', '2', '1', '5'), ('4', 'link/del', '删除链接', '1', '1', '', '3', '2', '6'), ('11', 'conf/lst', '配置列表', '1', '1', '', '1', '1', '50'), ('10', 'link/add', '添加链接', '1', '1', '', '3', '2', '50'), ('9', 'conf/conf', '配置项', '1', '1', '', '1', '1', '50'), ('12', 'conf/add', '添加配置', '1', '1', '', '11', '2', '50'), ('13', 'conf/del', '配置删除', '1', '1', '', '11', '2', '50'), ('14', 'conf/edit', '配置编辑', '1', '1', '', '11', '2', '50'), ('55', 'admin', '管理员', '1', '1', '', '0', '0', '50'), ('56', 'admin/lst', '管理员列表', '1', '1', '', '55', '1', '50'), ('57', 'admin/add', '管理员添加', '1', '1', '', '56', '2', '50'), ('58', 'admin/del', '管理员删除', '1', '1', '', '56', '2', '50'), ('59', 'admin/edit', '管理员修改', '1', '1', '', '56', '2', '50'), ('20', 'link/edit', '修改链接', '1', '1', '', '3', '2', '50'), ('71', 's111', '洪七公111', '1', '1', '', '0', '0', '57'), ('66', ' s', '顶级的', '1', '1', '', '0', '0', '50');
COMMIT;

-- ----------------------------
--  Table structure for `bk_cate`
-- ----------------------------
DROP TABLE IF EXISTS `bk_cate`;
CREATE TABLE `bk_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目类型：1:文章列表栏目 2:单页栏目3：图片列表',
  `keywords` varchar(255) NOT NULL COMMENT '栏目关键词',
  `desc` varchar(255) NOT NULL COMMENT '栏目描述',
  `content` text NOT NULL COMMENT '栏目内容',
  `rec_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `rec_bottom` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `sort` mediumint(9) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_cate`
-- ----------------------------
BEGIN;
INSERT INTO `bk_cate` VALUES ('25', '单车分类', '1', '', '', '', '0', '0', '0', '50'), ('26', '死飞车', '1', '死飞车,自行车', '死飞车的栏目描述', '', '1', '0', '25', '50'), ('27', '复古骑行', '1', '', '', '', '0', '1', '25', '50'), ('28', '骑行装备', '1', '', '', '', '0', '0', '0', '50'), ('29', '车身装备', '1', '', '', '', '0', '0', '28', '50'), ('30', '人身装备', '1', '', '', '', '1', '0', '28', '50'), ('31', '单车生活', '3', '', '', '', '0', '0', '0', '50'), ('32', '行业资讯', '1', '', '', '', '0', '0', '0', '50'), ('33', '单车生活2', '3', '', '', '', '1', '1', '31', '50'), ('34', '关于我们', '2', '关于我们', '关于我们', '<h1 label=\"标题居左\" style=\"font-size: 32px; font-weight: bold; border-bottom: 2px solid rgb(204, 204, 204); padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;\">关于我们<br/></h1><p><img src=\"http://img.baidu.com/hi/jx2/j_0001.gif\"/></p><p><img src=\"/ueditor/php/upload/image/20180528/1527515711693361.jpeg\" title=\"1527515711693361.jpeg\" alt=\"头像4.jpeg\"/></p><p>关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们关于我们</p>', '0', '1', '0', '50'), ('35', '公司简介', '2', '公司简介', '公司简介公司简介公司简介公司简介公司简介', '<p>公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介公司简介</p>', '1', '1', '0', '50'), ('50', '商丘', '2', '商丘,河南,牡丹花', '这是描述！！', '<p>这是内容！！！<img src=\"http://img.baidu.com/hi/jx2/j_0001.gif\"/><img src=\"http://img.baidu.com/hi/jx2/j_0067.gif\"/></p>', '0', '0', '49', '50'), ('48', '美国', '3', 'no', 'no', '<p>no</p>', '0', '1', '0', '50'), ('46', '中国', '1', 'no', 'no', 'no', '0', '0', '0', '9'), ('49', '河南', '1', '河南,洛阳,牡丹花', '这是描述！！', '', '0', '0', '46', '50');
COMMIT;

-- ----------------------------
--  Table structure for `bk_conf`
-- ----------------------------
DROP TABLE IF EXISTS `bk_conf`;
CREATE TABLE `bk_conf` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置项id',
  `cnname` varchar(50) NOT NULL COMMENT '配置中文名称',
  `enname` varchar(50) NOT NULL COMMENT '英文名称',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置类型 1：单行文本框 2：多行文本 3：单选按钮 4：复选按钮 5：下拉菜单',
  `value` varchar(255) NOT NULL COMMENT '配置值',
  `values` varchar(255) NOT NULL COMMENT '配置可选值',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '配置项排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_conf`
-- ----------------------------
BEGIN;
INSERT INTO `bk_conf` VALUES ('1', '站点名称', 'sitename', '1', '自行车 CMS 企业站 ', '', '53'), ('2', '站点关键词', 'keywords', '1', '自行车,CMS', '', '52'), ('3', '站点描述', 'desc', '2', '这是站点描述，哈哈哈                                                                                                                                                                                                                                                 ', '', '51'), ('6', '是否关闭网站', 'close', '3', '否', '是,否', '50'), ('7', '启动验证码', 'code', '4', '是', '是', '50'), ('8', '自动清空缓存', 'cache', '5', '2个小时', '1个小时,2个小时,3个小时', '50'), ('9', '允许评论', 'comment', '4', '', '允许', '50'), ('10', '我的名称', 'myName', '1', 'nnngu', '', '50'), ('12', '是否关闭评论', 'close_comment', '3', '是', '是,否', '50');
COMMIT;

-- ----------------------------
--  Table structure for `bk_link`
-- ----------------------------
DROP TABLE IF EXISTS `bk_link`;
CREATE TABLE `bk_link` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(60) NOT NULL COMMENT '链接标题',
  `desc` varchar(255) NOT NULL COMMENT '链接描述',
  `url` varchar(160) NOT NULL COMMENT '链接地址',
  `sort` mediumint(9) NOT NULL DEFAULT '50' COMMENT '链接排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bk_link`
-- ----------------------------
BEGIN;
INSERT INTO `bk_link` VALUES ('10', '百度', '百度', 'http://www.baidu.com', '50'), ('2', '36011', '', 'http://www.360.com', '2'), ('3', '新浪', '新浪新浪新浪', 'http://www.sina.com.cn', '1'), ('11', '淘宝', '淘宝', 'http://www.taobao.com', '49'), ('12', '我的网站1', '这是我的网站1', 'https://nnngu.github.io', '50'), ('13', '我的网站2', '这是我的网站2', 'https://nnngu.github.io', '50'), ('15', '我的网站3', '这是我的网站3', 'https://nnngu.github.io', '50'), ('16', '我的网站4', '', 'https://nnngu.github.io/LearningNotes/', '50'), ('17', '我的网站5', '这是我的网站5', 'https:nnngu.github.io', '50'), ('18', '我的网站6', '这是我的网站6', 'https:nnngu.github.io', '50'), ('19', '我的网站7', '这是我的网站7', 'https://nnngu.github.io', '50');
COMMIT;

-- ----------------------------
--  Table structure for `bk_zan`
-- ----------------------------
DROP TABLE IF EXISTS `bk_zan`;
CREATE TABLE `bk_zan` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ip` char(20) NOT NULL,
  `artid` mediumint(9) NOT NULL,
  `num` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
