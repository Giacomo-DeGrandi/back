<?php

namespace Application\Models\Database;


use PDO;

Abstract Class Database{

    public function connect(): PDO
    {

        /*
        $server="localhost:3306";
        $username="root";
        $password="";
        $database="";*/

        $server="localhost";
        $username="root";
        $password="";
        $database="j8";

        $dsn = "mysql:host=$server;dbname=$database;charset=UTF8";
        $conn = new PDO($dsn, $username, $password);
        return $conn;
    }

    /*
    public function selectQuery($sql, $p = null){
        if ($p === null) {
            $r = $this->connect()->query($sql);
        } else {
            $r = $this->connect()->prepare($sql);
            $r -> execute($p);
        }
        return $r;
    }
    */

}
