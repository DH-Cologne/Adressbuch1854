<?php
/**
 * Creates a list of all addresses given in the array/query object specified by 'addresses'.
 * Uses a bullet point <ul> when 'list' ist set to 'true' and simple <br> when it's set to false.
 */

if(!isset($list)){
	$list=false;
}
?>
<?= $list ? '<table>' : ''?>
	<?php foreach($addresses as $address): ?>
	<?php
		$housNo = h($address->houseno);
		if(!empty($address->houseno_specification)){
			$housNo.=' '.h($address->houseno_specification);
		}

		$streetOld = h($address->street->name_old_clean);
		$streetNew = h($address->street->name_new);
		$street;
		if($streetOld === $streetNew){
			$street = $housNo.' '.$this->Html->link($streetOld, ['controller' => 'Streets', 'action' => 'view', $address->street->id]);
	
		} else {
			$street= '<tr><th>'.__('Alt Adresse').'</th><th>'.__('Heutige Adresse').'</th></tr>';
			$street.= '<tr><td style="border:none">'.$housNo.' '.$this->Html->link($streetOld, ['controller' => 'Streets', 'action' => 'view', $address->street->id]).'</td><td style="border:none">'.$housNo.' '.$this->Html->link($streetNew, ['controller' => 'Streets', 'action' => 'view', $address->street->id]).'</td></tr>';
	
		
		}
		if(empty($streetNew)){

			$street = $housNo.' '.$this->Html->link($streetOld, ['controller' => 'Streets', 'action' => 'view', $address->street->id]);;	
		}
		$street2;
		if($streetOld === $streetNew){
			$street2 = $housNo.' '.$streetOld;
		} else {
			$street2 = '<ul>'.$housNo.' '.$streetOld.'<br><strong>'.__('Heutige Adresse: ').'</strong>'.$housNo.' '.$streetNew.'</ul>';
		
		}
		if(empty($streetNew)){

			$street2 = $streetOld;		
		}

		$spec = h($address->address_specification_verbatim);

		$lat = $address->geo_lat;
		$long = $address->geo_long;
	?>
	<?php if($list): ?>
	
		<?php
			echo $street ;

			if(!empty($spec)){
				echo ', '.$spec;
			}

            // UNCOMMENT this Code if the geographical coordinates of an address (if existing) themselves
            // shall be shown at this point
			// if(!empty($long) && !empty($lat )){
			// 	echo '<br>'.__('Geokoordinaten').': '.$lat.', '.$long.' '.__('(lat/long)');
			// }
		?>
	
	<?php else: ?>
		<?php
			echo $this->Html->link($street2, ['controller' => 'Streets', 'action' => 'view', $address->street->id]);
		?>
	<?php endif; ?>
	<?php endforeach; ?>
<?= $list ? '</table>' : ''?>
