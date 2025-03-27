<?php
/*
Info Page Project
*/
?>
<div class="container3">
	<?= $this->Html->script('tab5.js'); ?>
	<!-- on met en place les tabs pour les onglets -->
<div id="tabs2">
    <ul>
        <li onClick="selView(1, this)" style="border-bottom:2px solid #ED8B00;"><?= __('Datenbank') ?></li>
		<li onClick="selView(2, this)"><?= __('Karte') ?></li>
        <li onClick="selView(3, this)"><?= __('Dokumentation') ?></li>
        <li onclick="selView(4, this)"><?= __('Publikationen') ?></li>
    </ul>
</div>
<div id='tabcontent'>
<div id='tab1' class='tabpanel' style='display:inline'>
<div class="row2">
    <div class="column-responsive column-80">
		<div class="content4">
			<br>
			<p><?= __('Dies ist die zwischen 2020 und 2024 vollständig überarbeitete Datenbank „Adressbuch der Deutschen in Paris von 1854“. Eine erste Version war 2006 online gestellt worden (siehe unten). Die Neufassung zielte auf die <em>FAIRification</em> der Daten, die Digitalisierung des Druckexemplars, den Relaunch der Website sowie die Visualisierung der Daten auf einer historischen Karte. Für alle Anwendungen wurde Open Source-Software eingesetzt. Der Code ist bei GitHub hinterlegt (siehe Dokumentation). Ein Export der Daten ist in den Formaten SQL, CSV, XML und JSON möglich. Der vollständige Datensatz kann auf der Website unter dem Download-Icon und unter <a target="blank" href="https://creativecommons.org/licenses/by/4.0/deed.fr">CC-BY 4.0</a> bei Zenodo heruntergeladen werden: <a target="blank" href="https://doi.org/10.5281/zenodo.5524879"><img src="https://zenodo.org/badge/DOI/10.5281/zenodo.5524879.svg" alt="DOI"></a>') ?></p>

			<h4><?= __('Angaben aus dem Adressbuch') ?></h4>
			<p><?= __('Die Datenbank enthält alle Angaben aus dem "Adressbuch der Deutschen in Paris" von 1854: Name, Vorname (sofern vorhanden), Straße, Hausnummer und Beruf.')?></p>

			<p><?= __('Ein den Namen in eckigen Klammern hinzugefügtes [NC] steht für „Notable commerçant“, das sind die Kaufleute, die die Mitglieder der Handelsgerichte wählten. Ebenso ist vermerkt, ob die Personen Mitglied des Institut de France waren, ob sie das Adressbuch vorabonniert hatten (im Buch fett gedruckt) und ob sie einen Eintrag in der Geschäftsliste hatten. Manche Namen sind mit einem Stern versehen: Diese Person war Chevalier der Légion d’honneur (1). Weitere Abkürzungen für die Ränge der Ehrenlegion sind:') ?>
			<li><?= __('* Chevalier')?></li>
			<li><?= __('O. * Officier')?></li>
			<li><?= __('C. * Commandeur')?></li>
			<li><?= __('G. * Grand-Officier')?></li>
			<li><?= __('G. C. * Grand-Croix')?></li>
			</p>
			
			
			<p><?= __('Im Adressbuch selbst sind die Kennzeichen und Abkürzungen nicht erklärt. Sie wurden jedoch üblicherweise in den "Bottin du commerce" verwendet, den damaligen Adressbüchern für Handel und Wirtschaft.') ?></p> 
			
			<h4><?= __('Hinzugefügte Angaben') ?></h4>

			<p><?= __('Folgende Angaben wurden recherchiert und der Datenbank hinzugefügt:')?>
			<li><?= __('Die Berufsangaben wurden mit der Ontologie historischer, deutschsprachiger Berufs- und Amtsbezeichnungen (OhdAB) angereichert (siehe Reiter "Dokumentation").') ?></li>
			<li><?= __('Zur Identifikation der Straßen wurden sowohl das damalige und das aktuelle Arrondissement als auch der aktuelle Name der Straße mitangegeben (2). ')?></li>
			<li><?= __('Vermerkt wurde bei den Einträgen ebenfalls, ob es sich um einen Mann oder um eine Frau handelt.')?></li>
			</p>

			<p><?= __('Die Zuweisung der Berufe zur OhdAB war nicht immer eindeutig. Ist als Beruf z.B. ein Produkt angegeben wie "Uhren", "Bettzeug" oder "Billardbälle", so kann diese Person gleichermaßen dem Handel und dem Handwerk (Produktion) zugewiesen werden. Wir haben uns in solchen Fällen für eine Zuordnung zum Vertrieb/Handel entschieden. Im Einzelfall müsste dies bei einer Weiterverwendung nachgeprüft werden.') ?></p>

			<p><?= __('Nicht immer eindeutig ist ebenso die Zuweisung des Geschlechts: Fr. kann die Abkürzung für Frau oder für einen männlichen Vornamen sein. Beides kam vor. Einer Person wurde dann "weiblich" zugeordnet, wenn es eindeutig war, z.B. durch die Berufsbezeichnung (Bäckerin, Lehrerin o.ä.) bzw. wenn der Beruf es nahelegt (z.B. Hebamme, Weißzeug). Auch hier muss eine Prüfung im Einzelfall stattfinden.')?></p>

			<p><?= __('Manche Straßen konnten nicht identifiziert werden, in manchen Fällen konnte das Arrondissement nicht klar ermittelt werden, z.B. wenn eine Straße zwei Arrondissements voneinander trennt. In diesem Fall sind alle angrenzenden Arrondissements genannt. Ggf. muss anhand der Hausnummer in den "Calepins de Cadastre" (periodische Häuserbestandsaufnahmen) in den Archives de Paris die Zugehörigkeit ermittelt werden. Existiert eine Straße nicht mehr, so ist dies vermerkt. Konnte der neue Name nicht ermittelt werden oder wurde sie in zu viele neue Straßen aufgeteilt und eine Zuordnung war nicht möglich, so steht ein "?".')?></p>


			<h4><?= __('Editionsgrundsätze') ?></h4>
			<p><?= __('Die Rechtschreibung der Angaben im Adressbuch wurde beim Übertrag in die Datenbank in Teilen korrigiert und vereinheitlicht. Bei jeder Person ist das Digitalisat der entsprechenden Seite aus dem Adressbuch angegeben und die Angaben können dort überprüft werden. ') ?></p> 

			<h5><?= __('Geändert wurde') ?></h5>
			<li><?= __('Die Groß- und Kleinschreibung bei Straßennamen wurde vereinheitlicht: rue, boulevard, cour etc. immer klein geschrieben, die eigentlichen Straßennamen sind groß geschrieben, z.B. "rue d\'Austerlitz".') ?></li>
			<li><?= __(' Abkürzungen in Straßennamen wurden ergänzt, z.B. Nve = Neuve.') ?></li>
			<li><?= __('Fehlte bei den Straßennamen der Zusatz "rue de" oder "place de" so wurde dieser hinzugefügt.') ?></li>

			<h5><?= __('Nicht geändert wurde') ?></h5>
			<li><?= __('Die alte Schreibweise der Berufe wurde beibehalten (z.B. Eigenthümer). Offensichtliche Tippfehler wurden korrigiert, die verschiedenen Benennungen aber nicht vereinheitlicht, z.B. Schuh-Händler und Schuhhändler.') ?></li>
			<li><?= __('Die Verwendung von "und", "u." oder "&"  ist im Buch und damit auch in der Datenbank unheitlich. Das gilt auch für Witwe, abgekürzt mit  "Wwe.", "Wtw.",  "Wtwe."') ?></li>
			
			<li><?= __('Leere Felder bedeuten, dass keine Angabe gemacht wurden.') ?></li>


			<h4><?= __('Erste Version der Datenbank 2006') ?></h4>

			<p><?= __('An der 2006 veröffentlichten ersten Version der Datenbank haben neben der Projektleiterin Dr. Mareike König folgende Personen mitgewirkt: Gaël Cheptou (Wissenschaftliche Mitarbeit, Datenerfassung), Gaëtan Langhade und Sebastian Hamel (Technische Mitarbeit). Das Projekt wurde damals unterstützt durch die Gerda Henkel Stiftung (Düsseldorf) und die Gesellschaft der Freunde des DHIP.') ?></p>
			<br>
				
				<em>
					<p><?= __('(1) In der Datenbank LEONORE der Archives Nationales können die Namen der mit der Légion d’honneur ausgezeichneten Personen für eine weitere Recherche nachgeschlagen werden: ') ?><a target='blank' href='https://www.leonore.archives-nationales.culture.gouv.fr/ui/'>https://www.leonore.archives-nationales.culture.gouv.fr/ui/</a></p>
				</em>
				<em>
					<p><?=__('(2) Hillairet, Jacques, Dictionnaire historique des rues de Paris, Paris 1963.')?></p>
				</em>
				
				  <br>
				  <hr>
			</div>
		</div>
	</div>
