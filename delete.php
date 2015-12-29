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

$table = read_data_from_database();

function read_data_from_database(){
	$incr = 0;
	$sum = 0;
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);
			$forordkey=$_POST['forordkey'];
			//debuging echo $forordkey;
			$zapytanie = "DELETE FROM `product` WHERE `product_forordkey` = '$forordkey';";
			$wynik_zapytania1 = mysqli_query($link, $zapytanie);
			$zapytanie = "DELETE FROM `order` WHERE `order_id` = '$forordkey';";
			$wynik_zapytania2 = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			//debuging echo "<br>".$wynik_zapytania1."  ".$wynik_zapytania2."<br><br>";
			if($wynik_zapytania1 && $wynik_zapytania2){
				echo "<center><h1>Zamówienie usunięto</h1><br>";
				echo "<a href='read.php'>Powrót do listy zamówień</a></center>";
			}else{
				echo "<center><h1>Nie udało się usunąć zamówienia</h1>". mysqli_error($link)."<br>";
				echo "<a href='read.php'>Powrót do listy zamówień</a></center>";
			}
			
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie działa :o';
			}else{
				//echo "Wczytano dane z bazy";
			} 
		
	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
}
?>

</body>
</html>