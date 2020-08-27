<?php


class Connection
{

    public static function make($db)
    {
        try {
            return new PDO(
                $db['connection'] . ';dbname=' . $db['name'],
                $db['username'],
                $db['password'],
                $db['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
