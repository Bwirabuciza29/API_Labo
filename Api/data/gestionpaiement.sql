CREATE DATABASE gestionpayement;

USE gestionpayement;

CREATE TABLE `annee_academ` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `anneeAc` VARCHAR(10) NOT NULL
  , PRIMARY KEY (`id`)
);

CREATE TABLE `compteur_id` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `sexe` VARCHAR(11) NOT NULL
  , PRIMARY KEY (`id`)
);


CREATE TABLE `etudiant` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `matricule` VARCHAR(50) DEFAULT NULL
  , `noms` VARCHAR(150) NOT NULL
  , `genre` VARCHAR(10) NOT NULL
  , `lieu` VARCHAR(50) NOT NULL
  , `datenaissance` DATE NOT NULL
  , `adresse` VARCHAR(100) NOT NULL
  , PRIMARY KEY (`id`)
  , UNIQUE KEY `matricule` (`matricule`)
);

CREATE TABLE `fixation_frais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `idOpt` INT(11) NOT NULL
  , `idProm` INT(11) NOT NULL
  , `idFrais` INT(11) NOT NULL
  , `idAnnee` INT(11) NOT NULL
  , `montant` INT(10) DEFAULT NULL
  , PRIMARY KEY (`id`, `idOpt`, `idProm`, `idFrais`, `idAnnee`)
  , KEY `idOpt` (`idOpt`)
  , KEY `idProm` (`idProm`)
  , KEY `idFrais` (`idFrais`)
  , KEY `idAnnee` (`idAnnee`)
  , CONSTRAINT `fixation_frais_ibfk_1` FOREIGN KEY (`idOpt`) REFERENCES `options_prom` (`id`)
  , CONSTRAINT `fixation_frais_ibfk_2` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`)
  , CONSTRAINT `fixation_frais_ibfk_3` FOREIGN KEY (`idFrais`) REFERENCES `frais` (`id`)
  , CONSTRAINT `fixation_frais_ibfk_4` FOREIGN KEY (`idAnnee`) REFERENCES `annee_academ` (`id`)
);

CREATE TABLE `frais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `desFrais` VARCHAR(100) NOT NULL
  , PRIMARY KEY (`id`)
);

CREATE TABLE `inscription` (
  `idOpt` INT(11) NOT NULL
  , `idProm` INT(11) NOT NULL
  , `idEt` INT(11) NOT NULL
  , `idAnnee` INT(11) NOT NULL
  , `desInscription` VARCHAR(255) DEFAULT NULL
  , PRIMARY KEY (`idOpt`, `idProm`, `idEt`, `idAnnee`)
  , KEY `idProm` (`idProm`)
  , KEY `idEt` (`idEt`)
  , KEY `idAnnee` (`idAnnee`)
  , CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`idOpt`) REFERENCES `options_prom` (`id`)
  , CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`)
  , CONSTRAINT `inscription_ibfk_3` FOREIGN KEY (`idEt`) REFERENCES `etudiant` (`id`)
  , CONSTRAINT `inscription_ibfk_4` FOREIGN KEY (`idAnnee`) REFERENCES `annee_academ` (`id`)
);

CREATE TABLE `options_prom` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `desOption` VARCHAR(100) NOT NULL
  , PRIMARY KEY (`id`)
);

CREATE TABLE `promotion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT
  , `desProm` VARCHAR(10) NOT NULL
  , PRIMARY KEY (`id`);