<?php
/*
Creates a table containing the main information about multiple companies. It uses the given array or query object with the variable name $companies.
$count: Adds a numbering if 'count' is set to true.
$offset: Number, by which the count should be increased
$addrAsList: Uses a list of addresses (instead of simple breaks) if addrAsList is set to true;
*/

if(!isset($count)){
	$count=false;
}

if(!isset($offset)){
	$offset=0;
}

if(!isset($addrAsList)){
	$addrAsList=false;
}

$this->Html->css('multiTable.css');
?>

<div class="table-responsive">
	<table>
		<tr>
			
			
			
			<th><?= __('Name') ?></th>
			<th><?= __('Beruf') ?></th>
			<th><?= __('Adresse(n)') ?></th>
			<th><?= __('Kategorien') ?></th>
		</tr>
		<?php
		$countNo = 1 + $offset;
		foreach ($companies as $company): ?>
		<?php require_once(__DIR__.'/../functions/functions.php');
	require(__DIR__.'/../functions/varscomp.php'); ?>
		<?php
			$cats = [];
			if($company->has('prof_category')){
				array_push($cats, $company->prof_category->name);
			}

			$plus = [];
			if($company->bold){
				array_push($plus, __('Vorab-Abonnent'));
			}
			if($company->notable_commercant){
				array_push($plus, 'Notable Commerçant');
			}
			if($company->advert){
				array_push($plus, __('mit Geschäftseintrag'));
			}
		?>
		<tr>
			
			
			
			<td><?= $this->Html->link(h($company->name), ['controller' => 'Companies', 'action' => 'view', $company->id]) ?></td>
			<td><?php if(!empty($company->profession->profession_verbatim)){
				echo $this->Html->link($company->profession->profession_verbatim, ['controller'=>'Profession','action'=>'view', $company->profession->id]);
				}else{
					echo __('Unbekannt');
				} ?></td>
			<td><?php
				if ($company->addresses[0]['street_id']!= 1032){
					echo htmlspecialchars_decode($this->element('addressList', ['addresses' => $company->addresses, 'list' => $addrAsList]));
				}else{
					echo __('Unbekannt');
				}
			?></td>
			<td class="middle-width"><?= implode(', ', $cats)?></td>

			<!-- on ajoute la possiblité d'enregistrer nos recherches dans un panier pour exporter à la fin -->

			<td><a href="/pages/panier_export?action=ajout&amp;l=<?= $company->id ?>&amp;n=<?= $company->name?>&amp;p=<?= $company->profession_verbatim?>&amp;u=<?= $this->request->getUri() ?>" onclick="window.open(this.href, '', 
		'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=800, height=350'); return false;"><img src="/scans/icon-download.png" title="<?= __('Speichern') ?>" style="width: 20px"></a><td>
		</tr>
		<?php print zoterocomp($nachname, $prof_category, $profession, $addr_no, $addr_old, $company->original_references[0]['scan_no']);?>
		<script type="application/ld+json">
	{
	"@context":"https://schema.org",
	"@type": "Organization",
	"address":{
		"@type": "PostalAddress",
		"addressLocality":"Paris",
		"addressRegion": "France",
		"postalCode":"F-75",
		"streetAddress":"<?php if(!empty($company->addresses[0]['street']['name_old_clean'])) echo $company->addresses[0]['houseno'].' '.$company->addresses[0]['street']['name_old_clean'] ?>"
	},
	"jobTitle":"<?php if(!empty($company->profession->profession_verbatim)) echo $company->profession->profession_verbatim ?>",
	"name":"<?php echo $company->name ?>",
	"url":"<?php echo 'https://adressbuch1854.dh.uni-koeln.de/companies/view/'.$company->id ?>"
}
</script>
		<?php
			$countNo++;
			endforeach;
		?>
	</table>
</div>
