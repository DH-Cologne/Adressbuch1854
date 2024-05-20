<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Profession[]|\Cake\Collection\CollectionInterface $profession
 */
$params = $this->request->getQueryParams();
$uri = $this->request->getRequestTarget();

?>
<?=$this->Html->script('tab2.js'); ?>
<div class='container'>
	<!-- mise en place des onglets pour les différentes tables -->
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
     <h3><?= __('Berufe') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    
                    <th><?= __('Berufe Adressbuch') ?></th>
                    <th><?= __('Berufskategorie') ?></th>
                    <th><?= __('Berufsgattungsname (OhdAB)') ?></th>
                    <th><?= __('Berufskategorien (OhdAB)') ?></th>
                    <th><?= __('OhdAB ID') ?></th>
                    <th><?= __('Factgrid ID') ?></th>
                  
                    
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($profession as $p): ?>   
                    <?php if($p->profession_verbatim && $p->name && $p->norm && $p->ohab_ges && $p->OhdAB_01 != null): ?>
                <tr>
                    <td><?= $this->Html->link($p->profession_verbatim, ['controller'=>'Profession', 'action'=>'view', $p->id]) ?></td>
                    <td><?= h($p->name) ?></td>
                    <td><?= h($p->norm) ?></td>
                    <td><?= h($p->OhdAB_01) ?></td>
                    <td><?= h($p->ohab_ges) ?></td>
                    <td><?= h($p->q_fact) ?></td>
                    
                    
              
                </tr>
                <?php endif; ?>
                <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Occupation",
      "name": "<?php echo $p->profession_verbatim ?>",
      "occupationalCategory": {
        "@type":"Category",
        "Category":"<?php echo $p->name ?>",
        "url":"https://adressbuch1854.dhi-paris.fr/profession/view/<?php echo $p->id ?>"
      }
      
    }
    </script>
                <?php endforeach; ?>
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
		<p><?= $this->Paginator->counter(__('Seite {{page}} von {{pages}}, zeige {{current}} Berufe von '.$this->Number->format($total, ['locale'=>'fr_FR']))) ?></p>
	</div>
</div>
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