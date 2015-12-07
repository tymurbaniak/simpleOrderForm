<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="print.css">
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
<table id="headertable">
  <tr>
<th rowspan="3" id="logotd"><img id="logo" src="http://80.55.223.253/logo2.png"></th>
    <td colspan = "3" id="zapotrzebowaie"><center><h2>Zapotrzebowanie</h2></center></td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td id="data">Data wydania:<br>1.03.2014</td>
<td id="numer">Nr wydania:<br> 1</td>
<td id="status">Status dokumentu: <br> aktualny</td>
  </tr>
</table>

<table id="datatable">
<tr><td id="jednostkadane">.................................................................................................
<br>(dane identyfikacyjne uprawnionej jednostki organizacyjnej)</td><td></td></tr>
<tr><td></td><td id="datadane">...............................<br>(Data sporządzenia)</td></tr>
</table>
<?php

$table = read_data_from_database();

function read_data_from_database(){
	$incr = 0;
	$sum = 0;
	$lp = 1;
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);
			$forordkey=$_POST['forordkey'];
			//echo $forordkey;
			$zapytanie = "SELECT * FROM `product` WHERE product_forordkey='".$forordkey."'";

			$wynik_zapytania = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			
			echo "<form action='saveprices.php' method='POST'><table class='contenttable'>";
			echo "<tr><th class='lptd'>Lp.</th><th>Nazwa</th><th class='iltd'>Ilość</th></tr>";
			while($row=mysqli_fetch_array($wynik_zapytania,MYSQLI_ASSOC)){
			
			echo "<tr><td class='lptd'>".$lp."</td><td> ".$row["product_pname"]."</td><td class='iltd'>".$row["product_quantity"]."</td></tr>";
			echo "\n";
			$sum = $sum + ($row["product_price"]*$row["product_quantity"]);
			$incr++;
			$lp++;
			}
			
			echo "</table></form>";
			
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

<div class="footer">Przewidywany termin realizacji zamówienia ........................................................................................</div>
<div class="footer">Dane osoby upoważnionej do odbioru .................................................................................................</div>
<div class="footer">Data sporządzenia zapotrzebowania oraz podpis i pieczątka imienna osoby zatwierdzającej zapotrzebowanie (kierownik jednostki)</div>

<div class="sealfoot">..............................................................................................................................
<br>(Data, pieczęć i czytelny podpis)</div>
<div class="sealfoot">..............................................................................................................................
<br>(data oraz pieczątka i podpis osoby przyjmującej zapotrzebowanie do realizacji)</div>

</body>
</html>