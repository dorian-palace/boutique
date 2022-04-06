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
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $this->page = (int) strip_tags($_GET['page']); //strip_tags — Supprime les balises HTML et PHP d'une chaîne
        } else {
            $this->page = 1;
        }

        $this->limite = 5;
        $this->debut = ($this->page - 1) * $this->limite;
        // $this->id_client = $_SESSION['id'];
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

    public function clientPanier()
    {
        $req = "SELECT * FROM utilisateurs INNER JOIN panier WHERE utilisateurs.id = panier.id_utilisateur";
        $query = $this->db->prepare($req);
        $query->execute();
        $stmt = $query->fetch();

        return $stmt;
    }

    public function clientCommande()
    {
        $id_utilisateurs = $_SESSION['id'];
        $req = "SELECT * FROM commande INNER JOIN utilisateurs WHERE id = ?";
        // SELECT adr_facturation,adr_livraison,date_commande,statut FROM commande INNER JOIN utilisateurs WHERE utilisateurs.id = commande.id_utilisateur
        $stmt = $this->db->prepare($req);
        $stmt->execute(array(
            $id_utilisateurs    
        ));
        // $stmt->fetch();
        return $stmt;
    }
}
