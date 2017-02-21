<?php require('logic.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Bill Spitter</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
    <link href='css/styles.css' rel='stylesheet'>
</head>
<body>
    <div id="container">
        <div id="inner">
            <div id="title"> 
                <h1>Bill Splitter</h1>
            </div>
            <br><br>
            <form action="index.php"> 
                <label id ="LtoSplit" for="waysToSplit" >Split how many ways? </label>
                <input type="text" name="waysToSplit" value='<?=sanitize($waysToSplit)?>' required><br>
                     <em>* Required</em><br>
                <label id ="Ltab" for="tab" >How much was the tab? </label>
                <input type="text" name="tab" value='<?=sanitize($howMuchWasTab)?>' required><br> 
                     <em>* Required</em><br>
                <label id ="Lserv" for="service" >How was the service? </label>
                <select>
                    <option value="exccelent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="ok">OK</option>
                    <option value="poor">Poor</option>
                </select>
                <br>
                <label id ="Lroundup" for="roundup" >Round up?</label>
                <input id="ck" type='checkbox' name="roundup" <?php if($roundup) echo 'CHECKED' ?>>Yes
                <br><br>
                <input type="submit" name="calculate" value="calculate" class='btn btn-primary  btn-small'>
            </form>

            <?php if($form->isSubmitted()): ?>
       
                <div class="alert alert-success">Everyone owes $<?=sanitize($results)?></div>

            <?php endif; ?> 
        </div>
    </div>
</body>
</html>