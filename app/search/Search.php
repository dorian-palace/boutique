<?php
require_once('../setting/db.php');
class Search
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function Search()
    {
        //SELECT titre, description, nom_categorie, commentaire FROM produits JOIN categories JOIN avis WHERE titre LIKE ? OR description LIKE ? OR nom_categorie LIKE ? OR commentaire LIKE ? OR prix LIKE ?
        // supprime la page BARRE.PHP finit l'INNER JOIN pour la barre de recherche puis implémente la dans le syle bootstrap du header

        //UTILISE LEFT JOIN 

        $req = 'SELECT * FROM produits INNER JOIN categories ON categorie_id = id.categorie INNER JOIN avis id_produits = id.produits WHERE titre LIKE ? OR description LIKE ? OR nom_categorie LIKE ? OR commentaire LIKE ? OR prix LIKE ? ';
        $stmt = $this->db->prepare($req);
        $stmt->execute(["%" . $_POST["search"] . "%", "%" . $_POST["search"] . "%"]);

        // $results = $stmt->fetchAll();
        // var_dump($results);
        // if(isset($results['id'])){

        // }
        return $stmt;
    }
}
