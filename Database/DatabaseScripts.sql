DROP TABLE IF EXISTS characters, members;
     
CREATE TABLE members
(  id INT(10) NOT NULL AUTO_INCREMENT, 
   email VARCHAR(35) NOT NULL,
   PASSWORD VARCHAR(250),
   firstname VARCHAR(15),
   lastname VARCHAR(25),   
   PRIMARY KEY (id)
)  ENGINE = INNODB;

CREATE TABLE characters
(  id INT(10) NOT NULL AUTO_INCREMENT, 
   member_id INT(10),
   name VARCHAR(35) NOT NULL,
   class VARCHAR(250) NOT NULL,
   race VARCHAR(250) NOT NULL,
   alignment VARCHAR(250) NOT NULL,   
   level INT(10) NOT NULL,
   xp INT(10) NOT NULL,
   PRIMARY KEY (id),
   FOREIGN KEY (member_id) REFERENCES members (id)
)  ENGINE = INNODB;

DELETE FROM characters;
DELETE FROM members;