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
        $this->id_client = $_SESSION['id'];
    }

    public function clientAdresse()
    {

        $req = "SELECT * FROM utilisateurs INNER JOIN adresse_livraison ON utilisateurs.id = adresse_livraison.id_utilisateur LIMIT :limite OFFSET :debut";
        $stmt = $this->db->prepare($req);
        $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }

    public function clientPanier()
    {
        $req = "SELECT * FROM utilisateurs INNER JOIN panier WHERE utilisateurs.id = panier.id_utilisateur LIMIT :limite OFFSET :debut";
        $stmt = $this->db->prepare($req);
        $stmt->bindValue('limite', $this->limite, PDO::PARAM_INT);
        $stmt->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt;
    }
}
