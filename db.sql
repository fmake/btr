
/*страница*/
CREATE TABLE IF NOT EXISTS `page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL COMMENT 'id родителя',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'title',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT 'description',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT 'keywords',
  `redir` varchar(255) NOT NULL COMMENT 'для формирования ЧПУ',
  `text` text NOT NULL COMMENT 'анонс новости',
  `date` int(11) NOT NULL COMMENT 'дата в формате int',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_page`)
);
/*пользователи*/
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '' COMMENT 'логин',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT 'пароль',
  `name` varchar(255) NOT NULL COMMENT 'для формирования ЧПУ',
  `comment` text NOT NULL COMMENT 'Комментарий о себе',
  `date` int(11) NOT NULL COMMENT 'дата рождения',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `id_company` int(11) NOT NULL COMMENT 'привязка к компании',
  `balance` int(11) NOT NULL COMMENT 'баланс денег',  
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
);

/*учет баланса пользователя*/
CREATE TABLE IF NOT EXISTS `balance_accounting` (
  `id_user` int(11) NOT NULL COMMENT 'id позователя',
  `id_operation` int(11) NOT NULL COMMENT 'id операции',
  `balance_old` int(11) NOT NULL COMMENT 'старый баланс',
  `balance_new` int(11) NOT NULL COMMENT 'новый баланс',
  `date_create` int(11) NOT NULL COMMENT 'дата изменения'
);

/*типы операций*/
CREATE TABLE IF NOT EXISTS `operation` (
  `id_operation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_type_work`)
);

/*информация о компании*/
CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'Название',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT 'сайт',
  `phone` varchar(255) NOT NULL COMMENT 'телефон',
  `description` text NOT NULL COMMENT 'описание',
  `logo` varchar(255) NOT NULL DEFAULT '' COMMENT 'логотип',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `rating` int(11) NOT NULL COMMENT 'рейтинг',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_company`)
);
/*заказы*/
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `i_need_to` varchar(255) NOT NULL DEFAULT '' COMMENT 'мне нужно',
  `description` text NOT NULL COMMENT 'описание',
  `date_completion` varchar(255) NOT NULL DEFAULT '' COMMENT 'Дата исполнения заказа',
  `time_completion` varchar(255) NOT NULL DEFAULT '' COMMENT 'Время исполнения заказа',
  `id_city` int(11) NOT NULL COMMENT 'id города',
  `address` varchar(255) NOT NULL COMMENT 'Адрес',
  `metro` varchar(255) NOT NULL COMMENT 'Метро',
  `i_willing_to_pay` varchar(255) NOT NULL COMMENT 'Я готов заплатить',
  `price_buy_company` varchar(255) NOT NULL COMMENT 'стоимость заявки',
  `name` varchar(255) NOT NULL COMMENT 'Имя',
  `email` varchar(255) NOT NULL COMMENT 'email',
  `phone` varchar(255) NOT NULL COMMENT 'телефон',
  `id_type_work` int(11) NOT NULL COMMENT 'id типа работы',
  `url_referer` varchar(255) NOT NULL DEFAULT '' COMMENT 'страница с какой пришел',
  `date_create` int(11) NOT NULL COMMENT 'дата создания',
  `count_buy` int(11) NOT NULL COMMENT 'колличество купленных',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order`)
);
/*связь пользователя(компании) и заказа*/
CREATE TABLE IF NOT EXISTS `relations_user_order` (
  `id_user` int(11) NOT NULL COMMENT 'id позователя',
  `id_order` int(11) NOT NULL COMMENT 'id заказа',
  `buy_date` int(11) NOT NULL COMMENT 'дата покупки заказа'
);

/*типы работы*/
CREATE TABLE IF NOT EXISTS `type_work` (
  `id_type_work` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_type_work`)
);

/*город*/
CREATE TABLE IF NOT EXISTS `city` (
  `id_city` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'название',
  `description` text NOT NULL COMMENT 'описание',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_city`)
);

