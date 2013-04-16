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

CREATE TABLE characters_hp
(  character_id INT(10) NOT NULL,
   max_hp INT(10) NOT NULL,
   current_hp INT(10) NOT NULL,
   PRIMARY KEY (character_id),
   FOREIGN KEY (character_id) REFERENCES characters (id)
)  ENGINE = INNODB;


INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Paladin', 3, 2, 'http://www.d20srd.org/srd/classes/paladin.htm');
INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Ranger', 2, 3, 'http://www.d20srd.org/srd/classes/ranger.htm');
INSERT INTO classes (class, hp_dice_count, skill_points, url) 
   VALUES ('Monk', 1, 4, 'http://www.d20srd.org/srd/classes/monk.htm');

INSERT INTO races (race, url) 
   VALUES ('Human', 'http://www.d20srd.org/srd/races.htm#humans');
INSERT INTO races (race, url) 
   VALUES ('Dwarf', 'http://www.d20srd.org/srd/races.htm#dwarves');
INSERT INTO races (race, url) 
   VALUES ('Elve', 'http://www.d20srd.org/srd/races.htm#elves');

INSERT INTO stats_definitions (stat) VALUES ('Strength');
INSERT INTO stats_definitions (stat) VALUES ('Dexterity');
INSERT INTO stats_definitions (stat) VALUES ('Constitution');