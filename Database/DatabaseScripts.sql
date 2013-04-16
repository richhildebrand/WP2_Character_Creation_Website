DROP TABLE IF EXISTS characters_stats, stats_definitions, characters;
DROP TABLE IF EXISTS races, classes, members;
     
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
   PRIMARY KEY (class)
)  ENGINE = INNODB;

CREATE TABLE races
(  race VARCHAR(35) NOT NULL,
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

INSERT INTO classes (class, hp_dice_count, skill_points) VALUES ('Paladin', 3, 2);
INSERT INTO classes (class, hp_dice_count, skill_points) VALUES ('Archer', 2, 3);
INSERT INTO classes (class, hp_dice_count, skill_points) VALUES ('Mage', 1, 4);

INSERT INTO races (race) VALUES ('Toblakai');
INSERT INTO races (race) VALUES ('Forkrul Assail');
INSERT INTO races (race) VALUES ('Jaghut');

INSERT INTO stats_definitions (stat) VALUES ('Strength');
INSERT INTO stats_definitions (stat) VALUES ('Dexterity');
INSERT INTO stats_definitions (stat) VALUES ('Constitution');