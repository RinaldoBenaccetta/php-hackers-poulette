<?php

namespace hackers_poulette\controller;

use PDO;

const TABLE = "User_issues";

class IssuesDatabase
{
    private static function connect(){

        $password = getenv('MYSQL_ROOT_PASSWORD');
        $database = getenv('MYSQL_DATABASE');
        $user = getenv('MYSQL_USER');
//        $host = "mysql";
//        $port = 3306;
        $host = getenv('MYSQL_HOST');
        $port = getenv('MYSQL_PORT');

        try {
            $strConnection = "mysql:host=".$host.";port=".$port.";dbname=".$database;
            $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $pdo = new PDO($strConnection, $user, $password, $arrExtraParam);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e) {
            $msg = 'PDO error in ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
            die($msg);
        }
    }

    public static function createIssue($data): void
    {
        $pdo = self::connect();

        if ($pdo) {
            $query = $pdo->prepare("INSERT INTO ".TABLE." (Name, Last_name, E_mail, Description, Status, Image_destination) VALUES (:name, :lastName, :eMail, :description, :status, :imageDestination);");
            $query->execute([
                ":name" => "$data[name]",
                ":lastName" => "$data[lastName]",
                ":eMail" => "$data[eMail]",
                ":description" => "$data[description]",
                ":status" => "$data[status]",
                ":imageDestination" => "$data[imageDestination]",
            ]);

            $pdo = NULL;
            $query = NULL;
        }
    }
}