DROP TABLE IF EXISTS members;
     
CREATE TABLE members
(  id INT(10) NOT NULL AUTO_INCREMENT, 
   email VARCHAR(35) NOT NULL,
   PASSWORD VARCHAR(250),
   firstname VARCHAR(15),
   lastname VARCHAR(25),   
   PRIMARY KEY (emaild),
)  ENGINE = INNODB;

DELETE FROM members;