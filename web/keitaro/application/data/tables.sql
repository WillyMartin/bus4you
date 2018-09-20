CREATE TABLE IF NOT EXISTS `keitaro_country_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `countries` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;
CREATE TABLE IF NOT EXISTS `keitaro_settings` (
  `key` varchar(100) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `keitaro_campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'position',
  `uniqueness_method` varchar(20) NOT NULL DEFAULT 'cookie',
  `cookies_ttl` int(11) NOT NULL DEFAULT '24',
  `action_type` varchar(20) DEFAULT NULL,
  `action_payload` text,
  `action_for_bots` varchar(50) NOT NULL DEFAULT '404',
  `bot_redirect_url` text,
  `bot_text` text,
  `action_tracking_disabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `position` int(10) unsigned DEFAULT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'active',
  `updated_at` datetime DEFAULT NULL,
  `mode` varchar(50) DEFAULT 'general',
  `cost_type` varchar(10) DEFAULT 'CPV',
  `cost_value` decimal(10,4) DEFAULT '0.0000',
  `cost_currency` varchar(3) DEFAULT NULL,
  `group_id` int(10) unsigned DEFAULT NULL,
  `bind_visitors` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `alias` (`alias`),
  KEY `state` (`state`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `keitaro_stream_filters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stream_id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `mode` enum('accept','reject') NOT NULL,
  `payload` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stream_id` (`stream_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_streams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  `chance` int(3) NOT NULL DEFAULT '0',
  `redirect_type` varchar(50) NOT NULL,
  `url` text,
  `action_options` TEXT NULL DEFAULT NULL,
  `comments` text,
  `state` varchar(50) NOT NULL DEFAULT 'active',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `position` (`position`),
  KEY `chance` (`chance`),
  KEY `state` (`state`),
  KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1403 ;

CREATE TABLE IF NOT EXISTS `keitaro_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('ADMIN','USER') NOT NULL DEFAULT 'USER',
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permissions` varchar(255) DEFAULT NULL,
  `rules` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`,`password`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_shards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(8) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=635 ;

CREATE TABLE IF NOT EXISTS `keitaro_ips` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` int(10) unsigned NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_ips` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `ip` int(10) unsigned NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `stream_id` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_triggers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stream_id` int(10) unsigned NOT NULL,
  `target` varchar(50) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `selected_page` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `interval` int(10) unsigned NOT NULL,
  `next_run_at` int(10) unsigned DEFAULT NULL,
  `alternative_urls` text,
  `grab_from_page` varchar(250) DEFAULT NULL,
  `av_settings` text,
  `reverse` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
 `scan_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `enabled` (`enabled`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `schema_version` (
  `version` int(10) unsigned NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `keitaro_conversions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) DEFAULT NULL,
  `stream_id` int(10) unsigned DEFAULT NULL,
  `sub_id` varchar(30) NOT NULL,
  `tid` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `previous_status` varchar(100) DEFAULT NULL,
  `original_status` varchar(100) DEFAULT NULL,
  `revenue` decimal(10,4) DEFAULT '0.0000',
  `cost` decimal(10,4) DEFAULT '0.0000',
  `se` varchar(100) DEFAULT NULL,
  `sub_id_1` varchar(255) DEFAULT NULL,
  `sub_id_2` varchar(255) DEFAULT NULL,
  `sub_id_3` varchar(255) DEFAULT NULL,
  `sub_id_4` varchar(255) DEFAULT NULL,
  `extra_param_1` varchar(255) DEFAULT NULL,
  `extra_param_2` varchar(255) DEFAULT NULL,
  `extra_param_3` varchar(255) DEFAULT NULL,
  `extra_param_4` varchar(255) DEFAULT NULL,
  `extra_param_5` varchar(255) DEFAULT NULL,
  `extra_param_6` varchar(255) DEFAULT NULL,
  `extra_param_7` varchar(255) DEFAULT NULL,
  `browser` varchar(150) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `region` varchar(6) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `ip` bigint(11) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `operator` varchar(50) DEFAULT NULL,
  `isp` varchar(100) DEFAULT NULL,
  `connection_type` varchar(10) DEFAULT NULL,
  `device_type` varchar(30) DEFAULT NULL,
  `device_model` varchar(200) DEFAULT NULL,
  `params` text,
  `entry_date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `processed` int(1) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_id_tid` (`sub_id`,`tid`),
  KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `keitaro_monitoring_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(10) NOT NULL,
  `stream_id` int(10) unsigned NOT NULL,
  `trigger_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `state` enum('unread','read') NOT NULL DEFAULT 'read',
  PRIMARY KEY (`id`),
  KEY `trigger_id` (`trigger_id`),
  KEY `stream_id` (`stream_id`),
  KEY `state` (`state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_browsers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_campaigns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `bots` int(10) unsigned DEFAULT '0',
  `empty_referrer` int(10) unsigned DEFAULT '0',
  `mobile` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_campaign_id` (`date`, `campaign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_device_models` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_device_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_hours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `keitaro_index_isp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `connection_type` varchar(250) DEFAULT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_operators` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_keywords` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_os` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_params` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_name_value` (`date`,`name`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_referrers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `keitaro_index_sources` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `keitaro_index_streams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `value` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_requests` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `stream_id` INT UNSIGNED NOT NULL ,
  `datetime` DATETIME NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `keitaro_index_connection_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_index_isp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `connection_type` varchar(250) DEFAULT NULL,
  `value` varchar(250) NOT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `unique` int(10) unsigned DEFAULT '0',
  `leads` int(10) unsigned NOT NULL DEFAULT '0',
  `sales` int(10) unsigned DEFAULT '0',
  `conversions` int(10) unsigned DEFAULT '0',
  `revenue` decimal(13,4) unsigned DEFAULT '0.0000',
  `cost` decimal(13,4) unsigned DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  KEY `date_value` (`date`,`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `keitaro_ip_sessions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` int(11)  UNSIGNED NOT NULL,
  `expires_at` DATETIME NOT NULL,
  `payload` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS  `keitaro_groups` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `name` VARCHAR( 100 ) NOT NULL ,
  `position` INT UNSIGNED NOT NULL ,
  INDEX ( `position` )
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `keitaro_campaign_postbacks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `campaign_id` INT UNSIGNED NOT NULL ,
  `method` VARCHAR( 10 ) NOT NULL,
  `url` TEXT NOT NULL ,
  `statuses` VARCHAR( 255 ) NULL DEFAULT NULL,
  `source` VARCHAR( 255 ) NULL DEFAULT NULL,
  INDEX (  `campaign_id` )
) ENGINE = INNODB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `keitaro_queue` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` blob NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `error_message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `schema_migrations` (
  `name` varchar(255) NOT NULL,
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;