</div>
<div id='tab2' class='tabpanel' style='display:none'>
	<div class="row2">
		<div class="column-responsive column-80">
		<div class="content5">
		<h4><?= __('Karte')?></h4>
			
			<p> <?= __('Für die Visualisierung der Adressen wurde ein farbiger Stadtplan von Paris aus dem Bestand des französischen Generalstabs von 1820-1866 verwendet (1) und über eine aktuelle Karte und die heutigen Daten gelegt. ') ?></p>
			<p><?= __('Ein Klick auf die Karte zeigt alle Adressen aus dem Adressbuch. Zur Anzeige ausgewählt werden können Personen, Unternehmen oder beides. Beim Klick auf den Marker öffnet sich ein Popup mit den Angaben aus dem Adressbuch.') ?></p>
			<p><?= __('Die Marker auf der Karte geben nicht immer die exakte Hausnummer an, da die Daten nicht für alle Adressen zur Verfügung standen. In rund der Hälfte der Fälle zeigen die Marker daher auf die Straßenmitte.') ?></p>
			<p><?= __('Einzelergebnisse und Ergebnislisten nach der Suche können ebenfalls auf der Karte angezeigt werden, per Klick auf „Karte“ oben links neben dem Namen. Bei Ergebnislisten in der Suche werden jeweils nur die ersten 20 Resultate angezeigt.')?></p>
			<p><?= __('Über die Auswahl auf der rechten Seite können die verschiedenen Schichten der Karten (historischer und moderner Plan, Grenzen der Arrondissements) ein- oder ausgeschaltet werden.')?></p>
			<br>
			<em>
					<p><?= __('(1) Géoportail, carte de l’état-major (1820-1866), ') ?><a target='blank' href='https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866'>https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866</a></p>
				</em>
			</div>
			</div>
			</div>
			</div>
