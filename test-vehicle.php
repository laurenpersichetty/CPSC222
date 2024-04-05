<?php
	class Vehicle 
	{
		private $make, $model, $year, $electric;
		
		function __contruct($m, $o, $y, $e)
		{
			$this->setMake($m);
			$this->setModel($o);
			$this->setYear($y);
			$this->setElectric($e);
		}
		
		function getMake() 
		{
			return $this->make;
		}
		
		function setMake($m)
		{ 
			$this->make = $m;
		}
		
		function getModel() 
		{
			return $this->model;	
		}
		
		function setModel($o) 
		{
			$this->model = $o;
		}
		
		function getYear() 
		{
			return $this->year;
		}
		
		function setYear($y) 
		{
			$this->year = $y;	
		}
		
		function getElectric() 
		{
			return $this->electric;
		}
		
		function setElectric($e) 
		{
			$this->electric = $e;	
		}
		
		function getVehicle()
		{echo "foo";
			return $this->year . " " . $this->getMake() . " " . 
			$this->getModel() . " " . (($this->getElectric()==1)?"EV":"");
		}
	}
?>
