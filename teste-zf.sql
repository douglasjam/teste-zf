
-- Rode o script no banco MySQL

CREATE SCHEMA IF NOT EXISTS `UaiTI` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `UaiTI` ;

CREATE  TABLE IF NOT EXISTS `UaiTI`.`books` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `title` VARCHAR(100) NOT NULL ,
  `author` VARCHAR(50) NOT NULL ,
  `publisher` VARCHAR(100) NULL ,
  `isbn` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `isbn_UNIQUE` (`isbn` ASC) )
ENGINE = InnoDB;


INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("0345342968", "Fahrenheit 451", "R. Bradbury", "Del Rey");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("0048231398", "The Silmarillion", "J.R.R. Tolkien", "G. Allen & Unwin");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("0451524934", "1984", "G. Orwell", "Signet");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("031219126X", "Frankenstein", "M. Shelley", "Bedford");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("0312863551", "The Moon Is a Harsh Mistress", "R. A. Heinlein", "Orb");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("8535904174", "Budapeste", "Chico Buarque", "Companhia das Letras");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("0316769533", "The Catcher in the Rye", "J. D. Salinger", "Little Brown & Co");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("8528607593", "O Velho e O Mar", "Ernest Hemingway", "Bertrand Brasil");
INSERT INTO `UaiTI`.`books` (`isbn`, `title`, `author`, `publisher`) VALUES ("9788525420", "O Natal de Poirot", "Agatha Christie", "L&PM");

