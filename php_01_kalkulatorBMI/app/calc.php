<?php
require_once dirname(__FILE__).'/../config.php';


// pobranie parametrów

$wzrost = isset($_POST['wzrost']) ? $_POST['wzrost'] : null ;
$waga = isset($_POST['waga']) ? $_POST['waga'] : null ;
$messages = [];

//walidacja
if ( ! (isset($wzrost) && isset($waga))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $wzrost == "") {
	$messages [] = 'Nie podano wzrostu';
}
if ( $waga == "") {
	$messages [] = 'Nie podano wagi';
}


if (empty( $messages )) {
	
	if (!is_numeric($wzrost)) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	if (!is_numeric($waga)) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}	
	if ($wzrost <= 0) {
		$messages[] = 'Wzrost musi być większy od zero';
	}

}


//obliczenia
if (empty ( $messages ) && isset($_POST["oblicz"])) {
	
	$wzrost = floatval($wzrost) /100;
	$waga = floatval($waga);
	
	$bmi = $waga / ($wzrost * $wzrost);
	$result = round($bmi,2);

	if($bmi < 18.5){
		$komentarz = "Masz niedowage"; 
	}elseif($bmi < 24.9){
		$komentarz = "Waga prawidłowa";
	}elseif($bmi < 29.9){
		$komentarz = "Masz nadwage";
	}else{
		$komentarz = "Otyłość";
	}
	
}
if (!isset($wzrost)) $wzrost = '';
if (!isset($waga)) $waga = '';
if (!isset($result)) $result = '';
if (!isset($komentarz)) $komentarz = '';


include _ROOT_PATH.'/app/calc_view.php';