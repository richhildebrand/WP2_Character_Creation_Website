DROP TABLE IF EXISTS class_level_benefits;
DROP TABLE IF EXISTS characters_hp, characters_stats, stats_definitions;
DROP TABLE IF EXISTS characters, races, classes, members;

     
CREATE TABLE members
(  email VARCHAR(35) NOT NULL,
   password VARCHAR(250),
   firstname VARCHAR(15),
   lastname VARCHAR(25),   
   PRIMARY KEY (email)
)  ENGINE = INNODB;

CREATE TABLE classes
(  class VARCHAR(35) NOT NULL,
   hp_dice_count INT(10) NOT NULL,
   skill_points INT(10) NOT NULL,
   url VARCHAR(250),
   PRIMARY KEY (class)
)  ENGINE = INNODB;

CREATE TABLE races
(  race VARCHAR(35) NOT NULL,
   url VARCHAR(250),
   PRIMARY KEY (race)
)  ENGINE = INNODB;

CREATE TABLE stats_definitions
(  stat VARCHAR(35) NOT NULL,
   PRIMARY KEY (stat)
)  ENGINE = INNODB;

CREATE TABLE characters
(  id INT(10) NOT NULL AUTO_INCREMENT, 
   email VARCHAR(35) NOT NULL,
   name VARCHAR(35) NOT NULL,
   class VARCHAR(250) NOT NULL,
   race VARCHAR(250) NOT NULL,
   alignment VARCHAR(250) NOT NULL,   
   level INT(10) NOT NULL,
   xp INT(10) NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (email) REFERENCES members (email),
   FOREIGN KEY (class) REFERENCES classes (class),
   FOREIGN KEY (race) REFERENCES races (race)
)  ENGINE = INNODB;

CREATE TABLE characters_stats
(  character_id INT(10) NOT NULL,
   stat VARCHAR(35) NOT NULL,
   value INT(10) NOT NULL,
   PRIMARY KEY (character_id, stat),
   FOREIGN KEY (character_id) REFERENCES characters (id),
   FOREIGN KEY (stat) REFERENCES stats_definitions (stat)
)  ENGINE = INNODB;

CREATE TABLE class_level_benefits
(
	class VARCHAR(35) NOT NULL,
	c_level TINYINT NOT NULL,
	bab TINYINT NOT NULL,
	fort TINYINT NOT NULL,
	reflex TINYINT NOT NULL,
	will TINYINT NOT NULL,
	FOREIGN KEY (class) REFERENCES classes (class)

) ENGINE = INNODB;

CREATE TABLE characters_hp
(  character_id INT(10) NOT NULL,
   max_hp INT(10) NOT NULL,
   current_hp INT(10) NOT NULL,
   PRIMARY KEY (character_id),
   FOREIGN KEY (character_id) REFERENCES characters (id)
)  ENGINE = INNODB;


INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Paladin', 10, 2, 'http://www.d20srd.org/srd/classes/paladin.htm');
INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Ranger', 8, 3, 'http://www.d20srd.org/srd/classes/ranger.htm');
INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Monk', 8, 4, 'http://www.d20srd.org/srd/classes/monk.htm');

INSERT INTO races (race, url) 
   VALUES ('Human', 'http://www.d20srd.org/srd/races.htm#humans');
INSERT INTO races (race, url) 
   VALUES ('Dwarf', 'http://www.d20srd.org/srd/races.htm#dwarves');
INSERT INTO races (race, url) 
   VALUES ('Elf', 'http://www.d20srd.org/srd/races.htm#elves');

INSERT INTO stats_definitions (stat) VALUES ('Strength');
INSERT INTO stats_definitions (stat) VALUES ('Dexterity');
INSERT INTO stats_definitions (stat) VALUES ('Constitution');

INSERT INTO class_level_benefits VALUES ('Monk', 1, 0, 2, 2, 2);
INSERT INTO class_level_benefits VALUES ('Monk', 2, 1, 3, 3, 3);
INSERT INTO class_level_benefits VALUES ('Monk', 3, 2, 3, 3, 3);
INSERT INTO class_level_benefits VALUES ('Monk', 4, 3, 4, 4, 4);
INSERT INTO class_level_benefits VALUES ('Monk', 5, 3, 4, 4, 4);
INSERT INTO class_level_benefits VALUES ('Monk', 6, 4, 5, 5, 5);
INSERT INTO class_level_benefits VALUES ('Monk', 7, 5, 5, 5, 5);
INSERT INTO class_level_benefits VALUES ('Monk', 8, 6, 6, 6, 6);
INSERT INTO class_level_benefits VALUES ('Monk', 9, 6, 6, 6, 6);
INSERT INTO class_level_benefits VALUES ('Monk', 10, 7, 7, 7, 7);
INSERT INTO class_level_benefits VALUES ('Monk', 11, 8, 7, 7, 7);
INSERT INTO class_level_benefits VALUES ('Monk', 12, 9, 8, 8, 8);
INSERT INTO class_level_benefits VALUES ('Monk', 13, 9, 8, 8, 8);
INSERT INTO class_level_benefits VALUES ('Monk', 14, 10, 9, 9, 9);
INSERT INTO class_level_benefits VALUES ('Monk', 15, 11, 9, 9, 9);
INSERT INTO class_level_benefits VALUES ('Monk', 16, 12, 10, 10, 10);
INSERT INTO class_level_benefits VALUES ('Monk', 17, 12, 10, 10, 10);
INSERT INTO class_level_benefits VALUES ('Monk', 18, 13, 11, 11, 11);
INSERT INTO class_level_benefits VALUES ('Monk', 19, 14, 11, 11, 11);
INSERT INTO class_level_benefits VALUES ('Monk', 20, 15, 12, 12, 12);

