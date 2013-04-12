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

    public function CreateNewCharacter($memberId, $name, $level, $class, $race)
    {
            $preparedStatement = $this->_dbConnection->prepare('INSERT INTO characters(email, password)
                                                         VALUES(:email, :password)');
            $preparedStatement->execute(array(':email' => $email,':password' => $password));
    }
}
