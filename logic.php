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
	$results = round($results, 2);
}
else {
	$results = $howMuchWasTab / $waysToSplit; 
}
$posOfDecimal = strpos($results, '.');

$start = 0;
$end = $posOfDecimal + 3;

$results = substr($results, $start, $end); # => 10.55