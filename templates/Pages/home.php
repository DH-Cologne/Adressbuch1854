<?php
/*
Homepage
*/

?>

<div class="container6">     
<div class='background'>
</div>
<div class="wrapper-item search form" id="simp-search" style="display: flex; justify-content:center; align-items: center;">
                <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search/results']) ?>
                <?php
                // Set parameter for search type to "simple"
                echo $this->Form->hidden('type', ['value' => 'simp']);
                echo $this->Form->control('text', ['maxlength' => 256, 'label' => false, 'placeholder   ' => __('Freitextsuche'), 'class'=>'textarea2']);?>
                <?= $this->Form->button(__('Start'), ['class' => 'button_home2']) ?>
                <?= $this->Form->end() ?>
                <button style='margin-top:-27px' onclick="window.location.href='/search/query';"><?= __('Erweitert') ?></button>
                </div>  

<div class='header2'>
 
                <h1 class='h1home'><?= __('Adressbuch der Deutschen in Paris von 1854') ?></h1>         
                <p class='p1home'><?= __('Die Datenbank basiert auf einem gedruckten Buch, das 4.772 deutsche Kaufleute, Unternehmer, Handwerker und andere Selbständige verzeichnet, die 1854 in Paris und den angrenzenden Vororten ansässig waren.')?></p>
        </div>
        <div class="header3">
                <div class="divhome">
               
                <button style="margin-left:16px;" class="button_home" onclick="window.location.href='/pages/karte';"><?= __('Interaktive Karte') ?></a></button>
                </div>
                <div class="divhome">
                <div style='text-align:left; padding-bottom:2px;'>
                <?= $this->Html->link(__('Personen'), ['controller'=> 'Persons', 'action'=>'index'],['class'=>'button2']) ?><br>
                <?= $this->Html->link(__('Unternehmen'), ['controller'=>'Companies', 'action'=>'index'],['class'=>'button2'])?><br>
                <?= $this->Html->link(__('Straßen'), ['controller'=>'Streets', 'action'=>'index'],['class'=>'button2'])?><br>
                <?= $this->Html->link(__('Berufe'), ['controller'=>'Profession', 'action'=>'index'],['class'=>'button2']) ?>
</div>
                </div>
                <div class='divhome'>
                        
                        <button class="button_home" onclick="window.location.href='/persons/view/<?php echo rand(1,4772) ?>';"><?= __('Serendipity') ?></a></button>
                </div>
             
              
             
              </div>
       


      
</div>
