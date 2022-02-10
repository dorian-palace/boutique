<?php

class Form
{
     private $fromCode = '';


     /**
      * génere le fomulaire HTLM 
      * @return string
      */
     public function create()
     {
         return $this->formCode;
     }

     public function validate(array $form, array $champs)
     {
         //on parcourt totu les champs 
         foreach($champs as $champ){
          // Si le champs est vide dans le formulaire   
            if(!isset($form['$champ']) || empty ($form['$champs'])){

                return false;
            }
         }
     }
}