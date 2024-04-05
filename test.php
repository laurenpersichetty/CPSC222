<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

	require_once("test-vehicle.php");
	
	/*$mycar = new Vehicle();
	
	$mycar->setMake("Buick");
	$mycar->setModel("Enclave");
	$mycar->setYear("2024");
	$mycar->setElectric("1");*/
	
	/*$mycar = new Vehicle("Buick", "Enclave", "2024", "1");
	
	echo $mycar->getVehicle();*/
	
	$carArr = array(
		new Vehicle("Buick", "Enclave", "2024", "1"),
		new Vehicle("Ford", "Fusion", "2017", "2"),
		new Vehicle("Toyota", "Camry", "2020", "3")	
	);
	
	#print_r($carArr);
	
	for($x=0; $x<count($carArr); $x++)
	{
		echo $carArr[$x]->getVehicle() . "<br>";
	}
	
	foreach($carArr as $i)
	{
		echo $i->getVehicle() . "<br>";
	}
?>
