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

    public function addProduits(){

        // if(isset($_GET['id'])){

            
        //     $produits = $this->db->prepare("SELECT * FROM produits WHERE id = ?");
        //     $produits->execute($_GET['id']);
            
        //     if(empty($produits)){
    
        //         die("ce produits n'est pas disponible");
    
        //     }
    
        //     $produits->add($produits[0]['id']);
    
            
        //     die('le produit a été ajouté au panier');
    
        // }else{
        
        //     die("vous n'avez pas ajoutez de produits au panier");
        // }
    
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

       public function vilderPanier(){}{

        
       }
    }   



