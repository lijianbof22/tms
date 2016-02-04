CREATE TABLE IF NOT EXISTS `sys_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `tms`.`sys_types` (`type`, `name`, `code`, `description`) VALUES 
('district', '和平', 'heping', NULL),
('district', '河东', 'hedong', NULL),
('district', '河西', 'hexi', NULL),
('district', '河北', 'hebei', NULL),
('district', '南开', 'nankai', NULL),
('district', '红桥', 'hongqiao', NULL),
('district', '西青', 'xiqing', NULL),
('district', '武清', 'wuqing', NULL),
('district', '东丽', 'dongli', NULL),
('district', '津南', 'jinnan', NULL),
('district', '塘沽', 'tanggu', NULL),
('district', '汉沽', 'hangu', NULL),
('district', '大港', 'dagang', NULL),
('district', '静海', 'jinghai', NULL),
('district', '宝坻', 'baodi', NULL),
('district', '蓟县', 'jixian', NULL),
('district', '华苑产业园区', 'huayuan', NULL),
('district', '空港', 'konggang', NULL),
('district', '滨海新区高新区', 'binhai', NULL),
('district', '泰达开发区', 'taida', NULL),
('district', '东疆港', 'dongjianggang', NULL),
('district', '中心商务区', 'zhongxinshangwu', NULL);

CREATE TABLE IF NOT EXISTS `task_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `author` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `company` ADD `assigned` INT NOT NULL DEFAULT '1' AFTER `mobile`;


