<?php

abstract class Connection {

    private static $conn;

    public static function getConn() {

        if (empty(self::$conn)) {

            self::$conn = new PDO('mysql:host=localhost;dbname=blog;', 'root', 'root');

        } 

        return self::$conn;
    }
}