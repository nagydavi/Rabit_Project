<?php

namespace Model;
use PDO;
use PDOException;

class Connection
{
    public function __construct()
    {

    }
    //Connect to database
    public static function connect()
    {

        try {
            $db = new PDO('mysql:host=localhost;dbname=rabit', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Database Error:' . $e->getMessage();
            exit();
        }
    }
}