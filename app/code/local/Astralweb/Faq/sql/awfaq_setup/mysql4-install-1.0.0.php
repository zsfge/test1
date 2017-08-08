<?php
$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("
		drop table if exists {$this->getTable('awfaq/faqs')};
		
		CREATE TABLE {$this->getTable('awfaq/faqs')} (
		  `entity_id` int(11) NOT NULL AUTO_INCREMENT,
		  `title` varchar(255),
		  `content` varchar(255),
		  `status` int(1),
		  `category_id` int(11),		  
		  PRIMARY KEY (`entity_id`)
		) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");

$installer->run("
		drop table if exists {$this->getTable('awfaq/category')};
		
		CREATE TABLE {$this->getTable('awfaq/category')} (
		  `entity_id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(255),
		  `status` int(1),
		  PRIMARY KEY (`entity_id`)
		) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");

$installer->endSetup();