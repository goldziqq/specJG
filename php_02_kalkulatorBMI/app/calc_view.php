<?php require_once dirname(__FILE__).'/../config.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator BMI</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.pink.min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-primary">Wyloguj</a>

	<h1>Kalkulator BMI</h1>
		<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
			<fieldset>
				<label for="id_wzrost">Wzrost (cm): </label>
				<input id="id_wzrost" type="text" name="wzrost" value="<?php out($form['wzrost']); ?>" />

				<label for="id_waga">Waga (kg): </label>
				<input id="id_waga" type="text" name="waga" value="<?php out($form['waga']); ?>" />
			</fieldset>
			<input type="submit" value="Oblicz BMI" class="pure-button pure-button-primary"/>
		</form>
<?php
if (isset($messages) && count($messages) > 0) {
   echo '<ol style="padding:10px; border-radius:5px; background-color:#f88; width:300px;">';
   foreach ($messages as $msg) echo '<li>'.$msg.'</li>';
   echo '</ol>';
}
if (isset($result)) {
   echo '<div style="margin-top:20px; padding:10px; border-radius:5px; background-color:#FF0066; width:300px;">';
   echo 'Twoje BMI wynosi: '.$result.'<br>'.$komentarz;
   echo '</div>';
}
?>
</div>
</body>
</html>