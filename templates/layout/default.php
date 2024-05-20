<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$description = 'Adressbuch 1854';
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        <?= $description ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <link href="/css/gfonts.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/normalize.css">

	<!-- Cake's css -->
    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>

	<!-- own css -->
    <?= $this->Html->css('style.css') ?>

	<!-- Leaflet css -->
	<?= $this->Html->css('leaflet.css') ?>
    <?= $this->Html->css('MarkerCluster.Default.css') ?>
    <?= $this->Html->css('MarkerCluster.css') ?>
    <?= $this->Html->css('MarkerCluster.Default.min.css') ?>
    <?= $this->Html->css('leaflet.fullscreen.css') ?>
    <?= $this->Html->css('Control.Opacity.css') ?>
	<?= $this->Html->css('map.css') ?>
    <?= $this->Html->css('jquery-ui-1.10.3.custom.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>


	<!-- JQuery script -->
	<?= $this->Html->script('jquery-3.4.1.min.js') ?>

	<!-- Leaflet script -->
	<?= $this->Html->script('leaflet.js') ?>
   
    <?= $this->Html->script('oms.min.js') ?>
    <?= $this->Html->script('leaflet.markercluster-src.js') ?>
   <?= $this->Html->script('Leaflet.fullscreen.min.js') ?>
   <?= $this->Html->script('Control.Opacity.js') ?>
   <?= $this->Html->script('jquery-ui-1.10.3.custom.min.js') ?> 
   <?= $this->Html->script('leaflet.shpfile.js') ?>
   <?= $this->Html->script('shp.js') ?>
	<!-- fetched meta -->
	<?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<details>
<summary><strong>Datenschutz &nbsp</strong></summary>
<div style="display:flex;justify-content:center">
        
        <div style="width:750px; display:flex; flex-wrap:wrap; justify-content:center;">
        <p style="text-align:justify">Ihr Besuch dieser Webseite wird aktuell von der Matomo Webanalyse erfasst. Diese Checkbox abwählen für Opt-out. Weitere Informationen: <a href="/pages/datenschutz" target="blank">Datenschutz</a>. </p>
        <br><div id="optout-form" style="border:1px solid black;border-radius:10px;width:300px;background:#ED8B00;color:black;">
    <input style="float:left" type="checkbox" id="optout" /><label for="optout"><strong></strong></label>
    </div>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
  function setOptOutText(element) {
    _paq.push([function() {
      element.checked = !this.isUserOptedOut();
      document.querySelector('label[for=optout] strong').innerText = this.isUserOptedOut()
        ? 'Cookies sind abgelehnt (Opt-out)'
        : 'Cookies sind akzeptiert (Opt-in)';
    }]);
  }

  var optOut = document.getElementById("optout");
  optOut.addEventListener("click", function() {
    if (this.checked) {
      _paq.push(['forgetUserOptOut']);
    } else {
      _paq.push(['optUserOut']);
    }
    setOptOutText(optOut);
  });
  setOptOutText(optOut);
});
</script>
</div>
</div>
</details>

	<header>

 <?php  $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $current = basename ($path); 
  ?>   

<nav class="top-nav">
	<label class="label2" for="toggle"><img src="/scans/index.png" style="width:30px" alt="menu"></label>
        <input type="checkbox" id="toggle">
            <div class="main_pages">
              <a href="/pages/home">
              <?=$this->Html->image('/scans/icon-house.png', [ 'width'=>'50px','alt'=>'home-logo','title'=>'home'])?>
              </a>
              <a href='/search/query' class='<?php if ($current == 'query'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Suche</a>
              <a href='/pages/addressbook' class='<?php if ($current == 'addressbook'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Adressbuch</a>
              <a href='/pages/project' class='<?php if ($current == 'project'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Datenbank</a>
              <a href='/pages/karte' class='<?php if ($current == 'karte'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Karte</a>
              <a href='/pages/digitalbook' class='<?php if ($current == 'digitalbook'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Digitalisate</a>
              <a href='/pages/partners' class='<?php if ($current == 'partners'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Partner und Team</a>
              <a href='/pages/hilfe' class='<?php if ($current == 'hilfe'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Hilfe</a>
              <a href="/pages/panier_export">
              <?= $this->Html->image('/scans/icon-download.png', ['width'=>'25px', 'alt'=>'download-logo', 'title'=>'download']) ?>
              </a>
            </div>
</nav>
</header>        
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        
    </main>
    <footer>
        <div class="contact2">
        <a target="_blank" href="https://dh.phil-fak.uni-koeln.de/">
            <?=$this->Html->image('/scans/IDH.jpg', ['class' => 'wrapper-item', 'id' => 'idh-logo', 'alt' => 'Logo IDH', 'style'=>'width:70px;padding-right:4px;'])?>
        </a>
            <p><br><strong>Institut für Digital Humanities</strong><br>
                Universität zu Köln<br>
                Albertus-Magnus-Platz<br>
                D-50931 Köln<br></p>
        </div>
        <div class="contact3">
		<a target="_blank" href="https://www.dhi-paris.fr/">
			<?=$this->Html->image('/scans/logo.png', ['class' => 'wrapper-item', 'id' => 'dhi-logo', 'alt' => 'Logo DHIP', 'style' =>'width:70px;padding-right:4px;'])?>
		</a>
        <p><br><strong>Deutsches Historisches Institut Paris</strong><br>
            Hôtel Duret-de-Chevry<br>
            8 rue du Parc-Royal<br>
            75003 Paris<br>
            Tel.+33 1 44542380<br>
            Fax+33 1 42715643<br>
            E-Mail: <a style="color: white;"href="mailto:info@dhi-paris.fr">info@dhi-paris.fr</a></p>
        </div>
        <div class="contact">
         <a target="_blank" href="https://www.maxweberstiftung.de/startseite.html">
            <?=$this->Html->image('/scans/MWS.svg', ['class' => 'wrapper-item', 'id' => 'idh-logo', 'alt' => 'Logo Max Weber stifung', 'width' => '125px', 'style'=>'padding:10px'])?>
        </a>
</div>
    </footer>

    

    <div class='links'>
            <?= $this->Html->link(__('Datenschutz'), ['controller' => 'Pages', 'action' => 'datenschutz'], ['class' => 'wrapper-item', 'id' => 'credits']) ?>&nbsp/&nbsp
            <?= $this->Html->link(__('Impressum'), ['controller' => 'Pages', 'action' => 'credits'], ['class' => 'wrapper-item', 'id' => 'credits']) ?>
            
        </div>

  
</body>

</html>
