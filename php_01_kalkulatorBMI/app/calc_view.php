<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator BMI</title>
</head>
<body>
<h1>kalkulator BMI</h1>
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_wzrost">Wzrost (cm): </label>
	<input id="id_wzrost" type="text" name="wzrost" value="<?php isset($wzrost)?print($wzrost):''; ?>" /><br />
	
	<br>
	<label for="id_waga">Waga (kg): </label>
	<input id="id_waga" type="text" name="waga" value="<?php isset($waga)?print($waga):''; ?>" /><br />
	<input type="submit" value="Oblicz" id="oblicz" name="oblicz"/>
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Twoje BMI wynosi '. $result . "</br>" . $komentarz; ?>
</div>
<?php } ?>

</body>
</html>