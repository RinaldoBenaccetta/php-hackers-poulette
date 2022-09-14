<?php

namespace hackers_poulette\controller;

use PDO;

print_r(getenv('MYSQL_ROOT_PASSWORD'));
print_r(getenv('MYSQL_DATABASE'));

const HOST_NAME	= "mysql";
const USER_NAME	= "root";
const TABLE = "User_issues";

class IssuesDatabase
{
    private static function connect(){

        $password = getenv('MYSQL_ROOT_PASSWORD');
        $database = getenv('MYSQL_DATABASE');

        try {
            $strConnection = "mysql:host=".HOST_NAME.";dbname=".$database;
            $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $pdo = new PDO($strConnection, USER_NAME, $password, $arrExtraParam); // Instanciate connexion
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo 'success';
            return $pdo;
        }
        catch(PDOException $e) {
            $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    }

    public static function createIssue($data): void
    {
        $pdo = self::connect();

        if ($pdo) {
            $query = $pdo->prepare("INSERT INTO ".TABLE." (Name, Last_name, E_mail, Description) VALUES (:name, :lastName, :eMail, :description);");
            $query->execute([
                ":name" => "$data[name]",
                ":lastName" => "$data[lastName]",
                ":eMail" => "$data[eMail]",
                ":description" => "$data[description]",
            ]);

            $pdo = NULL;
            $query = NULL;
        }
    }
}