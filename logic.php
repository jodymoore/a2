<?php

require('tools.php');
require('Form.php');

$form = new DWA\Form($_GET);

if($form->isSubmitted()) {

    $waysToSplit = $form->get('waysToSplit', $default = ''); 

    $howMuchWasTab = $form->get('tab', $default = ''); 

    $serviceScale =  '';

    $roundup = $form->isChosen('roundup');

    $includeTip = $form->isChosen('includeTip');

    $tipAmount = .0;

    $results;

    $errors = $form->validate(
        [
            'waysToSplit' => 'required|numeric',
            'tab' => 'required'
        ]
    );

    if($errors){
        $results = 0;
    }
    else {

        if(isset($_GET['service'])) { 
	        switch($_GET['service'])
            {  
                case "excellent": $tipAmount = .25; break;
                case "good": $tipAmount = .20; break;
                case "ok": $tipAmount = .15; break;
                case "poor": $tipAmount = .10; break;
                default: $tipAmount = .15; break;
            }
        }
        else {
            $tipAmount = .15;
        }

        $service = $_GET['service'];

        if ($includeTip) {
            if ($roundup) {
	            $results = (($howMuchWasTab * $tipAmount) + $howMuchWasTab) / $waysToSplit; 
	            $results = round($results);
            }
            else {
	            $results = (($howMuchWasTab * $tipAmount) + $howMuchWasTab) / $waysToSplit; 
            }
        }
        else {
	        if ($roundup) {
	            $results = $howMuchWasTab / $waysToSplit; 
	            $results = round($results);
            }
            else {
	            $results = $howMuchWasTab / $waysToSplit; 
            }
        }

        $posOfDecimal = strpos($results, '.');

        $start = 0;

        $end = $posOfDecimal + 3;

        $results = substr($results, $start, $end); 
    }
}



