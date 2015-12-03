<?php


connect_to_database();

function connect_to_database(){
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);

	$date = date('d-m-Y H:i:s');
	$inc =0.5;
	$wrfname = $_POST['writersName'];
	$wrflname = $_POST['writersLName'];
		for($incr=1; $incr<12; $incr++){
			$qcounter = "quantity".$incr;
			$ncounter = "name".$incr;
			$quantity = $_POST[$qcounter];
			$name = $_POST[$ncounter];
			$zapytanie = "INSERT INTO sf (id, date, name, quantity, wrfname, wrlname) VALUES (NULL, CURRENT_TIMESTAMP, '".$name."', '".$quantity."','".$wrfname."','".$wrflname."') ";
			echo $zapytanie. "<br>";
			echo $date." ".$name." ".$quantity." ".$wrfname."<br>";
			
			$wynik_zapytania = mysqli_query($link, $zapytanie);
			echo mysqli_connect_error();
			
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie dzia³a :o';
			}else{
				echo "Dodano rekord do bazy";
			} 
		}

	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
}
?>