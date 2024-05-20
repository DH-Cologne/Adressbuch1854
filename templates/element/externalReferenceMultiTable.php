<?php
/*
Creates a numbered table containing all the references in $externalReferences.
*/
?>

<div class="table-responsive">
	<table>
		<tr>
			<th><?= __('Nr') ?></th>
			<th><?= __('Literatur/Quelle') ?></th>
			<th><?= __('Kurzbeschreibung') ?></th>
		</tr>
		<?php
			$countNo = 1;
			foreach ($externalReferences as $externalReference) : ?>
		<tr>
			<td><?= $this->Number->format($countNo) ?></td>
			<td><?php 
				if(!empty($externalReference->link)){
					echo $this->Html->link(h($externalReference->reference), $externalReference->link, ['target' => 'new']);
				} else {
					echo h($externalReference->reference);
				}
				?></td>
			<td><?= h($externalReference->short_description) ?></td>
		</tr>
		<?php
			$countNo++;
			endforeach; ?>
	</table>
</div>