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



</body>
</html>
<?php

$table = read_data_from_database();

function read_data_from_database(){
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);

			$zapytanie = "SELECT * FROM sf";

			$wynik_zapytania = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			
			while($row=mysqli_fetch_array($wynik_zapytania,MYSQLI_ASSOC)){
			echo $row["name"]."  ".$row["quantity"]."  ".$row["price"];
			echo "<br>";
			echo count($row);
			}
			
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