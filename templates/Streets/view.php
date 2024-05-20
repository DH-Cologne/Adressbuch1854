<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Street $street
 */
	use Cake\Collection\Collection;


	require(__DIR__.'/../functions/functions.php');
	require(__DIR__.'/../functions/varsstreets.php');
	
	$varieties = [];
	foreach($sameStreets as $sameStr){
		array_push($varieties, h($sameStr->name_old_verbatim));
	}
	
	$arrsOld = [];
	$arrsNew = [];
	foreach($street->arrondissements as $arr){
		if($arr->type === 'pre1860'){
			array_push($arrsOld, '<abbr title="'.$arr->type.'">'.$arr->no.'</abbr>');
		} else {
			array_push($arrsNew,'<abbr title="'.$arr->type.'">'.$arr->no.'</abbr>');
		}
	}
	
$params = $this->request->getQueryParams();
unset($params['Persons[page]']);
unset($params['Companies[page]']);

$uri = $this->request->getRequestTarget();
?>
<?= $this->Html->script('tab4.js') ?>
<div class="container">

<!-- mise en place des tabs pour les différents onglets -->

<div id="tabs2">
    <ul>
        <li onClick="selView(1, this)" style="border-bottom:2px solid #ED8B00;"><?= __('Ansicht')?></li>
		<li onClick="selView(2, this)"><?= __('Karten') ?></li>
        <li onClick="selView(3, this)"><?= __('Exportieren') ?></li>
    </ul>
</div>
<div id='tabcontents'>
	<div id='tab1' class='tabpanel' style='display: inline;'>
		<div class="row">
    		<div class="column-responsive column-80">
        		<div class="streets view content">
            		<h3><?= h($street->name_old_clean) ?></h3>
            		<table>
                		<tr>
                    		<th><?= __('Name alt') ?></th>
                    		<td><?= h($street->name_old_clean) ?></td>
               			</tr>
                		<tr>
                    		<th><?= __('Schreibweisen im Buch') ?></th>
                    		<td><?= implode(', ', $varieties) ?></td>
                		</tr>
                		<tr>
                    		<th><?= __('Name heute') ?></th>
                    		<td><?= h($street->name_new) ?></td>
                		</tr>
						<tr>
                    		<th><?= __('Arrondissements') ?></th>
                    		<td>
								<table>
									<tr>
										<th><?= __('Vor 1860')?></th>
										<th><?= __('Nach 1860')?></th>
									</tr>
									<tr>
										<th><?= implode(', ', $arrsOld) ?></th>
										<th><?= implode(', ', $arrsNew) ?></th>
									</tr>
								</table>
							</td>
                		</tr>
            		</table>
					<?php if(!$persons->isEmpty()): ?>
            		<div class="related">
                		<details>
							<?= '<summary title="'.__('Klicken für Details').'"><h4>'.__('Personen in dieser Straße').'</h4></summary>' ?>
							<?= $this->element('personsMultiTable', ['count' => true, 'persons' => $persons, 'offset' => (($this->Paginator->current('Persons')-1) * $this->Paginator->param('perPage'))])?>
							<div class="paginator">
								<ul class="pagination">
									<?= $this->Paginator->first('<< ' . __('Anfang')) ?>
									<?= $this->Paginator->prev('< ' . __('zurück')) ?>
									<?= $this->Paginator->numbers() ?>
									<?= $this->Paginator->next(__('vor') . ' >') ?>
									<?= $this->Paginator->last(__('Ende') . ' >>') ?>
								</ul>
								<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Person(en) von {{count}}')) ?></p>
							</div>
						</details>
            		</div>
					<?php endif; ?>
					<?php if(!$companies->isEmpty()): ?>
            		<div class="related">
                		<details>
							<summary title=<?= __('Klicken für Details')?>> <h4> <?=__('Unternehmen in dieser Straße') ?> </h4></summary>
							<?= $this->element('companiesMultiTable', ['companies' => $companies])?>
						</details>
					</div>
					<?php endif; ?>
					<br>
					<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
				<div class="csl-entry">Zitierhinweis: <?php echo $street_name ?>, in: Adressbuch der Deutschen in Paris für das Jahr 1854, hg. v. F.A. Kronauge, Paris. Elektronische Edition, DHI Paris 2023, <a target="_blank" href='<?php  $this->request->getUri() ?>'><?php echo $this->request->getUri() ?></a>, CC-BY 4.0.</div><?php print zoterostreets($street_name, $no_old, $no_new, $street_new)?> </div>
				</div>
			</div>
		</div>
	</div>
	<div id='tab2' class='tabpanel' style='display:none'>	
		<div class="bigMap">
			<div id="mapBox" class="content" onload="initializeMap()">
				<?= $this->Html->script('address-map.js') ?>
			</div>
		</div>
	</div>
	<div id='tab3' class="tabpanel" style="display:none">
		<div class="row">
			<?= $this->Form->postButton('JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
			<?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
		</div>
	</div>
</div>
</div>

<!-- script pour créer un fichier json qui permet la collecte des données -->
<script type="application/ld+json">
	{
		"@context":"https://schema.org",
		"@type": "Place",
		"geo":{
			"@type":"GeoCoordinates",
			"latitude": "<?php echo $street->geo_lat ?>",
			"longitude": "<?php echo $street->geo_long ?>"
		},
		"name": "<?php echo $street_name .' ('. $street_new.')' ?>",
		"url":"https://adressbuch1854.dhi-paris.fr/streets/view/<?php echo $street->id ?>"
							
	}
</script>
