<?php

class CharacterRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $this->_dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function CreateNewCharacter($email, $name, $level, $class, $race)
    {
    	//currently these value are not in use during char creation
    	$alignment = 'dark';
    	$xp = 0;


        $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters(email, 
        																		   name,
    																		   	   class,
    																		   	   race,
    																		   	   alignment,
    																		   	   level,
    																		   	   xp)
                                                     		VALUES(:email,
                                                     		 	   :name,
                                                     		 	   :class,
                                                     		 	   :race,
                                                     		 	   :alignment,
                                                     		 	   :level,
                                                     		 	   :xp)');
        $preparedStatement->execute(array(':email' => $email,
        								  ':name' => $name,
        								  ':class' => $class,
        								  ':race' => $race,
        								  ':alignment' => $alignment,
        								  ':level' => $level,
        								  ':xp' => $xp));
    }
}
