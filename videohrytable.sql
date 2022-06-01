-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `videohrytable` (
  `nazev` char(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `vyvojar` char(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `zanr` char(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `cena` float NOT NULL,
  `datumVydani` date NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `videohrytable` (`nazev`, `vyvojar`, `zanr`, `cena`, `datumVydani`, `id`) VALUES
('Hollow Knight',	'team cherry',	'metrodvania',	14.99,	'2017-02-24',	1),
('Dying Light',	'Techland',	'akční, zombie',	20,	'2015-01-26',	2),
('Satisfactory',	' Coffee Stain Studios',	'logické, automatizace',	20,	'2020-06-08',	3),
('Ghostrunner',	' One More Level',	'akční, cyberpunk',	29,	'2020-10-27',	4),
('DOOM Eternal',	' id Software',	'akční, FPS, Nejlepší',	19,	'2020-03-20',	5),
('No Man\'s Sky',	'Hello Games',	'openworld, survival',	59,	'2016-08-12',	6),
('Borderlands 3',	' Gearbox Software',	'RPG, lootershooter',	59,	'2020-03-13',	7),
('Cyberpunk 2077',	'CD PROJEKT RED',	'RPG, FPS, cyberpunk',	59,	'2020-12-10',	8),
('Days Gone',	' Bend Studio',	'zombie, openworld',	49,	'2021-05-18',	9),
('The Elder Scrolls V: Skyrim Sp',	' Bethesda Game Studios',	'RPG, openworld, fantasy',	39,	'2016-10-28',	10);

-- 2022-01-19 20:03:50
