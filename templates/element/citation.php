<?php
/*
Creates a Citation for the currently shown page. Example:
Zitierhinweis: Eintrag Doctor Karl Müller (P1), in: Adressbuch der Deutschen in Paris für das Jahr 1854, Elektronische Edition, DHI Paris 2020, URL: http://localhost/adressbuch1854/streets/view/1 (Zugriff: 26.02.2020).

$type -> Letter for the entry type (P=person, C=company, S=street, A=arrondissement)
$id ->  id of the shown object
$title -> main title of the object
$url -> the url of the current page
*/

use Cake\I18n\Date;

$idno = $type.'-'.$id;
$bookeditor = 'F. A. Kronauge';
$booktitle = 'Adressbuch der Deutschen in Paris für das Jahr 1854';
$date = new Date();
$date = $date->format('d.m.Y');

$this->Html->css('cite', ['block' => true]);
?>

<div class="citation content">
	<span><?= __('Zitierhinweis').': ' ?></span>
	<?= __('Eintrag').' "'.$title.'" (ID '.$idno.'), '.__('in', 'Zitierhinweis, in: Edition').': '.
		$bookeditor.' ('.__('Hg.').'), '.$booktitle.', '.__('Elektronische Edition').', DHI Paris 2023, URL: '.
		$url.' ('.__('Zugriff am ').$date.').'?>
</div>
