<?php

class Db_connect{

        private $db;

        public function __construct()


        {

        try{

            $username = "root";
            $password = "root";

             $this->db= new PDO('mysql:host=localhost;dbname=boutique',$username,$password);
             $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }catch(PDOException $e){

            echo 'erreur : '. $e->getMessage();

        }
    }

    public function return_connect(){

        return  $this->db;
    }

    public function query($sql){

        $req = $this->db->prepare($sql);
        $req->execute();

        return $req->fetchAll();

    }

}