<div id='tab3' class='tabpanel' style='display:none'>
	<div class="row2">
		<div class="column-responsive column-80">
		<div class="content4">
			<br>
			<p><?= __('Diese Dokumentation erklärt die Funktionsweise und den Aufbau der Datenbank und ihrer Website.') ?></p>
			<h4><?= __('Die neue Datenbank') ?></h4>
			<p><?= __('In einem ersten Schritt wurden die Daten bearbeitet, um eine breitere Nutzung zu ermöglichen. Die von Hand erfassten Daten wurden bereinigt und strukturiert, um sie mit Norm- und Metadaten anreichern zu können. Ein Ziel war, die zuvor unter Copyright gestellten Daten unter einer freien Lizenz zugänglich zu machen und damit den guten Praktiken des Umgangs mit Forschungsdaten zu entsprechen. ')?></p>


			<p><?= __('Eine Herausforderung bei der Strukturierung war die Berücksichtigung der Pariser Stadtgeschichte des 19. Jahrhundert, gab es doch zwischen 1854 und heute zahlreiche Veränderungen. So fand 1860 eine Erweiterung der Stadt um die anliegenden Viertel statt und die Anzahl der Arrondissements wurde von zwölf auf 20 Arrondissements erhöht und eine neue Zählung eingeführt. Einige der Straßen, die im Adressbuch aufgeführt sind, haben ihren Namen geändert oder sind verschwunden im Zuge der großen Stadtumbauten unter Präfekt Hausmann in den 1850/60er Jahren. Folglich musste die Modellierung der Daten so ausfallen, dass sie den historischen Veränderungen gerecht wird, während zugleich eine effiziente Navigation in der neuen Weboberfläche und insbesondere der interaktiven Karte ermöglicht werden sollte. Das Datenmodell wurde mit der Software Mocodo erstellt, ein Online-Tool für die Konzeption relationaler Datenbanken. Die Datenbank wurde mit MySQL programmiert und wird mit phpMyAdmin verwaltet. Sie enthält insgesamt 21 Tabellen, darunter die Datentabellen und die Assoziationstabellen. ')?></p>
			<h4><?= __('Die Extraktion und Bereinigung von Daten') ?></h4>
			<p><?= __('Das Bereinigen und Anreichern der Daten wurde mit der Open-Source-Software OpenRefine durchgeführt, die zugleich den Export in zahlreiche Formate ermöglicht, darunter SQL, was beim Einfügen von Daten in die Datenbank sehr nützlich war. Die ursprünglichen Daten wurden als CSV-Datei mit UTF-8 aus FileMaker extrahiert, um sie anschließend ohne proprietäre Software weiterverarbeiten zu können. Der UTF-8-Standard ermöglicht die Erkennung aller in der CSV-Datei enthaltenen Sonderzeichen und ist auch mit anderen Standards wie dem ASCII-Standard rückwärtskompatibel. Die Daten wurden mithilfe von regulären Ausdrücken der Sprache GREL bereinigt. Schließlich wurden die Straßennamen mit Wikidata angereichert. ')?></p>
			<h4><?= __('Die Karte') ?></h4>
			<p><?= __('Die Karte wurde mit der Open-Source-Software Leaflet erstellt. Diese ermöglicht es, eine interaktive Karte zu entwickeln und die im Adressbuch aufgeführten Personen zugleich auf einer historischen und modernen Karte zu lokalisieren. Mit dem Plugin Opacity-Controls können historische und moderne Karten übereinandergelegt werden und zeigen so die Veränderungen an. Die Daten werden von mehreren Vektordateien dargestellt wie den alten (vor 1860) und aktuellen Arrondissements sowie den Stadtvierteln von Paris, sie sind mit dem Plugin Leaflet-Shapefile implementiert.')?></p>
			<p><?= __('Die Daten zu den Straßen und den alten Arrondissements stammen aus dem ALPAGE-Projekt des LAMOP der Universität Paris 1 Panthéon Sorbonne. Die Daten zu den neuen Arrondissements stammen aus Paris OpenData. Die historische Karte stammt aus dem Katalog von Géoportail. Es handelt sich um eine Karte des französischen Generalstabs aus der Zeit zwischen 1820 und 1866. Die Marker zeigen, sofern die Geo-Daten vorlagen, direkt auf die jeweilige Hausnummer, ansonsten zeigen sie auf die Straßenmitte.') ?></p>
			<h4><?= __('Klassifizierung der Berufe') ?></h4>
			<p><?= __('Die Angaben zu den Berufen wurden angereichert mit Normdaten aus der <a target="blank" href="https://www.geschichte.uni-halle.de/struktur/hist-data/ontologie/">Ontologie historischer, deutschsprachiger Berufs- und Amtsbezeichnungen (OhdAB)</a>, die am Historischen Datenzentrum der Martin-Luther-Universität Halle-Wittenberg unter Leitung von Dr. Katrin Moeller entsteht. Basis dafür ist die <a target="blank" href="https://de.wikipedia.org/wiki/Klassifikation_der_Berufe_2010">Klassifizierung der Berufe (KldB)</a> der Bundesagentur für Arbeit und des Statistischen Bundesamtes aus dem Jahr 2010, der wiederum die International Standard Classification of Occupations (ISCO) des International Labour Office zugrunde liegt (ILO 2008). Die KldB wurde am Historischen Datenzentrum in Halle überarbeitet und in Teilen erweitert und damit für die Klassifizierung historischer Berufe nutzbar gemacht. Insgesamt werden mit OhdAB bisher mehr als 44.000 historische Berufe taxonomisch geordnet und können in Berufsbereiche, Berufshauptgruppen oder unterschiedlich differenzierten Berufsgruppen geordnet werden. Die Nummern umfassen jeweils drei Bestandteile: den Buchstaben A (keine Amts- oder Berufsbezeichnung im engeren Sinne, sondern Besitzer, Schüler etc.) oder B (Amts- oder Berufsbezeichnung), dann folgt fünfstellig die Taxonomie (siehe dazu die Gliederung im <a target="blank" href="https://de.wikipedia.org/wiki/Klassifikation_der_Berufe_2010">Wikipedia-Eintrag zur KldB</a>) und dann die Individualnummer. Die erste Zahl im fünfstelligen Code zeigt den Berufsbereich an. Die letzte Zahl in der Taxonomie gibt das Anforderungsniveau an, etwa Helfer- und Anlerntätigkeit bis hin zu komplexen Spezialistentätigkeiten. Wir geben in der Datenbank neben der OhdAB-Gesamtnummer als Verbatim-Eintrag den Berufsbereich (Einsteller) und das Anforderungsniveau an (1). Anhand der Gesamtnummer kann den Bezeichnungen ein normierter Berufsgattungsname zugewiesen werden. Ebenfalls angegeben sind die Q-Nummern der Berufseinträge bei <a href="https://database.factgrid.de/wiki/FactGrid:OhdAB-Datenbank" target="blank">FactGrid<\a>, zur Verwendung für Linked Open Data und RDF. ') ?></p>
			<h5><?= __('Weiterführende Literatur OhdAB') ?></h5>
			<p><?= __('Katrin Moeller: Standards für die Geschichtswissenschaft! Zu differenzierten Funktionen von Normdaten, Standards und Klassifikationen für die Geisteswissenschaften am Beispiel von Berufsklassifikationen, in: Jana Kittelmann und Anne Purschwitz (Hg.), Aufklärungsforschung digital. Konzepte, Methoden, Perspektiven, Halle 2019, S. 17-43.') ?></p>
			<p><?= __('Katrin Moeller und Jan Michael Goldberg: Automatisierte Identifikation und Lemmatisierung historischer Berufsbezeichnungen in deutschsprachigen Datenbeständen, in: Zeitschrift für digitale Geisteswissenschaften, Wolfenbüttel 2022, DOI: <a target="blank" href="https://zfdg.de/2022_002">10.17175/2022_002</a>.')?></p>
			<h4><?= __('JSON-LD und Zotero') ?></h4>
			<p><?= __('Die Metadaten des Projekts sind im JSON-LD-Format ausgezeichnet und sind mithilfe des html-Tags "script" in den Quellcode der Anwendung geschrieben. Darüber können sie und ihre Verknüpfungen von Anwendungen wie dem OpenLink Structured Data Sniffer genauso ausgelesen werden wie von Suchmaschinen. Dies ermöglicht eine bessere Interoperabilität der Daten mit anderen Anwendungen und ein besseres Ranking in Suchmaschinen. Die Projektdaten können ebenso mit Zotero gespeichert werden. Html-Tags "span" werden mit einem PHP-Skript erstellt, damit die Projektdaten mit Zotero auffindbar und interoperabel sind.')?></p>
			<h4><?= __('Die Website') ?></h4>
			<p><?= __('Die Website ist mit der Open-Source-Software CakePHP programmiert.') ?></p>
			
			<h4><?= __('Software')?></h4>
