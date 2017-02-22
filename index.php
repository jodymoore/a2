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
                <label for="waysToSplit" >Split how many ways? </label>
                <input id="waysToSplit" type="text" name="waysToSplit" value='<?=sanitize($waysToSplit)?>' required><br>
                    <em>* Required</em><br>
                <label for="tab" >How much was the tab? </label>
                <input id ="tab" type="text" name="tab" value='<?=sanitize($howMuchWasTab)?>' required><br> 
                    <em>* Required</em><br>
                <label for="service" >How was the service? </label>
                <select id="service" name="service" value='<?=sanitize($service)?>' required>>
                    <option value="excellent">Excellent 25%</option>
                    <option value="good">Good 20%</option>
                    <option value="ok">OK 15%</option>
                    <option value="poor">Poor 10%</option>
                </select>
                <br>
                <label for="roundup" >Round up?</label>
                <input id="roundup" type='checkbox' name="roundup" <?php if(sanitize($roundup)) echo 'CHECKED' ?>>Yes
                <br><br>
                <input type="submit" name="calculate" value="Calculate" class='btn btn-primary  btn-small'>
            </form>
            <?php if($form->isSubmitted()): ?>
                <div class="alert alert-success">
                    Everyone owes $
                    <?=sanitize($results)?>                  
                </div>
            <?php endif; ?> 
        </div>
    </div>
</body>
</html>