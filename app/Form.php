<?php


class Form
{
     private $formCode = '';


     /**
      * génere le fomulaire HTLM 
      * @return string
      */
     public function create()
     {
         return $this->formCode;
     }

     /**
      * valide si tous les champs sont remplis 
      * @param array $form array du fomulaire ($_POST )
      * @param array $champs liste des champs obligatoir 
      * 
      * @return bool 
      */
      
     public function validate(array $form, array $champs)
     {
         //on parcourt totu les champs 
         foreach($champs as $champ){
          // Si le champs est vide dans le formulaire   
            if(!isset($form['$champ']) || empty ($form['$champs'])){

                return false;
            }
         }

         return true;
     }

     /**
      * ajoute les attriburs envoyer à la balise
      * @param array $attributs
      * 
      * @return string
      */
     private function ajoutAttributs(array $attributs) : string
     {
        //on initialise une chaine de caractères 
        $str = '';

        // on liste les attribus " courts "
        $courts = ['cheked', 'disable', 'readonly', 'multiple', 'require', 'autofocus','novalidate','formalidate'];
        
        //on boulce dans le tableau des attribut
        foreach($attributs as $attribut => $valeur){
            //si l'attribut est dans la liste du tableau courts 
            if(in_array($attribut,$courts) && $valeur == true ){

                $str .= " $attribut";
            }else{
                //on ajoute attribut = valeur 

                $str .= " $attribut='$valeur'";
                
                }
            }
            return $str;
        }

        /**
         * balise d'ouverture du formulaire
         * @param  string $methode du formulaire Post ou get 
         * @param string $action du formlaire 
         * @param mixed $array retourne les attributs 
         * 
         * @return self
         */

        public function debutForm(string $methode = 'post', string $action = '#', array $attributs = []) : self
        {
            // on créer la balise from 
            $this->formCode .= "<form action='$action' method='$methode'";

            //on ajout les éventuelle attribut
           
            // si on a des attributs  alors  on ajoute un attribut, sinnon rien 
            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
            
            return $this;
        }

        /**
         * balise de fermeture du formulaire 
         * @return self 
         */
        public function finForm() : self 

        {
            $this->formCode .= "</form>";
             return $this;
        }

        /**
         * ajoute d'un label au input 
         * @param string $for
         * @param string $texte
         * @param array $attributs
         * 
         * @return self
         */
        public function ajoutLabelFor(string $for, string $texte , array $attributs = []): self 
        { 
            // on ouvre la balise label
            $this->formCode .= "<label for='$for'";
            
            // ajout des attributs 

            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

            //on ajoute le text 

            $this->formCode .= ">$texte</label>";     
            
            return $this;
        }

        /**
         * ajout d'un iput (email, password , texte)
         * @param string $type
         * @param string $name
         * @param array $attributs
         * 
         * @return self
         */
        public function ajoutInput(string $type, string $name,string $placeholder,array $attributs = []) : self
        {

            //on ouvre la balise 

            $this->formCode .= "<input type ='$type' name='$name' placeholder='$placeholder'";

           

            // on ajoute les attributs
            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';

            return $this;
        }

        /**
         * ajout d'un textarea au formualire 
         * @param string $name
         * @param string $valeur=''
         * @param array $attributs
         * 
         * @return self
         */
        public function ajoutTextearea(string $name, string $valeur='', array $attributs = []): self
        {


            $this->formCode .= "<textarea name='$name'";
            
            // ajout des attributs 

            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

            //on ajoute le text 

            $this->formCode .= ">$valeur</textarea>";     
            
            return $this;
        }

        /**
         * ajout un select au fromulaire 
         * @param string $name
         * @param array $options
         * @param array $attributs
         * 
         * @return self
         */
        public function ajoutSelect(string $name, array $options, $attributs = []): self
        {
            // on créer le select 

            $this->formCode .= "<select name='$name' ";

            //on ajoute les attributs 

            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs).'>' : '>';
            
            // on ajoute les option
            foreach($options as $valeur => $texte){

                $this->formCode .=  "<option value='$valeur'>$texte</option>";
            }

            // on ferme le select 
            $this->formCode .= "</select>";

            // on ferme le select 
            return $this;
        }

        /**
         * permet d'ajouter un bouton au formulaire 
         * @param string $texte
         * @param array $attributs
         * 
         * @return self
         */
        public function   ajoutBoutton(string $texte, array $attributs = []) :self
        {
            // on crée le boutton 
            $this->formCode .= "<button";

            // on ajoute les attributs 
            $this->formCode .= $attributs ? $this->ajoutAttributs($attributs) : '';

            // on ajoute le texte est on ferme la balise boutton
            $this->formCode .= ">$texte</button>";

            return $this;
        }

        public function createForm(){

            $form = new Form;
            
    
            $form->debutForm('post','#',['class'=>'formUser'])
    
                    ->ajoutLabelFor('email', 'E-mail :',['class' => 'labelForm'])
                    ->ajoutinput('email', 'email', 'votre email', ['class'=> 'inputForm','require'=>true])
                    ->ajoutLabelFor('login', 'Nom d\'utilisateur :',['class'=> 'labelForm'])
                    ->ajoutInput('text','login','votre login',['require' => true, 'class'=> 'inputForm'])
                    ->ajoutLabelFor('pass','Mot de passe :',['class' => 'LabelForm'])
                    ->ajoutInput('password','password','Entrez votre mot de passe ',['class' => 'inputForm', 'require' => true])
                    ->ajoutLabelFor('pass','Confirmez le mode de passe :',['class'=> 'labelForm'])
                    ->ajoutInput('password', 'conf_password','Confirmez le mot de passe',['class' => 'inputForm'])
                    ->ajoutInput('submit','valider','', ['class' => 'btnForm'])
                    
                    ->finForm();
    
                    echo $form->create();
                    
        }

       

     } 
