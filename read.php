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
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);

			$zapytanie = "SELECT * FROM `order` WHERE 1";

			$wynik_zapytania = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			
			
			
			echo "<center><table>";
			echo "<tr><th>Data zamówienia</th><th>Imię</th><th>Nazwisko</th><th>Koszt</th><th></th>";
			while($row=mysqli_fetch_array($wynik_zapytania,MYSQLI_ASSOC)){
			
			$zapytanie_suma = "SELECT SUM(product_price) AS cost FROM product WHERE product_forordkey = '".$row["order_id"]."';";
			$koszt = mysqli_query($link, $zapytanie_suma);
			$row2=mysqli_fetch_array($koszt, MYSQLI_ASSOC);
			
			echo "<tr><td>".$row["order_date"]."</td><td>".$row["order_fname"]."</td><td>".$row["order_lname"]."</td><td>".$row2["cost"]."</td><td>";
			echo "<form method='POST' action='showdetails.php'><input name='forordkey' type='hidden' value='".$row["order_id"]."'><input type='submit' value='Pokaż szczegóły'></form>";
			}
			echo "</table></center>";
			
			echo count($row);
			mysqli_free_result($wynik_zapytania);
			
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie działa :o';
			}else{
				echo "Wczytano dane z bazy";
			} 
		
	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
	return $row;
}
?>

</body>
</html>