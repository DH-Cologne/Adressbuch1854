<?php
/*
Info Page Addressbook
*/
?>

<div class="container3">
	<?= $this->Html->script('tab4.js'); ?>
	<div id="tabs2">
    <ul>
        <li onClick="selView(1, this)" style='border-bottom: 2px solid #ED8B00;'><?= __('Adressbuch') ?></li>
        <li onClick="selView(2, this)"><?= __('Herausgeber') ?></li>
        <li onclick="selView(3, this)"><?= __('Bedeutung') ?></li>
    </ul>
</div>
<div id="tabcontent">
<div id="tab1" class="tabpanel" style="display: inline;">
<div class="row2">
    <div class="column-responsive column-80">
		<div class="content4">
			<br>

				<p><?= __('Das 1854 im Eigenverlag von F.A. Kronauge publizierte "Adressbuch der Deutschen in Paris" verzeichnet selbständige Deutsche, die in Paris und den angrenzenden Vororten ansässig waren. Alphabetisch geordnet findet man in diesen frühen "Gelben Seiten“ 4.772 Adressen, ganz überwiegend Handwerker - Tischler, Schreiner, Schneider, Goldschmiede und Drucker -, außerdem Unternehmer, Händler und Bankiers sowie freie Berufe wie Ärzte, Schriftsteller, Architekten, Künstler und Musiker. Auch 286 Frauen sind im Adressbuch verzeichnet, vor allem aus dem Bereich Handwerk und Handel (davon 103 in den Bereichen Mode, Kurzwaren, Weißzeug) sowie Adelige, Lehrerinnen und Hebammen.')?></p>

				<br>
				<div class="image2">
				<a target='_blank' href=https://adressbuch1854.dhi-paris.fr/scans/HD/BHVP_703983_001.jpg>
				<img src='https://adressbuch1854.dhi-paris.fr/scans/SD/BHVP_703983_001.jpg' style="width:180px; float: left; clear: both;" alt="Seite der Adressbuch" title="IHA zur Nutzung der Seite" /></a>
				<a target='_blank' href=https://adressbuch1854.dhi-paris.fr/scans/HD/BHVP_703983_19.jpg>
				<img src='https://adressbuch1854.dhi-paris.fr/scans/SD/BHVP_703983_19.jpg' style="width:172px;" alt="Seite der Adressbuch" title="IHA zur Nutzung der Seite" /></a>
			</div>
					<blockquote class='displayed'>
						<ul>
							<strong><?= __('Titel:') ?></strong>
							 <?= __('Adressbuch der Deutschen in Paris für das Jahr 1854')?>
						</ul>
						<ul>
							<strong><?= __('Untertitel:')?></strong>
							 <?= __('Vollständiges Adressverzeichnis aller in Paris und seinen Vorstädten wohnenden selbständigen Deutschen in alphabetischer Ordnung. Nebst Angaben der Sehenswürdigkeiten und Wohnungen der Gesandten')?>
						</ul>
						<ul>
							<strong><?= __('Herausgeber:')?></strong>
							 <?= __('F. A. Kronauge, Vorsteher des Polyglottischen Instituts')?>
						</ul>
						<ul>
							<strong><?= __('Ort und Verlag:') ?></strong>
						<?= __('Paris, Selbstverlag des Verfassers, Druck vermutlich in Karlsruhe')?>
						</ul>
						<ul>
							<strong><?= __('Jahr:')?></strong>
							 1854 
						</ul>
						<ul>
							<strong><?= __('Preis:') ?></strong>
							 <?= __('5 Franken oder 1 Thaler 10 Groschen')?>
						</ul>
						<ul>
							<strong><?= __('Seitenzahl:')?></strong>
						<?= __('252 (Paginierungsfehler: auf S. 144 folgt S. 161)')?>
						</ul>
						<ul>
							<strong><?= __('Format:')?></strong>
							 8-o
						</ul>
						<ul>
							<strong><?= __('Anzahl der Adressen:') ?></strong>
						 4772</ul>
						<ul>
							<strong><?= __('Aufbewahrungsorte:')?></strong>
							 Bibliothèque historique de la Ville de Paris, Bibliothèque nationale de France <?= __('(2. Auflage, Exemplar stark beschädigt), Universitäts- und Landesbibliothek Düsseldorf, British Library')?>
						</ul><br>

				</blockquote>
			

				
					<p><?= __('Das Buch ist in sieben Abschnitte unterteilt:<ol>')?>
					<?= __('<ul>1)	Verzeichnis der Sehenswürdigkeiten (S. 6-7)</ul>')?>
					<?= __('<ul>2)	Gesandtschaften (S. 8)</ul>') ?>
					<?= __('<ul>3)	"Geschäftsliste": Alphabetisches Verzeichnis geordnet nach Geschäftszweig (S. 9-18)</ul>')?>
					<?= __('<ul>4)	"Adreßliste": Alphabetisches Verzeichnis geordnet nach Nachnamen (S. 19-162 inkl. Paginierungsfehler)</ul>') ?>
					<?= __('<ul>5)	"Straßenliste": Alphabetisches Verzeichnis geordnet nach Straßen (S. 163-245)</ul>')?>
					<?= __('<ul>6)	"Geschäftsliste für In- und Ausland" (S. 246-248)</ul>')?>
					<?= __('<ul>7) "Geschäftsempfehlungen" (S. 249-252).</ul> ') ?>
					</p>

				
					<p><?= __('Im Adressbuch sind Name, teilweise Vorname (häufig abgekürzt), Beruf, Straße(n) und Hausnummer(n) einer Person bzw. eines Betriebs vermerkt. Fettgedruckte Namen weisen darauf hin, dass gleichzeitig eine Anzeige im Adressbuch geschaltet wurde. Ebenso ist vermerkt, wenn die Personen in der Ehrenlegion oder Mitglied des Institut de France waren oder zu den "Notable commerçant" gehörten, was im Adressbuch mit der Abkürzung NC in eckigen Klammern vermerkt ist. Als NC werden die Kaufleute bezeichnet, die die Mitglieder der Handelsgerichte wählten.')?>
					</p>

				
					<p><?= __('Mit der Zusammenstellung der Adressen beabsichtigte der Herausgeber F. A. Kronauge, "unseren Landsleuten usw. ein Mittel darzubieten, durch welches sie sich wieder finden und sich gegenseitig bekannt machen können" (1). Dies sollte gleichermaßen für Geschäftsleute in Paris und in Deutschland wie für Reisende gelten. Auch sollten Nachteile durch die Unkenntnis der französischen Sprache ausgeglichen werden. ')?>
					</p>

				
						<p><?= __('Die Aufnahme in das Adressbuch war kostenlos, nur Anzeigen mussten bezahlt werden (2). Das Buch selbst kostete 5 Francs und wurde in Paris und in Leipzig vertrieben. Es war so erfolgreich, dass bald eine zweite Auflage erschien. Eine Jahreszahl ist in der zweiten Auflage nicht vermerkt, doch wird es vermutlich ebenfalls 1854 oder kurz darauf gewesen sein, denn bis hin zu einem Paginierungsfehler sind beide Ausgaben inhaltlich identisch. Lediglich die Anzahl der Werbeseiten hat sich erhöht. ') ?>
						</p>

				
						<p><?= __('Laut WorldCat sind vier Ausgaben des Adressbuchs in Bibliotheken zugänglich: in Paris in der Bibliothèque nationale de France und in der Bibliothèque historique de la ville de Paris, in der British Library in London sowie in Bonn in der Bibliothek der Friedrich Ebert Stiftung. Als Grundlage für diese Datenbank und die Scans diente das Exemplar der Bibliothèque historique de la ville de Paris (Signatur 703983).') ?></p>
						<br>
					<em>
						<ul>(1) <?= __('Vorrede zur zweiten Auflage')?>.</ul> 
						<ul>(2) <?= __('Insertionsgebühren für ein Jahr: die gespaltene Zeile 1 Franken; die viertel Seite 25 Franken; die halbe Seite 50 Franken; die ganze Seite 100 Franken.') ?></ul>
					</em>
					</div>
				</div>
			</div>
		</div>
		<div id="tab2" class="tabpanel" style="display:none">
			<div class="row2">
				<div class="column-responsive column-80">
					<div class="content5">
						<br>
						<p><?= __('Über den Herausgeber des Adressbuchs der Deutschen in Paris von 1854, F. A. Kronauge, ist wenig zu finden. Eine Suche im Bottin du Commerce von Paris ergab, dass er dort ab 1850 gelistet war als "Professeur de la littérature anglaise et allemande", mit der Adresse 244, St-Honoré. In der Bottin-Ausgabe von 1852 ist er mit der Adresse 28, boulevard des Italiens verzeichnet, 1853 mit der Adresse 57, rue de Richlieu. In der Ausgabe von 1853 taucht das erste Mal das "Institut polyglotte" auf, das er laut Werbeblatt, das im Adressbuch eingelegt war, 1852 gegründet hat (1). Ein gewisser Adamson ist ebenfalls unter der Adresse und dem Institut polyglotte genannt. Aus dem Werbeblatt geht weiter hervor, dass man dort Unterricht in "allen Sprachen" nehmen und Übersetzungen anfertigen lassen konnte. Über dieses Institut lief die Veröffentlichung des Adressbuchs und die darin enthaltenen Anzeigen. Eine Erklärung für die zahlreichen Adressen der Deutschen in Paris im 1. und im 2. Arrondissement könnte sein, dass Kronauge sich in diesen Vierteln am besten auskannte, liegen doch seine Wohnadressen ebenfalls dort.') ?></p>
						<p><?= __('Im Adressbuch der Deutschen in Paris von 1854 hat sich Kronauge als "membre de l’université de Gottingue" eingetragen. 
						In der Ausgabe des Bottin du Commerce ein Jahr später von 1855 ist er mit einer neuen Adresse genannt: 10 bis, Rivoli. 1856 wie auch in den beiden Folgejahren unter 212, Rivoli. 1859 taucht er nicht mehr im Bottin auf.') ?></p>
						<p><?= __('Nachforschungen im Pariser Stadtarchiv zum Institut polyglotte blieben genauso erfolglos wie im Landesarchiv Speyer. Dort wurden Akten vermutet, da für das Adressbuch der Deutschen in Paris zwar der Verlagsort Paris angegeben war, es aber in Kommission bei I. I. Tascher in Kaiserslautern vertrieben wurde und das eingelegte Werbeblatt den Hinweis "Gedruckt bei bei L. Vatter in Kaiserslautern" enthält.') ?></p><br>
						<em>
						<ul>
							<?= __('(1) Das Werbeblatt ist unter der Signatur BHVP_703983_extra_002.jpg zu finden.') ?>
						</ul>
						</em>
					</div>
				</div>
			</div>
		</div>
		<div id="tab3" class="tabpanel" style="display: none;">
			<div class="row2">
				<div class="column-responsive column-80">
					<div class="content5">
						<br>
						<p><?= __('Die Bedeutung des Adressbuchs liegt in der großen Anzahl der darin enthaltenen Adressen. In der Volkszählung von 1851 wurden in Paris 12.245 Deutsche und Österreicher gezählt. Wenn beide Zahlen stimmen, so sind im Adressbuch fast 40% der deutschsprachigen Bevölkerung von Paris aus dem Jahr 1854 erfasst (1). Darüber hinaus stammt das Adressbuch aus einer - was die deutsche Einwanderung betrifft - bisher wenig erforschten Periode und stellt als umfassende nominative Quelle einen Ausgangspunkt für weitere Forschungen dar. ') ?></p>
						<p><?= __('Zu den bekannten Personen im Adressbuch gehören der Dichter Heinrich Heine, der Architekt Jakob Ignaz Hittorff (u.a. Gare du Nord), die Fotografen Charles Reutlinger und Sigismund Gerothwohl, der Sprachpädagoge Heinrich Ottfried Ollendorff, der Paläograph Karl Benedikt Hase, der Orientalist Julius Mohl, der Buchhändler Klincksieck, einige Mitglieder der Familien Rothschild und Oppenheim sowie nicht-deutsche Personen wie der polnische Dichter Adam Mickiewics und der französische Komponist Jean-Madeleine Schneitzhoeffer.')?></p>
						<p><?= __('Die Datenbank dient als Ausgangspunkt für prosopographische Recherchen, da für die Suche nach Einzelpersonen in anderen Quellen des Pariser Stadtarchivs wie Geburts-, Tauf-, Heirats- und Todesregister die Adresse bekannt sein muss. Auch können Personen in den jährlichen Ausgaben des "Bottin du commerce" gesucht werden, um Um- und Wegzüge nachzuvollziehen. Interessant ist außerdem ein Abgleich mit den "calepins du cadastre" in den Archives de Paris: periodische Gebäudeaufnahmen, die jedes einzelne Haus der Stadt mit seinen Wohnungen und Werkstätten beschreibt und darin Mieter und Mietpreise verzeichnet.')?> </p><br>

						<em>
						<ul>
							<?= __('1. König, Mareike: Georg Kibler, Möbelbauer, Rue de Charonne 39: Adreßbuch der Deutschen in Paris für das Jahr 1854, in: Francia. Forschungen zur westeuropäischen Geschichte 30/3 (2003), S. 143-156.') ?> <a target='blank' href='https://doi.org/10.11588/fr.2003.3.45497'>https://doi.org/10.11588/fr.2003.3.45497</a>
						</ul>
						</em>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