<table>
<tr>
		<td>
			Cake PHP, (4x). Windows, PHP, <a target="blank" href="https://cakephp.org/">https://cakephp.org/</a>
		</td>
	</tr>
	<tr>
		<td>
			Github, <a target="blank" href="https://github.com/dhi-digital-humanities/Adressbuch1854">https://github.com/DH-Cologne/Adressbuch1854</a>
		</td>
	</tr>
	<tr>
		<td>
			Leaflet, <a target='blank' href='https://leafletjs.com'>https://leafletjs.com</a>
		</td>
	</tr>
	<tr>
		<td>
			Leaflet-Shapefile, <a target='blank' href='https://github.com/calvinmetcalf/leaflet.shapefile'>https://github.com/calvinmetcalf/leaflet.shapefile</a>
		</td>
	</tr>
	<tr>
	</tr>

<td>
	Opacity-Controls, <a target='blank' href='https://github.com/lizardtechblog/Leaflet.OpacityControls'>https://github.com/lizardtechblog/Leaflet.OpacityControls</a>
</td>
</tr>
	<tr>
		<td>
			Open Refine, (3.4.1). Windows, Java, <a target="blank" href="https://openrefine.org/">https://openrefine.org/</a>
		</td>
	</tr>
	<tr>
		<td>
			phpMyAdmin, (5.1.1). Windows, PHP/Javascript, <a target="blank" href="https://www.phpmyadmin.net">https://www.phpmyadmin.net</a>
		</td>

