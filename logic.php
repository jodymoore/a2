<?php

require('tools.php');
require('Form.php');

$form = new DWA\Form($_GET);

$waysToSplit = $form->get('waysToSplit', $default = ''); 

$howMuchWasTab = $form->get('tab', $default = ''); 

$serviceScale =  '';

$roundup = $form->isChosen('roundup');

if ($roundup) {
	$results = $howMuchWasTab / $waysToSplit; 
	$results = round($results);
}
else {
	$results = $howMuchWasTab / $waysToSplit; 
}

