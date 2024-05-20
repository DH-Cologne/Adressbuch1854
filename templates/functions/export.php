<?php

/**
 * Verifie si le panier existe, le crée sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier_export'])){
      $_SESSION['panier_export']=array();
      $_SESSION['panier_export']['Identifiant'] = array();
      $_SESSION['panier_export']['profession'] = array();
      $_SESSION['panier_export']['name_persons'] = array();
      $_SESSION['panier_export']['uri'] = array();
      $_SESSION['panier_export']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le panier
 * @param int $Identifiant
 * @param string $qte
 * @param string $profession
 * @param string $name_persons
 * @param string $uri
 * @return void
 */
function ajouterArticle($Identifiant,$qte,$profession,$name_persons, $uri){

   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($Identifiant,  $_SESSION['panier_export']['Identifiant']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier_export']['qte'][$positionProduit] = $qte ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier_export']['Identifiant'],$Identifiant);
         array_push( $_SESSION['panier_export']['profession'],$profession);
         array_push( $_SESSION['panier_export']['name_persons'], $name_persons);
         array_push( $_SESSION['panier_export']['uri'], $uri);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $Identifiant
 * @param $qte
 * @return void
 */
/*function modifierQTeArticle($Identifiant,$qte){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qte > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($Identifiant,  $_SESSION['panier_export']['Identifiant']);

         if ($positionProduit !== false)
         {
            $_SESSION['panier_export']['qte'][$positionProduit] = $qte ;
         }
      }
      else
      supprimerArticle($Identifiant);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}*/

/**
 * Supprime un article du panier
 * @param $Identifiant
 * @return unknown_type
 */
function supprimerArticle($Identifiant){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['Identifiant'] = array();
      $tmp['profession'] = array();
      $tmp['name_persons'] = array();
      $tmp['uri'] = array();
      $tmp['verrou'] = $_SESSION['panier_export']['verrou'];

      for($i = 0; $i < count($_SESSION['panier_export']['Identifiant']); $i++)
      {
         if ($_SESSION['panier_export']['Identifiant'][$i] !== $Identifiant)
         {
            array_push( $tmp['Identifiant'],$_SESSION['panier_export']['Identifiant'][$i]);
            array_push( $tmp['name_persons'],$_SESSION['panier_export']['name_persons'][$i]);
            array_push( $tmp['profession'],$_SESSION['panier_export']['profession'][$i]);
            array_push( $tmp['uri'], $_SESSION['panier_export']['uri'][$i]);
         }

      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier_export'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier_export']);
}

/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier_export']) && $_SESSION['panier_export']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier_export']))
   return count($_SESSION['panier_export']['Identifiant']);
   else
   return 0;

}

?>