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
        <?= $description ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

	<!-- Cake's css -->
    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>

	<!-- own css -->
    <?= $this->Html->css('style.css') ?>

	<!-- Leaflet css -->
	<?= $this->Html->css('https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', ['integrity' => 'sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==', 'crossorigin' => '']) ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.Default.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.css') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/MarkerCluster.Default.min.css') ?>
    <?= $this->Html->css('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css') ?>
    <?= $this->Html->css('Control.Opacity.css') ?>
	<?= $this->Html->css('map.css') ?>
    <?= $this->Html->css('jquery-ui-1.10.3.custom.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') ?>


	<!-- JQuery script -->
	<?= $this->Html->script('https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js') ?>

	<!-- Leaflet script -->
	<?= $this->Html->script('https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', ['integrity' => 'sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==', 'crossorigin' => '']) ?>
   
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier-Leaflet/0.2.6/oms.min.js') ?>
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.0/leaflet.markercluster-src.js') ?>
   <?= $this->Html->script('https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js') ?>
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
	<header>

 <?php  $path = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $current = basename ($path); 
  ?>   

<nav class="top-nav">
	<label class="label2" for="toggle"><img src="/webroot/scans/index.png" style="width:30px" alt="menu"></label>
        <input type="checkbox" id="toggle">
            <div class="main_pages">
              <a href="/pages/home">
              <?=$this->Html->image('/webroot/scans/icon-house.png', [ 'width'=>'50px','alt'=>'home-logo','title'=>'home'])?>
              </a>
              <a href='/search/query' class='<?php if ($current == 'query'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Suche</a>
              <a href='/pages/addressbook' class='<?php if ($current == 'addressbook'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Adressbuch</a>
              <a href='/pages/project' class='<?php if ($current == 'project'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Datenbank</a>
              <a href='/pages/karte' class='<?php if ($current == 'karte'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Karte</a>
              <a href='/pages/digitalbook' class='<?php if ($current == 'digitalbook'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Digitalisate</a>
              <a href='/pages/partners' class='<?php if ($current == 'partners'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Partner und Team</a>
              <a href='/pages/hilfe' class='<?php if ($current == 'hilfe'){ echo 'top-nav-item';} else{ echo'top-nav-item2';}?>'>Hilfe</a>
              <a href="/pages/panier_export">
              <?= $this->Html->image('/webroot/scans/icon-download.png', ['width'=>'25px', 'alt'=>'download-logo', 'title'=>'download']) ?>
              </a>
            </div>
</nav>


</header>
    <main class="main">
        
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        
    </main>
    <footer>
        <div class="contact">
        <a target="_blank" href="https://dh.phil-fak.uni-koeln.de/">
            <?=$this->Html->image('/webroot/scans/IDH.jpg', ['class' => 'wrapper-item', 'id' => 'idh-logo', 'alt' => 'Logo IDH', 'style'=>'width:70px;padding-right:4px;'])?>
        </a>
            <p><br><strong>Institut für Digital Humanities</strong><br>
                Universität zu Köln<br>
                Albertus-Magnus-Platz<br>
                D-50931 Köln<br></p>
        </div>
        <div class="contact">
		<a target="_blank" href="https://www.dhi-paris.fr/">
			<?=$this->Html->image('/webroot/scans/logo.png', ['class' => 'wrapper-item', 'id' => 'dhi-logo', 'alt' => 'Logo DHIP', 'style' =>'width:70px;padding-right:4px;'])?>
		</a>
        <p><br><strong>Deutsches Historisches Institut Paris</strong><br>
            Hôtel Duret-de-Chevry<br>
            8 rue du Parc-Royal<br>
            75003 Paris<br>
            Tel.+33 1 44542380<br>
            Fax+33 1 42715643<br>
            E-Mail: <a style="color: white;"href="mailto:info@dhi-paris.fr">info@dhi-paris.fr</a></p>
        </div>
         <a target="_blank" href="https://www.maxweberstiftung.de/startseite.html">
            <?=$this->Html->image('/webroot/scans/MWS.svg', ['class' => 'wrapper-item', 'id' => 'idh-logo', 'alt' => 'Logo Max Weber stifung', 'width' => '125px', 'style'=>'padding:10px'])?>
        </a>
    </footer>

    

    <div class='links'>
            <?= $this->Html->link(__('Datenschutz / '), ['controller' => 'Pages', 'action' => 'datenschutz'], ['class' => 'wrapper-item', 'id' => 'credits']) ?>
            <?= $this->Html->link(__('Impressum'), ['controller' => 'Pages', 'action' => 'credits'], ['class' => 'wrapper-item', 'id' => 'credits']) ?>
            
        </div>
</body>
</html>
