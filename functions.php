<?php
function generatePassword($length, $options)
{

    $characters = '';

    if ($options['lowercase']) {
        $characters .= 'abcdefghijklmnopqrstuvwxyz';
    }
    if ($options['uppercase']) {
        $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($options['numbers']) {
        $characters .= '0123456789';
    }
    if ($options['symbols']) {
        $characters .= '!@#$%^&*()';
    }

    // Se nessun set è selezionato → errore
    if ($characters === '') {
        return 'Errore: seleziona almeno un set di caratteri.';
    }

    $password = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $maxIndex)];
    }

    return $password;
}
