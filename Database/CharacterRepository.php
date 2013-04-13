<?php
require_once('../Database/Database.php');

class CharacterRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $this->_dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $this->_dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetMemberCharacters($email)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM characters WHERE email = :email');
        $preparedStatement->execute(array(':email' => $email));
        
        return $preparedStatement->fetchAll();
    }

    public function GetCharacter($id)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM characters WHERE id = :id');
        $preparedStatement->execute(array(':id' => $id));
        
        return $preparedStatement->fetch();
    }

    public function CreateNewCharacter($email, $name, $level, $class, $race, $alignment)
    {
        // xp is probably calculated from level
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
        
        return $this->_dbConnection->lastInsertId();
    }
}
