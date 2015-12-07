<?php

send_data_to_database();

function send_data_to_database(){
	require('serverconf.php');
	$link = mysqli_connect($adresserwera, $nazwauzyt, $haslo, $nazwabd);

	$wrfname = $_POST['writersName'];
	$wrflname = $_POST['writersLName'];
	
	$zapytanie_zamowienie = "
		INSERT INTO `sf`.`order` (`order_id`, `order_fname`, `order_lname`, `order_date`) VALUES (NULL, '".$wrfname."', '".$wrflname."', CURRENT_TIMESTAMP);
		";
	$wynik_zapytania = mysqli_query($link, $zapytanie_zamowienie);
	echo mysqli_connect_error();
			
	if(mysqli_connect_errno()) { 
		echo "Nie dodano<br>";
		return 'Nie działa :o';
	}else{
		//echo "Dodano rekord do bazy";
	} 
		
	$foreignkey = $link->insert_id;
	//echo $foreignkey;
		for($incr=1; $incr<13; $incr++){
			$qcounter = "quantity".$incr;
			$ncounter = "name".$incr;
			$quantity = $_POST[$qcounter];
			$name = $_POST[$ncounter];
			$zapytanie_produkt = "
			INSERT INTO product (product_id, product_pname, product_quantity, product_price, product_forordkey) 
			VALUES (NULL, '".$name."','".$quantity."', '', '".$foreignkey."');
			";
			//uncomment for debuging echo $zapytanie_produkt. "<br>";
			//uncomment for debuging echo $name." ".$quantity." ".$foreignkey."<br>";
			
			$wynik_zapytania = mysqli_query($link, $zapytanie_produkt);
			echo mysqli_connect_error();
			
			if(mysqli_connect_errno()) { 
				echo "Nie dodano<br>";
				return 'Nie działa :o';
			}else{
				//echo "Dodano rekord do bazy";
			} 
		}
	echo "<center><h1>Wysłano zamówienie</h1><br><h2><a href='index.html'>Powrót do strony składania zamówień</a><br>
			<form method='POST' action='print.php'><input type='submit' value='Zobacz i wydrukuj zamówienie'>
			<input type='hidden' name='forordkey' value='".$foreignkey."'></form></center>";
		

	if(!mysqli_close($link)) {return 'Problem z zamknieciem bazy';}
}
?>