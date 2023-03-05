<?php

namespace Model;

class UserModel
{
    public function __construct(){}

    //would list out users
    public static function getAllUsers()
    {
        $db = Connection::connect();
        $statement = $db->query('SELECT * FROM users');
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }
}