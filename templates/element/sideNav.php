<?php
/*
Contains a side Navigation.
$export: all/simple/none, means: none -> no export; simple -> export for the entire database; all -> export for entire database and current datasets
$mapBox: true/false; if true, a div-box for the map is created
*/

echo $this->Html->css(['map', 'export']);

$params = $this->request->getQueryParams();
unset($params['Persons[page]']);
unset($params['Companies[page]']);

$uri = $this->request->getRequestTarget();
?>
<aside class="column">
	<?php if($mapBox):?>
        <div class="smallMap">
            <div id="mapBox"  class="content" onload="initializeMap()">
                <?= $this->Html->script('address-map.js') ?>
            </div>
        </div>
	<?php endif; ?>
	<div class="side-nav" id="showallheading">
		<h4 class="heading"><?= __('Zeige alle...') ?></h4>
		<?= $this->Html->link(__('Personen'), ['controller' => 'Persons', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
		<?= $this->Html->link(__('Unternehmen'), ['controller' => 'Companies', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
		<?= $this->Html->link(__('Straßen'), ['controller' => 'Streets', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
		<?= $this->Html->link(__('Arrondissements'), ['controller' => 'Arrondissements', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
		<?php if($export != 'none'):?>
        <h4 class="heading" id="exportheading"><?=__('Exportiere...')?></h4>
            <div class="export-side">
                <?php if($export === 'all'):?>
                    <div class="export-item">
                        <h5><?=__('Aktuelle Datensätze')?></h5>
                        <?= $this->Form->postButton('Json', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
                        <?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
                    </div>
                <?php endif;?>
                <div class="export-item">
                    <h5><?=__('Gesamte Datenbank')?></h5>
                    <?= $this->Form->postButton('Json', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'json']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('XML', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'xml']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('CSV', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'csv']],['class'=>'button2'])?>
                    <?= $this->Form->postButton('SQL', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'sql']],['class'=>'button2'])?>
                </div>
            </div>
		<?php endif;?>
	</div>
</aside>

