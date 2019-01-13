CREATE TABLE `selto149_php`.`profile` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `site` VARCHAR(45) NOT NULL,
  `post` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));


INSERT INTO `selto149_php`.`profile` (`name`, `email`, `phone`, `site`, `post`) VALUES ('Олег', 'seltor@mail.ru', '+7(996)448-90-60', 'jktu.ru', 'Web Dev');


CREATE TABLE `selto149_php`.`languages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `level` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `selto149_php`.`educations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `speciality` VARCHAR(45) NOT NULL,
  `yearstart` INT NOT NULL,
  `yearend` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `selto149_php`.`interests` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `selto149_php`.`projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `link` VARCHAR(45) NOT NULL,
  `about` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

CREATE TABLE `selto149_php`.`skills` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `level` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

-- ALTER TABLE `selto149_php`.`skill` RENAME TO  `selto149_php`.`skills` ;


CREATE TABLE `selto149_php`.`experiences` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `post` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `company` VARCHAR(45) NOT NULL,
  `about` VARCHAR(100) NOT NULL,
  `yearstart` INT NOT NULL,
  `yearend` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

-- ALTER TABLE `selto149_php`.`experiences` CHANGE COLUMN `about` `about` VARCHAR(100) NOT NULL ;


INSERT INTO `selto149_php`.`languages` (`id`, `title`, `level`) VALUES (NULL, 'Русский', 'Родной'), (NULL, 'Английский', 'Начинающий');

INSERT INTO `selto149_php`.`skill` (`id`, `title`, `level`) VALUES (NULL, 'PHP', '70'), (NULL, 'HTML', '90'), (NULL, 'CSS', '80'), (NULL, 'JS', '50');

INSERT INTO `selto149_php`.`educations`
(`title`,`speciality`,`yearstart`,`yearend`)
VALUES
('Школа','Школьник',2001,2011),
('Университет','Студент',2011,2016),
('Академия','Студент',2016,2018);

INSERT INTO `selto149_php`.`experiences`
(
`title`,
`post`,
`city`,
`company`,
`about`,
`yearstart`,
`yearend`)
VALUES
('Место работы №1','Должность №1','Город','Компания11',
    'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
    '1950','2000'),
('Место работы №2','Должность №2','Город','Компания12',
    'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
    '2000','2010'),
('Место работы №3','Должность №3','Город','Компания13',
    'Describe your role here lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
    '2010','2018');


INSERT INTO `selto149_php`.`projects` (`title`, `link`, `about`) VALUES
('Проект №1', 'Jktu.ru', 'Мой сайт'),
('Микрозелень', 'myumo.jktu.ru', 'Микрозелень'),
('Folio', 'folio.jktu.ru', 'Портфолио для фотографа');

INSERT INTO `selto149_php`.`interests` (`title`) VALUES ('Санки'),('Охота'),('Вертолеты');


CREATE TABLE `selto149_php`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(250) NOT NULL,
  `ip` VARCHAR(20) NULL,
  PRIMARY KEY (`id`));



CREATE TABLE selto149_php.login (
  id int(11) NOT NULL AUTO_INCREMENT,
  user varchar(20) NOT NULL,
  pass varchar(40) NOT NULL,
  email varchar(50) NOT NULL,
  role varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 7,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;


CREATE TABLE `selto149_php`.`images` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `ext` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`));


ALTER TABLE `selto149_php`.`images` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT
;

