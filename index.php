<!DOCTYPE html>
<html lang='en'>
<head>

    <style>
        .redBorder {
            border: 2px solid red;
        }
    </style>
</head>
<body>

<?php

include "count.php";
// define variables and set to empty values

$p = $_SERVER["REQUEST_METHOD"];
$e = 0;
$w = 0;

if ($p=="POST") {


    if (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        $e = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if (isset($_POST["website"]))
        $website = test_input($_POST["website"]);
        $w=filter_var($website, FILTER_VALIDATE_URL);

    if (isset($_POST["comment"]))
        $comment = test_input($_POST["comment"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>


    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">


        <div class="row">
            <div class="col-3 col-md-4 text-center">E-mail: <input type="text" name="email" <?php if ((empty($email) || !$e) && $p=="POST") echo 'class="redBorder"'; ?> value ="<?php if (!empty($email)) echo $email; ?>"></div>
            <br><br>
            <div class="col-3 col-md-4 text-center">Website: <input type="text" name="website" <?php if (empty($website || !$w) && $p=="POST") echo 'class="redBorder"'; ?> value ="<?php if (!empty($website)) echo $website; ?>"></div>
            <br><br>
            <div class="col-3 col-md-4 text-center">Comment: <textarea name="comment" rows="5" cols="40" <?php if (empty($comment) && $p=="POST") echo 'class="redBorder"'; ?>><?php if (!empty($comment)) echo $comment; ?></textarea></div>
            <br><br>


            <br><br>
            <input type="submit" name="submit" value="Submit">
        
    </form>

    <?php
    if (!empty($email) && !empty($website) && !empty($comment) && $e && $w) {



        echo "Website: " . $website . "/".getCount($comment, $email)."<br/>";



    }

    ?>


</body>
</html>