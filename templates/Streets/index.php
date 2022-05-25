<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Street[]|\Cake\Collection\CollectionInterface $streets
 */

$params = $this->request->getQueryParams();
unset($params['Persons[page]']);
unset($params['Companies[page]']);

$uri = $this->request->getRequestTarget();
?>


<?= $this->Html->script('tab2.js') ?>
<div class="container">

<!-- mise en place des tabs pour les onglets -->
<div id="tabs">
    <ul>
        <li onClick="selView(1, this)" style="border-bottom:2px solid #ED8B00;"><?= __('Index') ?></li>
        <li onClick="selView(2, this)"><?= __('Exportieren') ?></li>
    </ul>
</div>
<div id='tabcontent'>
	<div id='indextab' class='tabpanel' style='display:inline'>
		<div class="row">
    		<div class="column-responsive column-80">
				<div class="content">
					<h3><?= __('Straßen') ?></h3>
						<div class="table-responsive">
							<table>
								<thead>
									<tr>
										<th><?= __('Nr') ?></th>
										<th><?= __('Name alt') ?></th>
										<th><?= __('Name heute') ?></th>
										<th><?= __('Arrondissements') ?></th>
									</tr>
								</thead>
								<tbody>
						<?php
						$countNo = 1 + (($this->Paginator->current('Streets')-1) * $this->Paginator->param('perPage'));
						foreach ($streets as $street): ?>
						<?php
							$arrsOld = [];
							$arrsNew = [];
							foreach($street->arrondissements as $arr){
								if($arr->type === 'pre1860'){
									array_push($arrsOld, $this->Html->link($arr->no, ['controller' => 'Arrondissements', 'action' => 'view', $arr->id]));
								} else {
									array_push($arrsNew, $this->Html->link($arr->no, ['controller' => 'Arrondissements', 'action' => 'view', $arr->id]));
								}
							}
						?>
						<tr>
							<td><?= $this->Number->format($countNo) ?></td>
							<td><?= strtolower(htmlspecialchars_decode($this->Html->link(h($street->name_old_clean), ['action' => 'view', $street->id]))) ?></td>
							<td><?= strtolower(h($street->name_new)) ?></td>
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
						<?php
						$countNo++;
						endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="paginator">
				<ul class="pagination">
					<?= $this->Paginator->first('<< ' . __('Anfang')) ?>
					<?= $this->Paginator->prev('< ' . __('zurück')) ?>
					<?= $this->Paginator->numbers() ?>
					<?= $this->Paginator->next(__('vor') . ' >') ?>
					<?= $this->Paginator->last(__('Ende') . ' >>') ?>
				</ul>
				<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Straße(n) von {{count}}')) ?></p>
			</div>
		</div>
		<!-- <div class="bigMap">
			<div id="mapBox" class="content" onload="initializeMap()">
				<?= $this->Html->script('address-map.js') ?>
			</div>
		</div>
        This is a placeholder for a map
        -->
	</div>
</div>
</div>
<div id='exporttab' class="tabpanel" style="display:none">
	<div class="row">
		<div class="content3"><br>
			<h3><?=__('Aktuelle Datensätze')?></h3>
			<div class="column-responsive column-80" style="display: flex;">	
        		<?= $this->Form->postButton('JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
        		<?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
        	</div>
        </div>
    </div>
</div>
</div>


</div>