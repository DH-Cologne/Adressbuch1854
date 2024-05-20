<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */

//on importe les fonctions nécessaires pour la page

require_once(__DIR__.'/../functions/functions.php');
require(__DIR__.'/../functions/varscomp.php');

 $this->Html->css('view');

	$pageRefs = [];
	foreach($company->original_references as $ref){
		$pageRef = __('S. ');
		$begP = $ref->begin_page_no;
		$endP = $ref->end_page_no;
		if($endP != null){
			$pageRef .= $begP.'-'.$endP;
		} else {
			$pageRef .= $begP;
		}
		if($begP >= 9 && $begP <=18){
			$pageRef .= ' '.__('(Geschäftsliste)');
		}
		array_push($pageRefs, $pageRef);
	}

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
        		<div class="companies view content">
            		<h3><?= h($company->name) ?></h3>
					<?=	!empty($pageRefs) ? __('Eintrag im Buch auf ').implode(' und ', $pageRefs).'.' : '' ?>
            			<table>
                			<tr>
                    			<th><?= __('Name') ?></th>
                    				<td><?= h($company->name) ?></td>
                			</tr>
                			<tr>
                    			<th><?= __('Anmerkungen wörtlich') ?></th>
                    			<td><?= h($company->specification_verbatim) ?></td>
                			</tr>
                			<tr>
                				<th><?= __('Beruf') ?></th>
                				<td><?php if(!empty($company->profession->profession_verbatim)){
				echo $this->Html->link($company->profession->profession_verbatim, ['controller'=>'Profession','action'=>'view', $company->profession->id]);
				}?></td>
                			</tr>
                			<tr>
                    			<th><?= __('Berufskategorie') ?></th>
                    			<td><?= $company->has('prof_category') ? $company->prof_category->name : '' ?></td>
                			</tr>
							<tr>
								<th><?=__('Adresse(n)')?></th>
								<td>
								<?php if (!empty($company->addresses)) : ?>
								<?= htmlspecialchars_decode($this->element('addressList', ['addresses' => $company->addresses, 'list' => true])) ?>
								<?php endif; ?>
								</td>
							</tr>
							<tr>
                    		<th><?= __('Sonstige Merkmale') ?></th>
                    		<td>
								<table>
									<tr>
										<th><?= __('Vorab-Abonnent (fett)')?></th>
										<th><?= __('Notable Commerçant [NC]')?></th>
										<th><?= __('In Geschäftsliste')?></th>
									</tr>
									<tr>
										<td><?=$company->bold ? __('Ja') : __('Nein');?></td>
										<td><?=$company->notable_commercant ? __('Ja') : __('Nein');?></td>
										<td><?=$company->advert ? __('Ja') : __('Nein');?></td>
									</tr>
								</table>
							</td>
                			</tr>
            				<tr>
            					<th><?= __('Scan der Seite')?></th>
                      <td>
            						<details>
                          <summary><?= __('Scan der Seite ansehen')?></summary>
                          <?php print image('https://adressbuch1854.dhi-paris.fr/scans/','SD/','BHVP_703983_',$begP);?><br>
      									</details>
                      </td>
            						<!-- <td style="display:flex;">
									<?php // print scan_zotero($begP); ?>
									<?php // print text('/Ocerisations/','BHVP_703983_',$begP); ?>
            	   					</td> 
            						<td><a href="/pages/panier_export?action=ajout&amp;l=<?php // echo $company->id ?>&amp;n=<?php // echo $company->name ?>&amp;p=<?php // echo $company->profession_verbatim?>&amp;u=<?php // echo $this->request->getUri(); ?>" onclick="window.open(this.href, '', 
				'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=350'); return false;"><img src="/scans/icon-download.png" title="<?php // echo __('Speichern') ?>" style="width: 20px"></a>
			<td> -->
	</tr>
            				<tr>
            					<th><?= __('Volltexterkennung')?></th>
            						<td>
            						<details>
										<summary><?= __('Volltext der Seite ansehen')?></summary>
										<form>
										<button type='submit' formtarget='_blank' formaction='/Ocerisations/BHVP_703983_<?php echo $begP ?>.txt'
										value="text">BHVP_703983_<?php echo $begP ?>.txt</button>
										</form>
									</details>
            						</td>
            				</tr>
            			</table>
            <?php if (!empty($company->persons)) : ?>
			<div class="related">
                <details>
					<?= '<summary title="'.__('Klicken für Details').'"><h4>'.__('Assoziierte Personen').'</h4></summary>' ?>
					<?= $this->element('personsMultiTable', ['persons' => $company->persons])?>
				</details>
            </div>
            <?php endif; ?>
			<!-- if (!empty($company->external_references)) : ?>
			<div class="related">
                <details>
					< '<summary title="'.__('Klicken für Details').'"><h4>'.__('Literatur- und Quellenhinweise').'</h4></summary>' ?>
					< $this->element('externalReferenceMultiTable', ['externalReferences' => $company->external_references])?>
				</details>
			</div>
				?php endif;-->
				<br><div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
				<div class="csl-entry">Zitierhinweis: <?php echo $nachname ?>, in: Adressbuch der Deutschen in Paris für das Jahr 1854, S.<?php echo $begP ?>, hg. v. F.A. Kronauge, Paris. Elektronische Edition, DHI Paris 2023, <a target="_blank" href='<?php  $this->request->getUri() ?>'><?php echo $this->request->getUri() ?></a>, CC-BY 4.0.</div>

<?php print zoterocomp($nachname, $prof_category, $specification, $profession, $addr_no, $addr_old, $addr_new, $begP);?>
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
<div id="exporttab" class="tabpanel" style="display: none;">
		<div class="row">
			<?= $this->Form->postButton('Json', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
			<?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
		</div>
</div>
</div>
</div>

<!-- on écrit un script en json pour que les donnés puissent être collectées -->
 <script type="application/ld+json">
 	{
 		"@context":"https://schema.org",
 		"@type":"Organization",
 		"address":{
 			"@type": "PostalAddress",
 			"addressLocality":"Paris, France",
 			"postalCode": "F-75",
 			"streetAddress": "<?php echo $addr_no. ' '. $addr_old. ' ('. $addr_new .')' ?>"
 		},
 		"member": [
 		{
 			"@type": "Person",
 			"name" : "<?php echo $nachname ?>"
 		}],
 		"name":"<?php echo $nachname ?>",
 		"description":"<?php echo $profession ?>"
 	}
</script>