</table>
		<h4><?= __(' Datenlieferanten') ?></h4>
<table>
<tr>
		<td>
			ALPAGE, <a target='blank' href='https://alpage.huma-num.fr/'>https://alpage.huma-num.fr/</a>
		</td>
	</tr>
	<tr>
			<td>
			Géoportail, carte de l’état-major (1820-1866), <a href="https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866">https://www.geoportail.gouv.fr/donnees/carte-de-letat-major-1820-1866</a>
			</td>
		</tr>
		<tr>
			<td>
			Paris Open Data, <a href="https://opendata.paris.fr/explore/dataset/arrondissements/map/?disjunctive.c_ar&disjunctive.c_arinsee&disjunctive.l_ar&basemap=jawg.dark&location=12,48.85889,2.34692">https://opendata.paris.fr/explore/dataset/arrondissements/</a>
			</td>
		</tr>
		<tr>
			<td>
			Ontologie historischer, deutschsprachiger Berufs- und Amtsbezeichnungen (OhdAB), <a href="https://database.factgrid.de/wiki/FactGrid:OhdAB-Datenbank" target="blank">FactGrid<\a> 
			</td>
		</tr>
		<tr>
			<td>
			Wikidata, <a href="https://www.wikidata.org/wiki/Wikidata:Main_Page">https://www.wikidata.org/wiki/Wikidata:Main_Page</a>
			</td>
		</tr>
