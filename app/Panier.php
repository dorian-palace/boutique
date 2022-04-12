<?php 

require_once 'setting/db.php';
class Panier{

    public function __construct()

    {
        if(!isset($_SESSION)){

            session_start();
        }
        if(!isset($_SESSION['panier'])){

            $_SESSION['panier'] = array();
        }
        if(isset($_GET['delpanier'])){

            $this->del($_GET['delpanier']);
        }
        if(isset($_POST['panier']['quantity'])){

            $this->recalc();
        }
        $this->db = new Db_connect();
        $this->db = $this->db->return_connect();
    }

    public function recalc(){

        
        $_SESSION['panier'] = $_POST['panier']['quantity'];
    }
    
    public function add($product_id){

        if(isset($_SESSION['panier'][$product_id])){

            $_SESSION['panier'][$product_id]++ ;

        }else{

            $_SESSION['panier'][$product_id] = 1;

        }
       
        
   
    }

   

       public function getPanier(){

            $id = array_keys($_SESSION['panier']);

         
            if(empty($id)){

                $produits = array();
            }else{

                $produits = $this->db->prepare('SELECT * FROM produits where id IN ('.implode(',',$id).')');
                $produits->execute();
            }

          return $produits;
       }

       public function del($produit_id){
        
            unset($_SESSION['panier'][$produit_id]);

       }

       public function total(){


        $total = 0;

        $id = array_keys($_SESSION['panier']);

         
        if(empty($id)){

            $produits = array();
        }else{

            $produits = $this->db->prepare('SELECT id, prix FROM produits where id IN ('.implode(',',$id).')');
            $produits->execute();
        }
        
        foreach($produits as $produit){

            $total += $produit['prix']* $_SESSION['panier'][$produit['id']];
        }

        return $total;


       }

       public function count(){

         return array_sum($_SESSION['panier']);

       }

      

       public function validerPanier(){

    

        if(isset($_POST['submit'])){

            
            $id_user = $_SESSION['id'];

             $req = $this->db->prepare('SELECT * FROM produits INNER JOIN panier ON produits.id = panier.id_produits INNER JOIN commande ON commande.id = panier.id_commande INNER JOIN utilisateurs ON utilisateurs.id = panier.id_utilisateur');

            $req->execute();

            $res = $req->fetch();

             $id_utilisateur = $_SESSION['id'];
            // $id_produits =     $_SESSION['panier'];
           
             $insert = $this->db->prepare('INSERT INTO panier(id_utilisateur, id_produits,id_commande,quantite,statut)VALUES(?,?,1,1,0)');

            $insert->execute(array($id_utilisateur, $id_produits));
            
            var_dump($res);
           
            
            
    
        }

 
       }
    }   



