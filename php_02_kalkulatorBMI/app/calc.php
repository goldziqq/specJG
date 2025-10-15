<?php

require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/app/security/check.php';

// pobranie parametrów

function getParamsBMI(&$form){
    $form['wzrost'] = isset($_REQUEST['wzrost']) ? $_REQUEST['wzrost'] : null;
    $form['waga']   = isset($_REQUEST['waga']) ? $_REQUEST['waga'] : null;
}

// walidacja danych

function validateBMI(&$form, &$messages){
    if (! (isset($form['wzrost']) && isset($form['waga']))) return false;

    if ($form['wzrost'] == "") $messages[] = 'Nie podano wzrostu';
    if ($form['waga'] == "") $messages[] = 'Nie podano wagi';

    if (count($messages) > 0) return false;

    if (!is_numeric($form['wzrost'])) $messages[] = 'Wzrost musi być liczbą';
    if (!is_numeric($form['waga'])) $messages[] = 'Waga musi być liczbą';
    if ($form['wzrost'] <= 0) $messages[] = 'Wzrost musi być większy od zera';

    return count($messages) == 0;

}

// obliczenie BMI

function processBMI(&$form, &$result, &$komentarz){
    $wzrost_m = floatval($form['wzrost']) / 100;
    $waga = floatval($form['waga']);
    $bmi = $waga / ($wzrost_m * $wzrost_m);
    $result = round($bmi, 2);

    if ($bmi < 18.5) $komentarz = "Masz niedowagę";
    elseif ($bmi < 24.9) $komentarz = "Waga prawidłowa";
    elseif ($bmi < 29.9) $komentarz = "Masz nadwagę";
    else $komentarz = "Otyłość";

}

// zmienne
$form = array();
$messages = array();
$result = null;
$komentarz = null;


getParamsBMI($form);

if (validateBMI($form, $messages)) {
    processBMI($form, $result, $komentarz);
}


include _ROOT_PATH.'/app/calc_view.php';

?>
 