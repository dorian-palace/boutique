<?php 

require_once '../setting/db.php';

class Barre_recherche{

    public function __construct()
    
    {
        $this->db = New Db_connect();
        $this->db = $this->db->return_connect();
        
    }

    public function recherche(){

        if(isset($_GET['q']) AND !empty($_GET['q'])) {
            $q = htmlspecialchars($_GET['q']);
        
            $articles = $this->db->prepare('SELECT titre FROM articles WHERE CONCAT(titre, contenu)LIKE "%'.$q.'%" ORDER BY id DESC');
            $articles->execute();

            $articles->rowCount();

                if($articles->rowCount() ==  0) {
                    $articles = $this->db->prepare('SELECT titre FROM articles WHERE CONCAT(titre, contenu) LIKE "%'.$q.'%" ORDER BY id DESC');
                    $articles->execute();


                }

                    return $articles;
            
            }
    }

}