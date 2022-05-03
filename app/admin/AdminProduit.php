<?php
require_once('setting/db.php');
require('setting/data.php');
// require_once('../pagination.php');

class AdminProduit
{

    public $page;
    public $limite;
    public $debut;

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

        
    }

    public function page_Produit()
    {

        $req = "SELECT count(*) FROM produits";
        $stmt = $this->db->query($req);
        return $stmt;
    }

    public function getProduits()
    {
        $req = "SELECT *, produits.id AS id_produits FROM produits INNER JOIN categories ON produits.id_categorie = categories.id LIMIT $this->limite OFFSET $this->debut";
        $query = $this->db->prepare($req);


        // $query->bindValue('limite', $this->limite, PDO::PARAM_INT);
        // $query->bindValue('debut', $this->debut, PDO::PARAM_INT);
        $query->execute();

        return $query;
    }

    public function updateProduits()
    {
        /*  Le code commence par diviser le nom du fichier en trois parties : extension, nom et taille.
        Le code vérifie ensuite si l'extension se trouve dans un tableau (une liste ordonnée) avec d'autres extensions dont la taille est inférieure à 400000 octets.
        Si c'est le cas, il passe à l'analyse du contenu du fichier.
        La première ligne divise une chaîne de caractères en caractères individuels en utilisant explode().
        Elle commence par séparer chaque caractère par un point et se termine lorsqu'elle en trouve un sans autre point.
        Ensuite, elle utilise strtolower() pour convertir toutes les lettres majuscules en minuscule avant de vérifier s'il y a un autre point à la fin de $name.
        Cela divisera "TEST" en "test".
        Ensuite, il utilise end() comme marqueur de la fin de ce tableau et du début d'un autre tableau en dessous.
        Enfin, $extensions est égal à ['jpg', 'png', 'jpeg'].
        Le code va déplacer un fichier téléchargé par l'utilisateur sur le serveur.
        La variable $name est une chaîne qui contient le nom du fichier téléchargé.
        La variable $tabExtension est un tableau d'extensions possibles pour les fichiers et elle contient 'jpg', 'png', 'jpeg'.
        La variable $maxSize est de 400000, ce qui signifie que tout fichier dépassant cette taille ne sera pas déplacé.
        Si in_array($extension, $extensions) renvoie true et si la taille du fichier est inférieure à 400000 octets, il sera déplacé avec succès. */
        if (isset($_POST['submit_update'])) {

            $titre = secuData($_POST['update_titre']);
            $description = secuData($_POST['update_description']);
            $stock = secuData($_POST['update_stock']);
            $id_categorie = secuData($_POST['update_categorie']);
            $prix = secuData($_POST['update_prix']);
            $id = $_POST['submit_update'];

            if (isset($_FILES['update_file'])) {

                $tmpName = $_FILES['update_file']['tmp_name'];
                $name = $_FILES['update_file']['name'];
                $type = $_FILES['update_file']['type'];
                $error = $_FILES['update_file']['error'];
                $size = $_FILES['update_file']['size'];
                move_uploaded_file($tmpName, './file/' . $name);
                //move_uploaded_file — Déplace un fichier téléchargé
                $tabExtension = explode('.', $name);
                //Scinde une chaîne de caractères en segments
                $extension = strtolower(end($tabExtension));
                //end — Positionne le pointeur de tableau en fin de tableau
                $extensions = ['jpg', 'png', 'jpeg'];
                $maxSize = 400000;

                if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

                    $uniqueName = uniqid('', true);
                    //uniqid — Génère un identifiant unique
                    $file = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpName, './file/' . $name);

                    $req = 'UPDATE produits SET titre = ?, description = ?, stock = ?, id_categorie = ?, prix = ?, image = ? WHERE id = ?';
                    $stmt = $this->db->prepare($req);
                    $stmt->execute(array(
                        $titre, $description, $stock, $id_categorie, $prix, $name, $id
                    ));
                } else {
                    $req = 'UPDATE produits SET titre = ?, description = ?, stock = ?, id_categorie = ?, prix = ? WHERE id = ?';
                    $stmt = $this->db->prepare($req);
                    $stmt->execute(array(
                        $titre, $description, $stock, $id_categorie,  $prix, $id
                    ));

                }
            }
        }
    }

    public function newProduits()
    {
        if (isset($_POST['submit_produit'])) {

            $titre = secuData($_POST['titre_produit']);
            $description = secuData($_POST['description_produit']);
            $stock = secuData($_POST['stock_produit']);
            $id_categorie = secuData($_POST['categorie_produit']);
            $prix = secuData($_POST['prix_produit']);
            $new_produit = $_POST['submit_produit'];

            $select = 'SELECT titre from produits WHERE titre = ? ';

            $stmt = $this->db->prepare($select);
            $stmt->execute(array(
                $titre
            ));
            $count = $stmt->rowCount();

            if ($count == 0) {

                if (isset($_FILES['file'])) {

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

                        $uniqueName = uniqid('', true);
                        //uniqid — Génère un identifiant unique
                        $file = $uniqueName . "." . $extension;
                        move_uploaded_file($tmpName, './file/' . $name);

                        $req = "INSERT INTO PRODUITS (titre, description, stock, id_categorie, prix, image) VALUES (?,?,?,?,?,?,?)";
                        $prepare = $this->db->prepare($req);
                        $prepare->execute(array(
                            $titre, $description, $stock, $id_categorie, $prix, $name
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

    public function deleteProduits($delete)
    {
        $req = 'DELETE FROM produits WHERE id =?';
        $prepare = $this->db->prepare($req);
        $prepare->execute(array(
            $delete
        ));
        return $prepare;
    }
}
