<?php
require 'includes/Form.php';

$form = new DWA\Form($_GET);

$submitted = $form->isSubmitted();

if ($submitted) {
    $errors = $form->validate(
        [
            'email' => 'required|email',
            'url' => 'required|url',
            'comment' => 'required|alphaNumeric',

        ]
    );
}