</table>
	</div>
</div>
</div>
</div>
<div id="tab4" class="tabpanel" style="display: none;">
	<div class="container">
	<div class="row2">
		<div class="content4">
		<br>
		<h5><?= __('Verwendete Nachschlagewerke') ?></h5>
	<table>
		<tr>
		<td>
			<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
 			<div class="csl-entry">Hillairet, Jacques: Dictionnaire historique des rues de Paris, Paris 1963.</div>
  			<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=book&amp;rft.btitle=Dictionnaire%20historique%20des%20rues%20de%20Paris&amp;rft.place=Paris&amp;rft.aufirst=Jacques&amp;rft.aulast=Hillairet&amp;rft.au=Jacques%20Hillairet&amp;rft.date=1963"></span></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
  			<div class="csl-entry">Noizet, Hélène, Bove, Boris, Costa, Laura (Hg.): Paris de parcelles en pixels. Analyse géomatique de l’espace parisien médiéval et moderne, Paris 2013.</div>
  			<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=book&amp;rft.btitle=Paris%20de%20parcelles%20en%20pixels.%20Analyse%20g%C3%A9omatique%20de%20l'espace%20parisien%20m%C3%A9di%C3%A9val%20et%20moderne&amp;rft.place=Paris&amp;rft.publisher=Presses%20universitaires%20de%20Vincennes%20-%20Comit%C3%A9%20d'histoire%20de%20la%20ville%20de%20Paris&amp;rft.aufirst=H%C3%A9l%C3%A8ne&amp;rft.aulast=Noizet&amp;rft.au=H%C3%A9l%C3%A8ne%20Noizet&amp;rft.au=Boris%20Bove&amp;rft.au=Laura%20(dir.)%20Costa&amp;rft.date=2013"></span></div>
		</td>
	</tr>
	<tr>
		<td>
			Nomenclature officielle des voies de Paris, <a target="blank" href="https://capgeo.sig.paris.fr/Apps/NomenclatureVoies/">https://capgeo.sig.paris.fr/Apps/NomenclatureVoies/</a> .
		</td>
	</tr>
	<tr>
		<td>
			<?= __('Siehe auch die Angaben zu den Datenlieferanten sowie weitere Hinweise auf der Seite "Dokumentation".') ?>
		</td>
	<tr>
</table>
<h5><?= __('Publikationen zum Projekt') ?></h5>
<table>
<tr>
	<td>
		<?= __('König, Mareike, Virevialle, Evan: Datenbank "Adressbuch der Deutschen in Paris von 1854" - Database "Directory of German Migrants living in Paris in 1854". Zenodo, 2.10.2022. <a target="blank" href="https://doi.org/10.5281/zenodo.7134960">https://doi.org/10.5281/zenodo.7134960</a>.') ?>
	</td>
