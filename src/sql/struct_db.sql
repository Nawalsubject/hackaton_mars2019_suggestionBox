CREATE DATABASE "justboxit";

DROP TABLE IF EXISTS `justboxit`.`idea`;
CREATE TABLE `justboxit`.`idea`
(
  `ididea`      INT          NOT NULL AUTO_INCREMENT,
  `firstname`   VARCHAR(255) NOT NULL,
  `lastname`    VARCHAR(255) NOT NULL,
  `title`    VARCHAR(45) NOT NULL,
  `message` VARCHAR(140) NOT NULL,
  `date`    DATETIME NOT NULL,
  `categoryid`  INT          NOT NULL,
  PRIMARY KEY (`ididea`)
);

DROP TABLE IF EXISTS `justboxit`.`category`;
CREATE TABLE `justboxit`.`category`
(
  `idcategory` INT          NOT NULL AUTO_INCREMENT,
  `category`   VARCHAR(100) NOT NULL,
  `catdescr`   VARCHAR(255) NULL,
  PRIMARY KEY (`idcategory`)
);

DROP TABLE IF EXISTS `justboxit`.`eval`;
CREATE TABLE `justboxit`.`eval`
(
  `ideval`  INT      NOT NULL AUTO_INCREMENT,
  `eval`    TINYINT  NULL,
  `comment` TEXT     NULL,
  `date`    DATETIME NOT NULL,
  `ideaid` INT NOT NULL,
  PRIMARY KEY (`ideval`)
);

ALTER TABLE `justboxit`.`idea`
  ADD INDEX `fk_idea_1_idx` (`categoryid` ASC);
ALTER TABLE `justboxit`.`idea`
  ADD CONSTRAINT `fk_idea_1`
    FOREIGN KEY (`categoryid`)
      REFERENCES `justboxit`.`category` (`idcategory`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;

ALTER TABLE `justboxit`.`eval`
  ADD INDEX `fk_eval_idea_idx` (`ideaid` ASC);
ALTER TABLE `justboxit`.`eval`
  ADD CONSTRAINT `fk_eval_idea`
    FOREIGN KEY (`ideaid`)
      REFERENCES `justboxit`.`idea` (`ididea`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;


INSERT INTO `justboxit`.`category` (`category`, `catdescr`) VALUES ('neuve', 'Jamais les mots ne manquent aux idées ; ce sont les idées qui manquent aux mots. (P. Valéry)');
INSERT INTO `justboxit`.`category` (`category`, `catdescr`) VALUES ('évolutive', 'La difficulté n’est pas de comprendre les idées nouvelles, mais d’échapper aux idées anciennes. (J.M. Keynes)');
INSERT INTO `justboxit`.`category` (`category`, `catdescr`) VALUES ('insolite', 'Une idée qui n’est pas dangereuse ne vaut pas la peine d’être appelée idée. (E. Hubbard)');


