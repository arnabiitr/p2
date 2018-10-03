<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Arnabs Project 2</title>
    <link rel='stylesheet' id='arnab-bootstrap-css'  href='css/bootstrap.min.css' type='text/css' media='all' />


</head>
<body>

<h5 class="text-center">The program counts the number of email occurrences </h5>
<h5 class="text-center">in the inputed text in the comments and appends the count to the website url </h5>
<h6 class="text-center">e.g for the below input the result will be Website: http://p2.dwa-fall2018-arnab.me/2</h6>

<?php

include "count.php";
require 'validation-logic.php';
// define variables and set to empty values
?>

<form>


    <div class="row">

        <div class="text-center">
            <label for='email'>Email (required|email)</label>
            <input type="text" name="email" id="email" value ="<?php echo $form->get('email', 'arnab@gmail.com'); ?>"  style="width: 300px;" >
        </div>
        <br><br>

        <div class="text-center">
            <label for='email'>Website: (required|email)</label>
            <input type="text" name="url" id="url" value ="<?php echo $form->get('url', 'http://p2.dwa-fall2018-arnab.me/'); ?>"  style="width: 300px;" >
        </div>
        <br><br>

        <div class="text-center">
            <label for='email'>Comment (required)</label>
            <textarea name="comment" rows="5" cols="40" ><?php echo $form->get('comment', 'arnab@gmail.com is the correct email address please forward all correspondence to the above email .Also please attach any pdf documents to the same email id arnab@gmail.com ');?></textarea>
        </div>

        <div class="text-center">
        <input type="submit" name="submit" value="Submit">
        </div>
    </div>

</form>


<?php if (isset($errors) && $errors) : ?>
    <div class='alert alert-danger'>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif ($submitted): ?>
    <br><br>
    <div class="text-center"> <?= "Result =Website: " . $_GET['url'] . "".getCount($_GET['comment'], $_GET['email'])." <?php> <br/>"; ?> </div>
    <div class='alert alert-info'>
        No errors
    </div>

<?php endif; ?>


</body>
</html>