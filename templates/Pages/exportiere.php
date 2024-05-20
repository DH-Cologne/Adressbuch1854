<?php

/*
Exportiere page
*/
?>

<strong><?= $this->Html->link(__('Zurück zu home'), ['controller'=>'Pages', 'action'=>'home']) ?></strong><br>

<h3><?= __('Gesamte Datenbank') ?></h3>

<div class="row">
         <?= $this->Form->postButton('Json', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'json']], ['class'=>'button2'])?>
        <?= $this->Form->postButton('XML', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'xml']],['class'=>'button2'])?>
        <?= $this->Form->postButton('CSV', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'csv']],['class'=>'button2'])?>
        <?= $this->Form->postButton('SQL', ['controller' => 'App', 'action' => 'export', '?' => ['exportAll' => 'sql']],['class'=>'button2'])?>
</div>