INSERT INTO class_level_benefits VALUES ('Paladin', 1, 1, 2, 0, 0);
INSERT INTO class_level_benefits VALUES ('Paladin', 2, 2, 3, 0, 0);
INSERT INTO class_level_benefits VALUES ('Paladin', 3, 3, 3, 1, 1);
INSERT INTO class_level_benefits VALUES ('Paladin', 4, 4, 4, 1, 1);
INSERT INTO class_level_benefits VALUES ('Paladin', 5, 5, 4, 1, 1);
INSERT INTO class_level_benefits VALUES ('Paladin', 6, 6, 5, 2, 2);
INSERT INTO class_level_benefits VALUES ('Paladin', 7, 7, 5, 2, 2);
INSERT INTO class_level_benefits VALUES ('Paladin', 8, 8, 6, 2, 2);
INSERT INTO class_level_benefits VALUES ('Paladin', 9, 9, 6, 3, 3);
INSERT INTO class_level_benefits VALUES ('Paladin', 10, 10, 7, 3, 3);
INSERT INTO class_level_benefits VALUES ('Paladin', 11, 11, 7, 3, 3);
INSERT INTO class_level_benefits VALUES ('Paladin', 12, 12, 8, 4, 4);
INSERT INTO class_level_benefits VALUES ('Paladin', 13, 13, 8, 4, 4);
INSERT INTO class_level_benefits VALUES ('Paladin', 14, 14, 9, 4, 4);
INSERT INTO class_level_benefits VALUES ('Paladin', 15, 15, 9, 5, 5);
INSERT INTO class_level_benefits VALUES ('Paladin', 16, 16, 10, 5, 5);
INSERT INTO class_level_benefits VALUES ('Paladin', 17, 17, 10, 5, 5);
INSERT INTO class_level_benefits VALUES ('Paladin', 18, 18, 11, 6, 6);
INSERT INTO class_level_benefits VALUES ('Paladin', 19, 19, 11, 6, 6);
INSERT INTO class_level_benefits VALUES ('Paladin', 20, 20, 12, 6, 6);

INSERT INTO class_level_benefits VALUES ('Ranger', 1, 1, 2, 2, 0);
INSERT INTO class_level_benefits VALUES ('Ranger', 2, 2, 3, 3, 0);
INSERT INTO class_level_benefits VALUES ('Ranger', 3, 3, 3, 3, 1);
INSERT INTO class_level_benefits VALUES ('Ranger', 4, 4, 4, 4, 1);
INSERT INTO class_level_benefits VALUES ('Ranger', 5, 5, 4, 4, 1);
INSERT INTO class_level_benefits VALUES ('Ranger', 6, 6, 5, 5, 2);
INSERT INTO class_level_benefits VALUES ('Ranger', 7, 7, 5, 5, 2);
INSERT INTO class_level_benefits VALUES ('Ranger', 8, 8, 6, 6, 2);
INSERT INTO class_level_benefits VALUES ('Ranger', 9, 9, 6, 6, 3);
INSERT INTO class_level_benefits VALUES ('Ranger', 10, 10, 7, 7, 3);
INSERT INTO class_level_benefits VALUES ('Ranger', 11, 11, 7, 7, 3);
INSERT INTO class_level_benefits VALUES ('Ranger', 12, 12, 8, 8, 4);
INSERT INTO class_level_benefits VALUES ('Ranger', 13, 13, 8, 8, 4);
INSERT INTO class_level_benefits VALUES ('Ranger', 14, 14, 9, 9, 4);
INSERT INTO class_level_benefits VALUES ('Ranger', 15, 15, 9, 9, 5);
INSERT INTO class_level_benefits VALUES ('Ranger', 16, 16, 10, 10, 5);
INSERT INTO class_level_benefits VALUES ('Ranger', 17, 17, 10, 10, 5);
INSERT INTO class_level_benefits VALUES ('Ranger', 18, 18, 11, 11, 6);
INSERT INTO class_level_benefits VALUES ('Ranger', 19, 19, 11, 11, 6);
INSERT INTO class_level_benefits VALUES ('Ranger', 20, 20, 12, 12, 6);