</tr>
<tr>
		<td>
			<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
  			<div class="csl-entry">König, Mareike: Adressbuch der Deutschen in Paris von 1854, in: Das 19. Jahrhundert in Perspektive, 29.12.2012. <a href="https://19jhdhip.hypotheses.org/20">https://19jhdhip.hypotheses.org/20</a>.</div>
  			<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Adc&amp;rft.type=blogPost&amp;rft.title=Adressbuch%20der%20Deutschen%20in%20Paris%20von%201854&amp;rft.description=Im%20Rahmen%20des%20Projektes%20%E2%80%9EDeutsche%20Einwanderer%20in%20Paris%20im%2019.%20Jahrhundert%E2%80%9C%20wurde%20in%20den%20Jahren%202002%2F03%20das%20%E2%80%9EAdressbuch%20der%20Deutschen%20in%20Paris%E2%80%9C%20aus%20dem%20Jahr...&amp;rft.identifier=https%3A%2F%2F19jhdhip.hypotheses.org%2F20&amp;rft.aufirst=Mareike&amp;rft.aulast=K%C3%B6nig&amp;rft.au=Mareike%20K%C3%B6nig&amp;rft.language=de-DE"></span></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
			<div class="csl-entry">König, Mareike: Deutsche Handwerker, Arbeiter und Dienstmädchen in Paris: eine vergessene Migration im 19. Jahrhundert. Pariser Historische Studien, Bd. 66, München 2003,<a target='blank' href='https://perspectivia.net/receive/ploneimport_mods_00010946'> https://perspectivia.net/receive/ploneimport_mods_00010946</a>.</div>
  			<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_id=urn%3Aisbn%3A978-3-486-56761-8&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Abook&amp;rft.genre=book&amp;rft.btitle=Deutsche%20Handwerker%2C%20Arbeiter%20und%20Dienstm%C3%A4dchen%20in%20Paris%3A%20eine%20vergessene%20Migration%20im%2019.%20Jahrhundert&amp;rft.place=M%C3%BCnchen&amp;rft.publisher=Oldenbourg&amp;rft.series=Pariser%20historische%20Studien&amp;rft.aufirst=Mareike&amp;rft.aulast=K%C3%B6nig&amp;rft.au=Mareike%20K%C3%B6nig&amp;rft.date=2003&amp;rft.tpages=203&amp;rft.isbn=978-3-486-56761-8&amp;rft.language=ger%20fre"></span></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="csl-bib-body" style="line-height: 1.35; margin-left: 2em; text-indent:-2em;">
  			<div class="csl-entry">König, Mareike: Georg Kibler, Möbelbauer, Rue de Charonne 39: Adreßbuch der Deutschen in Paris für das Jahr 1854, in: Francia. Forschungen zur westeuropäischen Geschichte 30/3 (2003), S. 143‑156, <a target='blank' href='https://doi.org/10.11588/fr.2003.3.45497'>https://doi.org/10.11588/fr.2003.3.45497</a>.</div>
  			<span class="Z3988" title="url_ver=Z39.88-2004&amp;ctx_ver=Z39.88-2004&amp;rfr_id=info%3Asid%2Fzotero.org%3A2&amp;rft_val_fmt=info%3Aofi%2Ffmt%3Akev%3Amtx%3Ajournal&amp;rft.genre=article&amp;rft.atitle=Georg%20Kibler%2C%20M%C3%B6belbauer%2C%20Rue%20de%20Charonne%2039%3A%20Adre%C3%9Fbuch%20der%20Deutschen%20in%20Paris%20f%C3%BCr%20das%20Jahr%201854&amp;rft.jtitle=Francia%2030%2F3%20(2003)&amp;rft.aufirst=Mareike&amp;rft.aulast=K%C3%B6nig&amp;rft.au=Mareike%20K%C3%B6nig&amp;rft.date=2004&amp;rft.pages=143-156&amp;rft.spage=143&amp;rft.epage=156&amp;rft.language=fr"></span></div>
		</td>
	</tr>
			</table>
</div>
</div>
</div>
</div>
</div>
			</div>
