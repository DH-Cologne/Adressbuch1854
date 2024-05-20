<?php

/*
Karte page
*/

?>
<div class="container">
	<div class="bigMap">
			<div id="mapBox2" class="content" onload="initializeMap()">
				<?= $this->Html->script('address-map2.js') ?>
			</div>
	</div>
</div>