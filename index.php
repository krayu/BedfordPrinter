<!DOCTYPE html>
<html lang="en">
<head>
</head>
	<meta charset="utf-8">
	<title>BedfordPrinter.co.uk - the best online printing service in Bedford</title>
	<meta name="description" content="bedford, printer, printing">
	<meta name="viewport" content="width=1000">
	<link rel="shortcut icon" href="/favicon.ico">
	<link href="style.css" rel="stylesheet" type="text/css"/>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:200,400,600,700,800" rel="stylesheet" type="text/css">
	<script type='text/javascript' src='jquery-1.11.0.min.js'></script>
	<script type='text/javascript' src='scripts.js'></script>
</head>
<body>
<?php
	if (isset($_GET['lang']) && !empty($_GET['lang']))
		$lang = mysql_escape_string($_GET['lang']);
	else	{
		if (isset($_POST) && !empty($_POST))
			$lang = mysql_escape_string($_POST['lang']);
		else
			$lang = "en";
	}
		
		
	$texten['intro'] = "The best online <br />printing service<br />in Bedford!";
	$texten['upload'] = "Upload your file";
	$texten['quantity'] = "Type pages quantity";
	$texten['format'][0] = "Choose a printing format";
	$texten['format'][1] = "Black & White";
	$texten['format'][2] = "Colour";	
	$texten['delivery'][3] = "Choose a delivery option";
	$texten['delivery'][0] = "Home delivery (+£5)";
	$texten['delivery'][1] = "Personal collection (Free)";
	$texten['delivery'][2] = "Shipping by post (+£5)";
	$texten['info'][0] = "Additional info & contact number";
	$texten['info'][1] = "Delivery address & contact number";
	$texten['total'] = "Total to pay: ";
	$texten['thanks'] = "Thank you.";
	$texten['add'] = "Add another file";
	$texten['basket'][0] = "You have to finish your order";
	$texten['basket'][1] = "Submit your order";
		
	$textpl['intro'] = "Najlepsza drukarnia online <br />w Bedford!";
	$textpl['upload'] = "Wybierz swój plik";
	$textpl['quantity'] = "Wprowadź liczbę stron";
	$textpl['format'][0] = "Wybierz rodzaj wydruku";
	$textpl['format'][1] = "Czarno-biały";
	$textpl['format'][2] = "Kolorowy";	
	$textpl['delivery'][3] = "Wybierz sposób dostawy";
	$textpl['delivery'][0] = "Dostawa do domu (+£5)";
	$textpl['delivery'][1] = "Odbiór osobisty (Free)";
	$textpl['delivery'][2] = "Wysyłka pocztą (£5)";
	$textpl['info'][0] = "Dodatkowe informacje i numer tel.";
	$textpl['info'][1] = "Adres dostawy i numer tel.";
	$textpl['total'] = "Do zapłaty: ";
	$textpl['thanks'] = "Dziękujemy.";	
	$textpl['add'] = "Dodaj kolejny plik";
	$textpl['basket'][0] = "Musisz dokończyć zamówienie";
	$textpl['basket'][1] = "Wyślij swoje zamówienie";	
		
	if ($lang == "en")
		$text = $texten;
	else	
		$text = $textpl;
?>	
</body>
</html>