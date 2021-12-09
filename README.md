# todolist-mvc-unit
## Tutorial setting project
- Get project: $ git clone https://github.com/KhoiVinhPhan/todolist-mvc-unit.git
- Create database in local
- Connect project to database in file: app/connection.php
	
	mysql:host=localhost;dbname=mvc_php', 'root', ''
- Create table "todo_list":

	DROP TABLE IF EXISTS `todo_list`;
	CREATE TABLE `todo_list` (
  		`id` int(11) NOT NULL AUTO_INCREMENT,
  		`task` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  		`date` date DEFAULT NULL,
  		PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;


