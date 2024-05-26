<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profession $profession
 */

$params = $this->request->getQueryParams();
unset($params['Persons[page]']);
unset($params['Companies[page]']);
$uri = $this->request->getRequestTarget();

?>
<?=$this->Html->script('tab.js'); ?>
<div class='container'>
	<!-- mise en place des onglets pour les différentes tables -->
<div id="tabs">
    <ul>
        <li onClick="selView(1, this)" style="border-bottom:2px solid #ED8B00;"><?= __('Index') ?></li>
        <li onClick="selView(2, this)"><?= __('Karte') ?></li>
        <li onClick="selView(3, this)"><?= __('Exportieren') ?></li>
    </ul>
</div>
<div id='tabcontent'>
	<div id='indextab' class='tabpanel' style='display:inline'>
		<div class="row">
			<div class="column-responsive column-80">
				<div class="content">
                <h3><?= h($profession->profession_verbatim) ?></h3>
            <table>
                <tr>
                    <th><?= __('Berufe Adressbuch') ?></th>
                    <td><?= h($profession->profession_verbatim) ?></td>
                </tr>
                <!-- <tr>
                    <th><?php // echo __('Berufkategorie') ?></th>
                    <td><?php // echo h($profession->name) ?></td>
                </tr> -->
                <tr>
                    <th><?= __('Berufgattungsname (OhdAB)') ?></th>
                    <td><?= h($profession->norm) ?></td>
                </tr>
                <tr>
                  <th><?= __('Berufskategorien (OhdAB)') ?></th>
                  <td><?= h($profession->OhdAB_01) ?></td>
                </tr>
                <tr>
                    <th><?= __('OhdAB ID') ?></th>
                    <td><?= h($profession->ohab_ges) ?></td>
                </tr>
                <tr>
                    <th><?= __('Factgrid ID') ?></th>
                    <td>
                      <a href="https://database.factgrid.de/wiki/Item:<?= $profession->q_fact ?>"
                        title="Factgrid-Item <?= $profession->q_fact ?>"
                        target="_blank">
                        <?= $profession->q_fact ?>
                      </a>
                    </td>
                </tr>
				<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Occupation",
      "name": "<?php echo $profession->profession_verbatim ?>",
      "occupationalCategory": {
        "@type":"Category",
        "Category":"<?php echo $profession->name ?>",
		"OhdAB":"<?php echo $profession->norm ?>",
		"OhdAB_01":"<?php echo $profession->OhdAB_01 ?>",
		"url":"https://adressbuch1854.dhi-paris.fr/profession/view/<?php echo $profession->id ?>"
      }
      
    }
    </script>
            </table>
            <?php if(!$persons->isEmpty()): ?>
				<div class="related">
                		<details>
							<?= '<summary title="'.__('Klicken für Details').'"><h4>'.__('Personen').'</h4></summary>' ?>
							<?= $this->element('personsMultiTable', ['persons' => $persons, 'count' => true, 'offset' => (($this->Paginator->current('Persons')-1) * $this->Paginator->param('perPage', 'Persons'))])?>
						<div class="paginator">
							<ul class="pagination">
							<?= $this->Paginator->first('<< ' . __('Anfang'), ['model' => 'Persons', 'url' => ['?' => $params]]) ?>
							<?= $this->Paginator->prev('< ' . __('zurück'), ['model' => 'Persons', 'url' => ['?' => $params]]) ?>
							<?= $this->Paginator->numbers(['model' => 'Persons', 'url' => ['?' => $params]]) ?>
							<?= $this->Paginator->next(__('vor') . ' >', ['model' => 'Persons', 'url' => ['?' => $params]]) ?>
							<?= $this->Paginator->last(__('Ende') . ' >>', ['model' => 'Persons', 'url' => ['?' => $params]]) ?>
							</ul>
							<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Person(en) von {{count}}'), ['model' => 'Persons']) ?></p>
							
						</div>
						</details>
            		</div>
				<?php endif; ?>
                <?php if(!$companies->isEmpty()): ?>
            		<div class="related">
                		<details>
							<?= '<summary title="'.__('Klicken für Details').'"><h4>'.__('Unternehmen').'</h4></summary>' ?>
							<?= $this->element('companiesMultiTable', ['companies' => $companies, 'count' => true, 'offset' => (($this->Paginator->current('Companies')-1) * $this->Paginator->param('perPage', 'Companies'))])?>
						<div class="paginator">
							<ul class="pagination">
								<?= $this->Paginator->first('<< ' . __('Anfang'), ['model' => 'Companies', 'url' => ['?' => $params]]) ?>
								<?= $this->Paginator->prev('< ' . __('zurück'), ['model' => 'Companies', 'url' => ['?' => $params]]) ?>
								<?= $this->Paginator->numbers(['model' => 'Companies', 'url' => ['?' => $params]]) ?>
								<?= $this->Paginator->next(__('vor') . ' >', ['model' => 'Companies', 'url' => ['?' => $params]]) ?>
								<?= $this->Paginator->last(__('Ende') . ' >>', ['model' => 'Companies', 'url' => ['?' => $params]]) ?>
							</ul>
							<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Unternehmen von {{count}}'), ['model' => 'Companies']) ?></p>
						</div>
						</details>
            		</div>
					<?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<div id='maptab' class='tabpanel' style='display:none'>	
		<div class="bigMap">
			<div id="mapBox" class="content" onload="initializeMap()">
				<?= $this->Html->script('address-map.js') ?>
			</div>
		</div>
	</div>
<div id='exporttab' class='tabpanel' style='display:none'>
		<div class="row">
			<div class="content3"><br>
				<h3><?= __('Aktuelle Datensätze') ?></h3>
				<div class="column-responsive column-80" style="display:flex">
					<?= $this->Form->postButton('JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
					<?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
