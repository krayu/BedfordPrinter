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

	include_once("analyticstracking.php")
?>
		<div class="width980" id="header">
			<div id="for_logo">
				<a href="<?php echo $lang == "pl"? "/?lang=pl" : "/?lang=en"; ?>" title="BedfordPrinter.co.uk">
					<img src="img/logo.png" alt="BedfordPrinter logo" /> 
				</a>
			</div>
			<div id="for_h1">
				<h1><a href="<?php echo $lang == "pl"? "/?lang=pl" : "/?lang=en"; ?>">BedfordPrinter.co.uk</a></h1>
			</div>
			<div id="languages">
				<a href="/?lang=en" title="English" class="lang">
					<img src="img/uk.png" alt="English" /> 
				</a>
				<a href="/?lang=pl" title="Polish" class="lang">
					<img src="img/pl.png" alt="Polish" /> 
				</a>
			</div>			
		</div>
		<div class="clear"></div>
		<div id="for_background">
			<div class="width980" id="banner">
				<div id="printer">
				</div>
				<div id="banner_text">
					<?php echo $text['intro']; ?>											
				</div>
				
			</div>
		</div>
<?php		
	if (isset($_POST) && !empty($_POST)){
		$allowedExts = array("doc", "docx", "txt", "pdf","xlsx","xls","odt");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		
		if (($_FILES["file"]["size"] < 10000000) && in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"] > 0)
		    {
			    echo "Error: " . $_FILES["file"]["error"] . "<br>";
		    }
		  else
		    {
				
			    if (file_exists("uploaded_files_printer/" . $_FILES["file"]["name"]))
			      {
				      move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_files_printer/".time()."_".$_FILES["file"]["name"]);
					  $file = "http://bedfordprinter.co.uk/uploaded_files_printer/".time()."_".$_FILES["file"]["name"];
			      }
			    else
			      {
				      move_uploaded_file($_FILES["file"]["tmp_name"],"uploaded_files_printer/" . $_FILES["file"]["name"]);
					  $file = "http://bedfordprinter.co.uk/uploaded_files_printer/".$_FILES["file"]["name"];
			      }	

				  $to = "email@gmail.com";
				  $subject = "Printing enquiry";
				  $headers = "MIME-Version: 1.0" . "\r\n";
				  $headers .= "Content-type: text/html; charset=iso-8859-2" . "\r\n";

				  $quantity = mysql_escape_string($_POST['quantity']);
				  $format = mysql_escape_string($_POST['format']);
				  $delivery = mysql_escape_string($_POST['delivery']);
				  $info = mysql_escape_string($_POST['info']);
				  $price = mysql_escape_string($_POST['price']);
				  				  
		
?>		
</body>
</html>