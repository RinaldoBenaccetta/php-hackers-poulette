<?php

namespace hackers_poulette\controller;

use PDO;

const HOST_NAME	= "mysql";
const DB_NAME	= "database";
const USER_NAME	= "root";
const PASSWORD	= "<root-password>";
const TABLE = "User_issues";

class IssuesDatabase
{
    private static function connect(){
        try {
            $strConnection = "mysql:host=".HOST_NAME.";dbname=".DB_NAME;
            $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $pdo = new PDO($strConnection, USER_NAME, PASSWORD, $arrExtraParam); // Instanciate connexion
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