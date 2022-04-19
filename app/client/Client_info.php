<?php
require_once('setting/db.php');

class Client_info
{
    public $login;
    public $adresse;
    public $commande;
    public $page;
    public $limite;
    public $debut;
    public $id_client;

    public function __construct()
    {
        if (!isset($_SESSION['id'])) {
            header("Location: connexion.php");
            exit;
        }

        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        } else {
            $this->page = 1;
        }

        $this->limite = 5;
        $this->debut = ($this->page - 1) * $this->limite;
    }

    public function clientInfos()
    {
        $id_utilisateurs = $_SESSION['id'];
        $req = "SELECT * FROM utilisateurs WHERE id = ?";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            $id_utilisateurs
        ));

        return $stmt;
    }

    // public function clientPanier()
    // {
    //     $id_utilisateurs = $_SESSION['id'];

    //     $req = "SELECT utilisateurs.id, quantite, titre, description, stock, prix, adr_facturation, adr_livraison, date_commande, nom_categorie, nom_region FROM panier INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id INNER JOIN produits ON id_produits = produits.id INNER jOIN commande ON id_commande = commande.id INNER JOIN categories ON id_categorie = categories.id INNER JOIN regions ON id_regions = regions.id WHERE utilisateurs.id = ?";
    //     $query = $this->db->prepare($req);
    //     $query->execute(array(
    //         $id_utilisateurs
    //     ));
    //     $stmt = $query->fetch();

    //     return $stmt;
    // }

    public function clientCommande()
    {
        $id_utilisateurs = $_SESSION['id'];
        $req = "SELECT adr_facturation,adr_livraison,date_commande,utilisateurs.id FROM utilisateurs INNER JOIN commande WHERE id_utilisateur = ?";
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            $id_utilisateurs
        ));
        // $stmt->fetch();
        return $stmt;
    }
}
