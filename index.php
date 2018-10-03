<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Arnabs Project 2</title>
    <link rel='stylesheet' id='arnab-bootstrap-css'  href='css/bootstrap.min.css' type='text/css' media='all' />


</head>
<body>

<?php

include "count.php";
require 'validation-logic.php';
// define variables and set to empty values
?>

<form>


    <div class="row">
        <div class="text-center">E-mail: (required|email)
            <input type="text" name="email" id="email" value ="<?php echo $form->get('email', 'arnab@gmail.com'); ?>">
        </div>
        <br><br>
        <div class="text-center">Website: (required|url)
            <input type="text" name="url" id="url" value ="<?php echo $form->get('url', 'http://p2.dwa-fall2018-arnab.me/'); ?>">
        </div>
        <br><br>

        <div class="text-center">Comment:
            <textarea name="comment" rows="5" cols="40" ></textarea>
        </div>
        <br><br>


        <br><br>
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
    <div class='alert alert-info'>
        No errors
    </div>
    <div> <?= "Website: " . $_GET['url'] . "/".getCount($_GET['comment'], $_GET['email'])." <?php> <br/>"; ?> </div>
<?php endif; ?>


</body>
</html>