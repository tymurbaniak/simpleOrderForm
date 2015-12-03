<?php


$globallink = connect_to_database();
send_data_to_database($_POST);
close_connection_with_database();

function connect_to_database(){
	require('serverconf.php');
	if(!($link = mysqli_connect($adresserwera, $nazwauzyt, $haslo)))
	{return 'Server problem'; exit(0);}

	if(!mysqli_select_db($link, $nazwabd))
	{return 'Database problem';}

	return $link;
}
function send_data_to_database($array){
	global $globallink;
	$date = date('d-m-Y H:i:s');
	$inc =0.5;
	$wrfname = $_POST['writersName'];
	$wrflname = $_POST['writersLName'];
		for($incr=1; $incr<12; $incr++){
			$qcounter = "quantity".$incr;
			$ncounter = "name".$incr;
			$quantity = $_POST[$qcounter];
			$name = $_POST[$ncounter];
			$zapytanie = "INSERT INTO sf (id, date, name, quantity, wrfname, wrflname) VALUES (NULL, , '".$date."', '".$name."', '".$quantity."','".$wrfname."','".$wrflname."') ";
			$wynik_zapytania = mysqli_query($globallink, $zapytanie);
			
			if(!$wynik_zapytania) { 
				echo "Nie dodano<br>";
				echo $wynik_zapytania;
				echo $wynik_zapytania;
				return 'Problem z dopisaniem obrazka do bazy';
			}else{
				echo "Dodano rekord do bazy";
			} 
		}
}
function close_connection_with_database(){
	global $globallink;
	if(!mysqli_close($globallink)) {return 'Problem z zamknieciem bazy';}
}
?>