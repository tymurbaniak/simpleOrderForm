<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">

	<title>Zamówienia</title>

	<!--[if !IE]><!-->
		<link rel="stylesheet" href="/css/main.css" />
	<!--<![endif]-->

	<!--[if gte IE 7]>
		<link rel="stylesheet" type="text/css" href="/css/main.css" media="screen, projection" />
	<![endif]-->

	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="http://universal-ie6-css.googlecode.com/files/ie6.0.3.css" media="screen, projection" />
	<![endif]-->
</head>
<body>

<?php
//header("Location: read.php");
//die();
//var_dump($_POST);

send_data_to_database();

function send_data_to_database(){
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);
		
		for($incr=0; $incr<12; $incr++){
			$id = $_POST["productid".$incr];
			$quantity = $_POST["quantity".$id];
			$price = $_POST["productprice".$id];
			
			$cost = $price * $quantity;
			$zapytanie_cena = "
			UPDATE `product` SET `product_cost` = '".$cost."', `product_price` = '".$price."' WHERE `product_id` = '".$id."';
			";
			//uncomment for debuging echo $zapytanie_cena. "<br>";
			//uncomment for debuging echo $name." ".$quantity." ".$foreignkey."<br>";
			
			
			$wynik_zapytania = mysqli_query($link, $zapytanie_cena);
			echo mysqli_connect_error();
			//echo $zapytanie_cena."<br>";
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie działa :o';
			}else{
				//echo "Dodano rekord do bazy";
			} 
		}
	echo "<center><h1>Uzupełniono ceny</h1><br><h2><a href='read.php'>Powrót do listy zamówień</a></h2><br>
			<form method='POST' action='showdetails.php'><input type='submit' value='Powrót do zamówienia'>
			<input type='hidden' value='".$_POST["forordkey"]."' name='forordkey'></form></center>";
		

	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
}
?>

</body>
</html>