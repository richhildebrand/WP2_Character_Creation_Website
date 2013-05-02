<?php
require_once("../Database/DatabaseConfig_old.php");

class DbConnectionFactory
{
	public function CreateDbConnection()
	{
        $dbConnection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
	}
}