﻿<!DOCTYPE HTML>
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
			//echo $forordkey;
			$zapytanie = "SELECT * FROM `product` WHERE product_forordkey='".$forordkey."'";

			$wynik_zapytania = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			
			echo "<center><form action='saveprices.php' method='POST'><table>";
			echo "<tr><th>Nazwa</th><th>Ilość</th><th>Cena</th></tr>";
			while($row=mysqli_fetch_array($wynik_zapytania,MYSQLI_ASSOC)){
			
			echo "<tr><td>".$row["product_pname"]."</td><td>".$row["product_quantity"]."</td><td>
			<input name='productprice".$row["product_id"]."' value=".$row["product_price"].">
			<input type='hidden' name='productid".$incr."' value=".$row["product_id"].">
			<input type='hidden' name='quantity".$row["product_id"]."' value=".$row["product_quantity"]."></td></tr>";
			echo "\n";
			$sum = $sum + ($row["product_price"]*$row["product_quantity"]);
			$incr++;
			}
			echo "<input type='hidden' value='".$forordkey."' name='forordkey'>";
			echo "<tr><td></td><td></td><td><h3>Łączny koszt <br>zamówienia: ".$sum." </h3></td></tr>";
			echo "<tr><td><input type='submit' value='Zapisz ceny'></td><td><a href='read.php'>Powrót do listy</a></td><td></td></tr>";
			echo "</table></form></center>";
			
			//echo count($row);
			mysqli_free_result($wynik_zapytania);
			
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie działa :o';
			}else{
				//echo "Wczytano dane z bazy";
			} 
		
	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
	return $row;
}
?>

</body>
</html>