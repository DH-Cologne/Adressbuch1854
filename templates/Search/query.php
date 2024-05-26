<?php
	// Defining the options-arrays for the search form

/*	$optionsArrMod = [];
	$optionsArrOld = [];
	$optionsRank = [];
	$optionsSoc = [];
	$optionsMil = [];
	$optionsOcc = [];
	$optionsCat = [];
	$optionsComp = [];

	foreach($arrondissements as $arr){
		$id = $arr->id;
		$no = $arr->no;
		$type = $arr->type;
		if($type == 'pre1860'){
			$type = __('alt');
			if($no == 1){
				array_push($optionsArrOld, [$id => $no.'ier ('.$type.')']);
			} else {
				array_push($optionsArrOld, [$id => $no.'ième ('.$type.')']);
			}
		} else {
			$type = __('modern');
			if($no == 1){
				array_push($optionsArrMod, [$id => $no.'ier ('.$type.')']);
			} else {
				array_push($optionsArrMod, [$id => $no.'ième ('.$type.')']);
			}
		}
	}
	foreach($ranks as $rank){
		$id = $rank->id;
		$name = $rank->rank;
		array_push($optionsRank, [$id => __($name)]);
	}

	foreach($socialStatuses as $socialStat){
		$id = $socialStat->id;
		$status = $socialStat->status;
		array_push($optionsSoc, [$id => __($status)]);
	}

	foreach($militaryStatuses as $militaryStat){
		$id = $militaryStat->id;
		$status = $militaryStat->status;
		array_push($optionsMil, [$id => __($status)]);
	}

	foreach($occupationStatuses as $occupationStat){
		$id = $occupationStat->id;
		$status = $occupationStat->status;
		array_push($optionsOcc, [$id => __($status)]);
	}

	foreach($categories as $cat){
		$id = $cat->id;
		$name = $cat->name;
		array_push($optionsCat, [$id => __($name)]);
	}
*/
	$ar_new = ['Alle','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];
	$ar_old = ['Alle','1','2','3','4','5','6','7','8','9','10','11','12'];
	$rank = ['Alle','Chevalier', 'Commandeur', 'Officier', 'Grand-Officier', 'Grand-Croix'];
	$beruf = ['0'=>'Alle','1'=>'Adel','2'=>'Angestellte','3'=>'Beamte', '4'=>'Handel','5'=>'Handwerk','6'=>'Künstler','7'=>'Militär','8'=>'Rentner','9'=>'Selbstständig','10'=>'Sonstiges','11'=>'Unbekannt'];

?>
<div class="container2">
<div class="row2">
    <div class="column-responsive column-80">
        <div class="search form content4">
		<h5 class="heading"><?= __('Freitextsuche')?></h5>
		<?= $this->Form->create(null, ['type' => 'get', 'url' => '/search/results', 'style'=>'display:flex']) ?>
                <?php
                // Set parameter for search type to "simple"
                echo $this->Form->hidden('type', ['value' => 'simp']);
                echo $this->Form->control('text', ['maxlength' => 256, 'label' => false, 'class'=>'textarea2']);?>
                <?= $this->Form->button(__('Start'), ['class' => 'button_home2']) ?>
                <?= $this->Form->end() ?>
            <fieldset>
			<?= $this->Form->create($persons, ['type' => 'get', 'url' => '/search/results']) ?>
				<?php
				
					// Set parameter for search type to "detailed"
					echo $this->Form->hidden('type', ['value' => 'det']);
				?>
                <div class="form names">
				<h5 class="heading"><?= __('Personen- oder Firmenname')?></h5>
				<?php
                    echo $this->Form->control('name', ['label' => __('Name')]);
                    echo $this->Form->control('first_name', ['label' => __('Vorname')]);
					echo $this->Form->label('gender', __('Geschlecht'));
					//echo $this->Form->radio('gender', [['value' => 'm', 'text' => __(' Männlich')], ['value' => 'f', 'text' => __(' Weiblich')]], ['hiddenField' => false]);
					$genre = ['m'=>'männlich', 'f'=>'weiblich', 'unbekannt'=>'unbekannt'];
					echo $this->Form->select('gender', $genre, ['empty'=>true]);
					//echo $this->Form->checkbox('gender', ['value'=>'m'],['hiddenfield'=>false]);
					//echo $this->Form->checkbox('gender', ['value'=>'f'],['hiddenfield'=>false]);
                ?>
				</div>
				<div class="form profession">
				<?php
					echo $this->Form->control('prof', ['label' => __('Beruf')]);

					// echo $this->Form->label('prof_cat', __('Berufskategorie'));
					// echo $this->Form->select('prof_cat', $beruf, ['empty' => true]);
				?>
				</div>
				<div class="form address">
				<?php
                    echo $this->Form->control('street', ['label' => __('Straße')]);
					echo $this->Form->label('arr_new', __('Arrondissement neu').' ('.__('nach 1860').')');
					echo $this->Form->select('arr_new', $ar_new, ['empty' => true]);
					echo $this->Form->label('arr_old', __('Arrondissement alt').' ('.__('vor 1860').')');
					echo $this->Form->select('arr_old', $ar_old, ['empty' => true]);
                ?>
				</div>
				<div class="form persAttributes">
				
				<?php

					echo $this->Form->label('ldh_rank', __('Rang der Légion d\'Honneur'));
					echo $this->Form->select('ldh_rank', $rank, ['empty' => true]);

					// echo $this->Form->label('institut', __('Mitglied des Institut de France?').' (de l\'Institut)');
					// echo $this->Form->radio('institut', [['value' => '1', 'text' => __(' Ja')], ['value' => '0', 'text' => __(' Nein')]], ['hiddenField' => false]);

					/*echo $this->Form->label('soc_stat', __('Sozialer Stand'));
					echo $this->Form->select('soc_stat', $optionsSoc, ['empty' => true]);

					echo $this->Form->label('mil_stat', __('Militärstatus'));
					echo $this->Form->select('mil_stat', $optionsMil, ['empty' => true]);

					echo $this->Form->label('occ_stat', __('Beruflicher Status'));
					echo $this->Form->select('occ_stat', $optionsOcc, ['empty' => true]);*/

					echo $this->Form->label('bold', __('Hat das Adressbuch vorabonniert').' '.__('(im Buch fett gedruckt)?'));
					echo $this->Form->radio('bold', [['value' => '1', 'text' => __(' Ja')], ['value' => '0', 'text' => __(' Nein')]], ['hiddenField' => false]);

					echo $this->Form->label('advert', __('Hat einen Eintrag in der Geschäftsliste?'));
					echo $this->Form->radio('advert', [['value' => '1', 'text' => __(' Ja'), 'id' => 'publicity-1'], ['value' => '0', 'text' => __(' Nein'), 'id' => 'publicity-0']], ['hiddenField' => false]);
					
					echo $this->Form->label('notable_commercant', __('Notable commercant [NC]?'));
					echo $this->Form->radio('notable_commercant', [['value' => '1', 'text' => __(' Ja')], ['value' => '0', 'text' => __(' Nein')]], ['hiddenField' => false]);
				?>
				</div>

			<?= $this->Form->button(__('Suche')) ?>
			<?= $this->Form->button(__('Reset'), array('type'=>'reset')); ?>
            <?= $this->Form->end() ?><br>
			<p><?= __('Tipp: Probieren Sie verschiedene Schreibweisen von Personen- und Straßennamen aus (mit und ohne Umlaute z.B.) und suchen Sie zunächst ohne Vornamen, da diese häufig nicht vorhanden oder abgekürzt sind.')?></p>
        </div>
    </div>
</div>
</div>