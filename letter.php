<?php

	function letter($g)
	{
		if($g>=90 and $g<=100)
		{
			return "A";
		}
		if($g>=80 and $g<90)
		{
			return "B";
		}
		if($g>=70 and $g<80)
		{
			return "C";
		}
		if($g>=65 and $g<70)
		{
			return "D";
		}
		if($g<65)
		{
			return "F";
		}
	}	
?>
