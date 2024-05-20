<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */

$params = $this->request->getQueryParams();
unset($params['Persons[page]']);
unset($params['Companies[page]']);

$uri = $this->request->getRequestTarget();

?>

<?= $this->Html->script('tab.js') ?>
<div class="container">
	<!-- mise en place de tabs pour switcher sur la même page -->
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
					<h3><?= __('Unternehmen') ?></h3>
					<?= $this->element('companiesMultiTable', ['count' => true, 'companies' => $companies, 'offset' => (($this->Paginator->current('Companies')-1) * $this->Paginator->param('perPage'))])?>
					<div class="paginator">
						<ul class="pagination">
						<?= $this->Paginator->first('<< ' . __('Anfang')) ?>
						<?= $this->Paginator->prev('< ' . __('zurück')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('vor') . ' >') ?>
						<?= $this->Paginator->last(__('Ende') . ' >>') ?>
						</ul>
						<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Unternehmen von {{count}}')) ?></p>
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