<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */

	require(__DIR__.'/../functions/functions.php');
	require(__DIR__.'/../functions/varspersons.php');




	$name = '';
	/*if(!empty($person->title)){
		$name.=h($person->title).' ';
	}*/
	if(!empty($person->name_predicate)){
		$name.=h($person->name_predicate).' ';
	}
	$name.=h($person->surname);
	if(!empty($person->first_name)){
		$name.=', '.h($person->first_name);
	}

	$pageRefs = [];
	foreach($person->original_references as $ref){
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

	$titles = [];
	if(!empty($person->zusatz)){
		array_push($titles, $person->zusatz);
	}
	if($person->de_l_institut){
		array_push($titles, 'de l\'Institut');
	}
	$params = $this->request->getQueryParams();
	unset($params['Persons[page]']);
	unset($params['Companies[page]']);

	$uri = $this->request->getRequestTarget();
?>

<?= $this->Html->script('tab.js') ?>
<div class='container'>
<div id="tabs">
    <ul>
        <li onClick="selView(1, this)" style="border-bottom:2px solid #ED8B00;"><?= htmlspecialchars_decode(h($name)) ?></li>
        <li onClick="selView(2, this)"><?= __('Karte') ?></li>
        <li onClick="selView(3, this)"><?= __('Exportieren') ?></li>
    </ul>
</div>
<div class="tabcontent">
<div id="indextab" class="tabpanel" style="display:inline">
<div class="row">
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= htmlspecialchars_decode(h($name)) ?></h3>
 
			<?= !empty($pageRefs) ? __('Eintrag im Buch auf ').implode(' und ', $pageRefs).'.' : ''?>
            <table>
            	<tr>
            		<th><?= __('Scan der Seite') ?></th>
						<td style="display:flex">
							<?php print image('http://adressbuch1854.dh.uni-koeln.de/scans/','SD/','BHVP_703983_',$begP);?><br>
							<?php print scan_zotero($begP); ?>
							<!-- si on veut mettre les OCR avec les scans -->
							<?php print text('/Ocerisations/','BHVP_703983_',$begP); ?><br>	
						</td>
						<td><a href="/pages/panier_export?action=ajout&amp;l=<?= $person->id ?>&amp;n=<?= $name ?>&amp;p=<?= $person->profession_verbatim?>&amp;u=<?= $this->request->getUri(); ?>" onclick="window.open(this.href, '', 
				'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=350'); return false;"><img src="/scans/icon-download.png" title="<?= __('Speichern') ?>" style="width: 20px"></a>
			<td>

						<!--<td>
						<details>
								<summary><?= __('Seite in HD ansehen')?></summary>
									<form>
										<button type='submit' title="IHA zur Nutzung der Seite <?php echo $begP?>" formtarget='_blank' formaction='http://adressbuch1854.dh.uni-koeln.de/scans/HD/BHVP_703983_<?php echo $begP ?>.jpg'
										value="text">BHVP_703983_<?php echo $begP?>.jpg</button>
									</form>
							</details>
										</td>-->
            	</tr>
            	<tr>
            		<th><?= __('Volltexterkennung')?></th>
						<td>
							<details>
								<summary><?= __('Volltext der Seite ansehen')?></summary>
									<form>
										<button type='submit' formtarget='_blank' formaction='/Ocerisations/BHVP_703983_<?php echo $begP ?>.txt'
										value="text">BHVP_703983_<?php echo $begP?>.txt</button>
									</form>
							</details>
						</td>
				</tr>
                <tr>
                    <th><?= __('Nachname') ?></th>
					<td><?= h($person->name_predicate).' '.h($person->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vorname') ?></th>
                    <td><?= h($person->first_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Geschlecht') ?></th>
                    <td><?php
						if($person->gender === 'M'){
							echo 'Männlich';
						} elseif ($person->gender === 'F'){
							echo 'Weiblich';
						} else {
							echo 'Nicht bekannt';
						} ?></td>
                </tr>
                <tr>
                    <th><?= __('Zusatz') ?></th>
                    <td><?= implode(', ', $titles)?></td>
                </tr>
             
                <tr>
                	<th><?= __('Beruf') ?></th>
                	<td><?php if(!empty($person->profession->profession_verbatim)){
				echo $this->Html->link($person->profession->profession_verbatim, ['controller'=>'Profession', 'action'=>'view', $person->profession->id]);
			} ?></td> </tr>
                <tr>
                    <th><?= __('Berufskategorie') ?></th>
                    <td><?= $person->has('prof_category') ? $person->prof_category->name : '' ?></td>
                </tr>
				<tr>
					<th><?=__('Adresse(n)')?></th>
					<td><?php
				if (!empty($person->addresses)){
					echo htmlspecialchars_decode($this->element('addressList', ['addresses' => $person->addresses, 'list' => true]));
				} 
			?></td>
				</tr>
				<?php if($person->has('ldh_rank')) : ?>
                <tr>
                    <th><?= __('Rang der Ehrenlegion') ?></th>
                    <td><?= $person->ldh_rank->rank ?></td>
                </tr>
				<?php endif;?>
                <!--<tr>
                    <th>< __('Sonstige Kategorien') ?></th>
                    <td>
						<table>
							<tr>
								<th>< __('Stand')?></th>
								<th>< __('Militärischer Status')?></th>
								<th>< __('Beruflicher Status')?></th>
							</tr>
							<tr>
								<td><$person->social_status->status?></td>
								<td><$person->military_status->status?></td>
								<td><$person->occupation_status->status?></td>
							</tr>
						</table>
					</td>
                </tr>-->
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
								<td style="border:none"><?=$person->bold ? __('Ja') : __('Nein');?></td>
								<td style="border:none"><?=$person->notable_commercant ? __('Ja') : __('Nein');?></td>
								<td style="border:none"><?=$person->advert ? __('Ja') : __('Nein');?></td>
							</tr>
						</table>
					</td>
                </tr>
            </table>
            <br>
       
            <?php if (!empty($person->companies)) : ?>
            <div class="related">
                <details>
					<?= '<summary title="'.__('Klicken für Details').'"><h4>'.__('Assoziierte Unternehmen').'</h4></summary>' ?>
					<?= $this->element('companiesMultiTable', ['companies' => $person->companies])?>
				</details>
            </div>
            <?php endif; ?>
			<!-- if (!empty($person->external_references)) : ?>
			<div class="related">
                <details>
					 <summary title="<?=__('Klicken für Details') ?>"><h4><?=__('Literatur- und Quellenhinweise')?></h4></summary>
					 $this->element('externalReferenceMultiTable', ['externalReferences' => $person->external_references]) ?>
				</details>
				</div>-->
				<!-- endif; ?>-->
				<br>
			     <div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
				<div class="csl-entry">Zitierhinweis: <?php echo $name ?>, in: Adressbuch der Deutschen in Paris für das Jahr 1854, hg. v. F.A. Kronauge, Paris, S.<?php echo $begP ?>, Elektronische Edition, DHI Paris 2023, <a target="_blank" href='<?php  $this->request->getUri() ?>'><?php echo $this->request->getUri() ?></a>, CC-BY 4.0.</div>
				<?php print zoteroperson($name, $precision2, $military_status, $social_status,$occupation_status, $gender, $ldh, $houseno, $addr_name, $begP);?>
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
	<div id="exporttab" class="tabpanel" style="display:none">
		<div class="row">
		<?= $this->Form->postButton('JSON', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'json'])],['class'=>'button2'])?>
		<?= $this->Form->postButton('XML', ['controller' => '', 'action' => $uri, '?' => array_merge($params, ['export' => 'xml'])],['class'=>'button2'])?>
		</div>
	</div>
</div>

<!-- on met en place un script en json pour que les données puissent être collectées -->

<script type="application/ld+json">
	{
	"@context":"https://schema.org",
	"@type": "Person",
	"address":{
		"@type": "PostalAddress",
		"addressLocality":"Paris",
		"addressRegion": "France",
		"postalCode":"F-75",
		"streetAddress":"<?php echo $houseno. ' ' . $addr_name. ' ('. $addr_new. ')'?>"
	},
	"image":"<?php echo 'https://adressbuch1854.dh.uni-koeln.de/scans/HD/BHVP_703983_'. $begP .'.jpg'?>",
	"jobTitle":"<?php echo $precision2 ?>",
	"name":"<?php echo $name ?>",
	"url":"<?php echo $this->request->getUri() ?>"
}
</script>
</div>
