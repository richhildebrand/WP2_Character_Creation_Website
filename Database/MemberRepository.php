<?php
include_once("../Models/MemberProfile.php");
include_once("../Factories/DbConnectionFactory.php");

class MemberRepository
{
    private $_dbConnection;

    public function __construct()
    {
        $dbFactory = new DbConnectionFactory();
        $this->_dbConnection = $dbFactory->CreateDbConnection();
    }

    public function InsertNewUser($email, $password)
    {
        try
        {
            $preparedStatement = $this->_dbConnection->prepare('INSERT INTO members(email, password)
                                                         VALUES(:email, :password)');
            $preparedStatement->execute(array(':email' => $email,':password' => $password));
            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    public function UpdateUserPassword($email, $password)
    {
        try
        {
            $preparedStatement = $this->_dbConnection->prepare('UPDATE members SET password = :password WHERE email = :email');
            $preparedStatement->execute(array(':email' => $email,':password' => $password));
            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    public function GetUserPasswordHash($email)
    {
        $preparedStatement = $this->_dbConnection->prepare('SELECT password FROM members WHERE email = :email');
        $preparedStatement->execute(array(':email' => $email));

        $result  = $preparedStatement -> fetch();
        return $result['password'];
    }

    public function UserExists($email)
    {
        try
        {
            $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM members WHERE email = :email');
            $preparedStatement->execute(array(':email' => $email));

            //sizeof($preparedStatement) is one with zero or more results
            $rowsFound = 0;
            foreach ($preparedStatement as $row)
            {
                $rowsFound += 1;
            }         
            return $rowsFound > 0;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return true;
        }
    }

    public function GetUserProfile($email)
    {

        $preparedStatement = $this->_dbConnection->prepare('SELECT * FROM members WHERE email = :email');
        $preparedStatement->execute(array(':email' => $email));
        
        $result = $preparedStatement->fetch();

        return new UserProfile($result);
    }

    public function SetUserProfile($userProfile, $email)
    {
        $preparedStatement = $this->_dbConnection->prepare('UPDATE members SET firstname = :firstname,
                                                                                lastname = :lastname
                                                                            WHERE email = :email');
        $preparedStatement->execute(array(':firstname' => $userProfile['firstname'],
                                          ':lastname' => $userProfile['lastname'],
                                          ':email' => $email
                                          ));
    }
}