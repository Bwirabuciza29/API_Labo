CREATE DATABASE gestionpayement;

USE gestionpayement;

CREATE TABLE `annee_academ` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `anneeAc` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `compteur_id` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sexe` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `compteur_id` (`id`, `sexe`) VALUES
(1, 'M'),
(2, 'M'),
(3, 'M'),
(4, 'M'),
(5, 'M'),
(6, 'M'),
(7, 'F'),
(8, 'M'),
(9, 'M'),
(10, 'F'),
(11, 'M'),
(12, 'M'),
(13, 'M'),
(14, 'M'),
(15, 'M'),
(16, 'M'),
(17, 'M');

CREATE TABLE `etudiant` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `matricule` VARCHAR(50) DEFAULT NULL,
  `noms` VARCHAR(150) NOT NULL,
  `genre` VARCHAR(10) NOT NULL,
  `lieu` VARCHAR(50) NOT NULL,
  `datenaissance` DATE NOT NULL,
  `adresse` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `etudiant` (`id`, `matricule`, `noms`, `genre`, `lieu`, `datenaissance`, `adresse`) VALUES
(15, 'I00SO0C00G00MF7', 'Linda Waza Florence', 'F', 'Goma', '2024-03-13', 'goma'),
(16, 'I00SO0C00G00MM8', 'Bwirabuciza Blondy Achille', 'M', 'bukavu', '2024-03-05', 'Himbi'),
(21, 'I00SO0C00G00MM13', 'Paul Bebukya', 'M', 'Goma', '2024-03-20', 'Quartier Mabanga Sud, 35 Ruyange'),
(22, 'I00SO0C00G00MM14', 'Heritier djafari', 'M', 'goma', '2024-03-14', 'goma');

CREATE TABLE `fixation_frais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idOpt` INT(11) NOT NULL,
  `idProm` INT(11) NOT NULL,
  `idFrais` INT(11) NOT NULL,
  `idAnnee` INT(11) NOT NULL,
  `montant` INT(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`idOpt`,`idProm`,`idFrais`,`idAnnee`),
  KEY `idOpt` (`idOpt`),
  KEY `idProm` (`idProm`),
  KEY `idFrais` (`idFrais`),
  KEY `idAnnee` (`idAnnee`),
  CONSTRAINT `fixation_frais_ibfk_1` FOREIGN KEY (`idOpt`) REFERENCES `options_prom` (`id`),
  CONSTRAINT `fixation_frais_ibfk_2` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`),
  CONSTRAINT `fixation_frais_ibfk_3` FOREIGN KEY (`idFrais`) REFERENCES `frais` (`id`),
  CONSTRAINT `fixation_frais_ibfk_4` FOREIGN KEY (`idAnnee`) REFERENCES `annee_academ` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `frais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desFrais` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `inscription` (
  `idOpt` INT(11) NOT NULL,
  `idProm` INT(11) NOT NULL,
  `idEt` INT(11) NOT NULL,
  `idAnnee` INT(11) NOT NULL,
  `desInscription` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`idOpt`,`idProm`,`idEt`,`idAnnee`),
  KEY `idProm` (`idProm`),
  KEY `idEt` (`idEt`),
  KEY `idAnnee` (`idAnnee`),
  CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idOpt`) REFERENCES `options_prom` (`id`),
  CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`),
  CONSTRAINT `inscription_ibfk_3` FOREIGN KEY (`idEt`) REFERENCES `etudiant` (`id`),
  CONSTRAINT `inscription_ibfk_4` FOREIGN KEY (`idAnnee`) REFERENCES `annee_academ` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `options_prom` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desOption` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `promotion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `desProm` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
