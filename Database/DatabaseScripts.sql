DROP TABLE IF EXISTS races, classes, characters, members;
     
CREATE TABLE members
(  email VARCHAR(35) NOT NULL,
   PASSWORD VARCHAR(250),
   firstname VARCHAR(15),
   lastname VARCHAR(25),   
   PRIMARY KEY (email)
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
   FOREIGN KEY (email) REFERENCES members (email)
)  ENGINE = INNODB;

CREATE TABLE classes
(  name VARCHAR(35) NOT NULL,
   hp_dice_count INT(10) NOT NULL,
   skill_points INT(10) NOT NULL,
   PRIMARY KEY (name)
)  ENGINE = INNODB;

CREATE TABLE races
(  name VARCHAR(35) NOT NULL,
   PRIMARY KEY (name)
)  ENGINE = INNODB;

DELETE FROM races;
DELETE FROM classes;
DELETE FROM characters;
DELETE FROM members;

INSERT INTO classes (name, hp_dice_count, skill_points) VALUES ('Paladin', 3, 2);
INSERT INTO classes (name, hp_dice_count, skill_points) VALUES ('Archer', 2, 3);
INSERT INTO classes (name, hp_dice_count, skill_points) VALUES ('Mage', 1, 4);

INSERT INTO races (name) VALUES ('Toblakai');
INSERT INTO races (name) VALUES ('Forkrul Assail');
INSERT INTO races (name) VALUES ('Jaghut');