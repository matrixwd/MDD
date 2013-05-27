<?php

class DB
{
    public function __construct(){
        //Try creating a new PDO connection to DB, else var_dump any errors.
        try
        {
            $dsn = "mysql:host=127.0.0.1;port=8889;dbname=mdd";
            $user = "root";
            $pass ="root";

            $this->db = new PDO($dsn, $user, $pass);
            // do something that can go wrong
        }
        catch (PDOException $e)
        {
            //throw new Exception( 'Something really gone wrong', 0, $e);
            var_dump($e);
        }
    }//__construct
}