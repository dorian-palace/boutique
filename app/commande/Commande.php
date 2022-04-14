<?php
require_once('./setting/db.php');

class Commande
{

    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function validationCommande($id_user)
    {
        if (isset($_POST['adr_fact']) && isset($_POST['adr_liv'])) {

            $facture = $_POST['adr_fact'];
            $livraison = $_POST['adr_liv'];
            $id_user = $_SESSION['id'];

            //INSERT INTO commande (adr_facturation, adr_livraison, id_utilisateur, date_commande) VALUES (?,?,?, NOW)
            $req = " INSERT INTO commande (adr_facturation, adr_livraison, id_utilisateur, date_commande, statut) VALUES ('$facture','$livraison','$id_user',NOW(), 0)";
            $stmt = $this->db->query($req);
            // $stmt->execute(array(
            //     $facture, $livraison, $id_user
            // ));
            return $stmt;
        }
    }
}
