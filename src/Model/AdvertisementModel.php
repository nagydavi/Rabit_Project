<?php
namespace Model;
class AdvertisementModel
{
    //would list out advertisements
    public static function getAllAdvertisements() {
        $statement = Connection::connect()->query('SELECT * FROM advertisements');
        $advertisements = $statement->fetchAll();
        $statement->closeCursor();
        return $advertisements;
    }
}