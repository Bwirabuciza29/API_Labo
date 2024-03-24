CREATE DATABASE IF NOT EXISTS `gestionpaiement` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE TABLE IF NOT EXISTS `compteur_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) DEFAULT NULL,
  `noms` varchar(150) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `datenaissance` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricule` (`matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `fixation_frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOpt` int(11) DEFAULT NULL,
  `idProm` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `annee` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fa` (`idOpt`),
  KEY `fq` (`idProm`),
  CONSTRAINT `fa` FOREIGN KEY (`idOpt`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fq` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `frais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(200) NOT NULL,
  `idFix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fz` (`idFix`),
  CONSTRAINT `fz` FOREIGN KEY (`idFix`) REFERENCES `fixation_frais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idOpt` int(11) DEFAULT NULL,
  `idProm` int(11) DEFAULT NULL,
  `idEt` int(11) DEFAULT NULL,
  `annee` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fh` (`idOpt`),
  KEY `fj` (`idProm`),
  KEY `fd` (`idEt`),
  CONSTRAINT `fd` FOREIGN KEY (`idEt`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fh` FOREIGN KEY (`idOpt`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fj` FOREIGN KEY (`idProm`) REFERENCES `promotion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEt` int(11) DEFAULT NULL,
  `desoption` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ft` (`idEt`),
  CONSTRAINT `ft` FOREIGN KEY (`idEt`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEt` int(11) DEFAULT NULL,
  `despromotion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk` (`idEt`),
  CONSTRAINT `fk` FOREIGN KEY (`idEt`) REFERENCES `etudiant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
