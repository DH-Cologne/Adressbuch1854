<?php

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

session_start();
require_once(__DIR__."/../functions/export.php");

$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   $n = (isset($_POST['n'])? $_POST['n']:  (isset($_GET['n'])? $_GET['n']:null )) ;
   $u = (isset($_POST['u'])? $_POST['u']:  (isset($_GET['u'])? $_GET['u']:null )) ;

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p,$n,$u);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Default:
         break;
   }
}


?>

<!-- tableau récapitulatif des personnes ou compagnies enregistrées -->
   <div class="container">
      <div class="row">
         <div class="column-responsive column-80">
            <div class="content">
            <h5 colspan='4'><?=__('Export gesamte Datenbank')?></h5>
            <div class="export-item" style="display:flex">
                    <?= $this->Form->postButton('Json', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'json']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('Xml', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'xml']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('Csv', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'csv']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('Sql', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'sql']],['class'=>'button2'])?>
                </div>

                  <br>
               <table>
                  <tr>
                     <th colspan="4"><?= __('Gespeicherte Datensätze: ').compterArticles() ?></th>
                  </tr>
                  <tr>
                     
                     <th><?= __('Name')?></th>
                     <!--<th>Profession</th>-->
                     <th><?= __('Link') ?></th>
                     <th><?= __('Löschen') ?></th>
                     <th><?= __('Export JSON') ?></th>
                     <th><?= __('Export XML') ?></th>
                  </tr>
    <?php
    if (creationPanier())
    {
       $nbArticles=count($_SESSION['panier_export']['Identifiant']);
       if ($nbArticles <= 0)
       echo "<tr><th>". __('Keine Datensätze'). "</ th></tr>";
       else
       {
          for ($i=0 ;$i < $nbArticles ; $i++)
          {
             echo "<tr>";
             echo "<td>".htmlspecialchars($_SESSION['panier_export']['name_persons'][$i])."</ td>";
             //echo "<td>".htmlspecialchars($_SESSION['panier_export']['profession'][$i])."</ td>";

             //On va créer un lien pour aller sur la vue de la personne ou de la compagnie

             echo "<td><a target='blank' href='".htmlspecialchars($_SESSION['panier_export']['uri'][$i])."/view/{$_SESSION['panier_export']['Identifiant'][$i]}/'>VIEW</a></ td>";

             //On va créer le bouton de suppression si on ne souhaite garder l´élément

             echo "<td><a href=\"".htmlspecialchars("panier_export?action=suppression&l=".rawurlencode($_SESSION['panier_export']['Identifiant'][$i]))."\">DELETE</a></td>";

             //On va exporter en JSON ou en XML en reprenant l'URI et l'identifiant.

             echo "<td><a href='{$_SESSION['panier_export']['uri'][$i]}/view/{$_SESSION['panier_export']['Identifiant'][$i]}?export=json'>JSON</a></td>";
             echo "<td><a href='{$_SESSION['panier_export']['uri'][$i]}/view/{$_SESSION['panier_export']['Identifiant'][$i]}?export=xml'>XML</a></td>";
             echo "</tr>";


          }
       }
    }

            

         
    ?>
               </table>
            </div>
         </div>
      </div>
   </div>
