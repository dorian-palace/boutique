<?php
require_once('setting/db.php');
require_once('User.php');
class Administrateur
{

    public $new_login;
    public $new_email;
    public $new_id_droits;
    public $limite;
    public $debut;


    public function __construct()
    {
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
        $new_login = $this->new_login;
        $new_email = $this->new_email;
        $new_id_droits = $this->new_id_droits;
        $limite = $this->limite;
        $debut = $this->debut;

        // if (isset($_GET['page']) && !empty($_GET['page'])) {
        //     $page = (int) strip_tags($_GET['page']);
        // } else {
        //     $page = 1;
        // }
    }

    public function getUser()
    {
        //récupère les infos des utilisateurs
        $req = 'SELECT * FROM utilisateurs';
        $query = $this->db->query($req);
        return $query;
    }

    public function updateUser()
    {
        // Modifie les informations et droit de l'utilisateurs
        if (isset($_POST['update'])) {

            $new_id_droits = $_POST['new_droits'];
            $new_login = $_POST['new_login'];
            $new_email = $_POST['new_email'];
            $id_user = $_POST['update'];

            $req = 'UPDATE utilisateurs SET id_droits = ?, login = ?, email = ? WHERE id = ?';
            $prepare = $this->db->prepare($req);
            $prepare->execute(array(
                $new_id_droits, $new_login, $new_email, $id_user
            ));
        }
    }

    public function deleteUser($delete)
    {
        // supprime l'utilisateurs
        $req = 'DELETE FROM utilisateurs WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
        $msg = 'Utilisateurs supprimer';
    }

    public function gestionStock()
    {
        $req = ('SELECT * FROM produits ');
    }

    public function newCategorie()
    {

        if (isset($_POST['new_categorie'])) {

            $name_categorie = $_POST['name_categorie'];

            $req_exist = 'SELECT nom_categorie FROM categories WHERE nom_categorie = ?';
            $stmt = $this->db->prepare($req_exist);
            $stmt->execute(array(
                $name_categorie
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {

                $req = "INSERT INTO categories (nom_categorie) VALUES ('$name_categorie')";
                $query = $this->db->query($req);
            } else {
                $msg = 'categories éxiste déjà';
            }
        }
    }

    public function deleteCategorie($id)
    {
        $req = 'DELETE FROM categories WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $id
        ));
        return $prepare;
        $msg = 'categorie supprimer';
    }

    public function deleteProduits($delete)
    {
        $req = 'DELETE FROM produits WHERE id =?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
    }

    public function getCategorie()
    {
        $req = 'SELECT * FROM categories';
        $query = $this->db->query($req);
        return $query;
    }

    public function getProduits()
    {
        $req = 'SELECT *, produits.id AS id_produits FROM produits INNER JOIN categories  ON produits.id_categorie = categories.id INNER JOIN regions ON produits.id_regions = regions.id';
        $query = $this->db->query($req);
        return $query;
    }

    public function updateProduits()
    {
        if (isset($_POST['submit_update'])) {
            echo 'ok';
            if (isset($_FILES['file'])) {
                echo 'ok2';
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['update_file']['name'];
                $type = $_FILES['file']['type'];
                $error = $_FILES['file']['error'];
                $size = $_FILES['file']['size'];
                move_uploaded_file($tmpName, './file/' . $name);
                //move_uploaded_file — Déplace un fichier téléchargé
                $tabExtension = explode('.', $name);
                //Scinde une chaîne de caractères en segments
                $extension = strtolower(end($tabExtension));
                //end — Positionne le pointeur de tableau en fin de tableau
                $extensions = ['jpg', 'png', 'jpeg'];
                $maxSize = 400000;

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                    echo 'ok 3';
                    $uniqueName = uniqid('', true);
                    //uniqid — Génère un identifiant unique
                    $file = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpName, './file/' . $name);

                    $titre = $_POST['update_titre'];
                    $description = $_POST['update_description'];
                    $stock = $_POST['update_stock'];
                    $id_categorie = $_POST['update_categorie'];
                    $id_regions = $_POST['update_region'];
                    $prix = $_POST['update_prix'];
                    $id = $_POST['submit_update'];

                    $req = 'UPDATE produits SET titre = ?, description = ?, stock = ?, id_categorie = ?, id_regions = ?, prix = ?, image = ? WHERE id = ?';
                    $stmt = $this->db->prepare($req);
                    $stmt->execute(array(
                        $titre, $description, $stock, $id_categorie, $id_regions, $prix, $name, $id
                    ));
                }
            }
        }
    }

    public function newProduits()
    {
        if (isset($_POST['submit_produit'])) {
            echo 'ook1';
            $titre = $_POST['titre_produit'];
            $description = $_POST['description_produit'];
            $stock = $_POST['stock_produit'];
            $id_categorie = $_POST['categorie_produit'];
            $id_regions = $_POST['region_produit'];
            $prix = $_POST['prix_produit'];
            $new_produit = $_POST['submit_produit'];

            $select = 'SELECT titre from produits WHERE titre = ?';
            $stmt = $this->db->prepare($select);
            $stmt->execute(array(
                $titre
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {
                echo 'ook2';
                if (isset($_FILES['file'])) {
                    echo 'ooook3';
                    $tmpName = $_FILES['file']['tmp_name'];
                    $name = $_FILES['file']['name'];
                    $type = $_FILES['file']['type'];
                    $error = $_FILES['file']['error'];
                    $size = $_FILES['file']['size'];
                    move_uploaded_file($tmpName, './file/' . $name);
                    //move_uploaded_file — Déplace un fichier téléchargé
                    $tabExtension = explode('.', $name);
                    //Scinde une chaîne de caractères en segments
                    $extension = strtolower(end($tabExtension));
                    //end — Positionne le pointeur de tableau en fin de tableau
                    $extensions = ['jpg', 'png', 'jpeg'];
                    $maxSize = 400000;

                    if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                        echo 'oooook4';
                        $uniqueName = uniqid('', true);
                        //uniqid — Génère un identifiant unique
                        $file = $uniqueName . "." . $extension;
                        move_uploaded_file($tmpName, './file/' . $name);

                        $req = "INSERT INTO PRODUITS (titre, description, stock, id_categorie, id_regions, prix, image) VALUES (?,?,?,?,?,?,?)";
                        $prepare = $this->db->prepare($req);
                        $prepare->execute(array(
                            $titre, $description, $stock, $id_categorie, $id_regions, $prix, $name
                        ));
                        $msg = 'Produit ajouter';
                    } else {
                        $msg = 'Mauvaise extension';
                    }
                }
            } else {
                $msg = 'Le produit existe déjà';
            }
        }
    }

    public function newRegions()
    {
        if (isset($_POST['new_regions'])) {

            $name_regions = $_POST['regions'];

            $req_exist = 'SELECT nom_region FROM regions WHERE nom_region = ?';
            $stmt = $this->db->prepare($req_exist);
            $stmt->execute(array(
                $name_regions
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {

                $req = "INSERT INTO regions (nom_region) VALUES ('$name_regions')";
                $query = $this->db->query($req);
            } else {
                $msg = 'categories éxiste déjà';
            }
        }
    }

    public function getRegions()
    {
        $req = 'SELECT * FROM regions';
        $query = $this->db->query($req);
        return $query;
    }

    public function deleteRegions($id)
    {
        $req = 'DELETE FROM regions WHERE id = ?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $id
        ));
        return $prepare;
    }
}
