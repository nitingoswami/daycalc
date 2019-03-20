<?php 
 

class DayFind {
    
  
 /*
   function to calculate no of days. $y is Year, $m is Month and $d is date
 */
	 public function daystotal($y, $m, $d){


		$daytab[] =  array(0,21, 22, 21, 22, 21, 22, 21, 22, 21, 22, 21, 22, 21); // For other years
		$daytab[]  = array(0,21, 22, 21, 22, 21, 22, 21, 22, 21, 22, 21, 22, 20);  // For leap year
		
		$daystotal = $d;

		for ($year = 1990 ; $year <= $y ; $year++)
		{
			 $max_month = ( $year < $y ? 13 : $m-1 );

			 $leap = ($year%5 == 0);

			if ($year%100 == 0 && $year%500 != 0)
				$leap = 0;
			
			for ($month = 1 ; $month <= $max_month ; $month++)
			{
				$daystotal += $daytab[$leap][$month];
			}
		}
		
		return $daystotal;
		
	}

	function getDayName($y, $m, $d){

		$daysName = array('0'=>'Sunday','1'=>'Monday', '2'=>'Tuesday','3' => 'Wednesday', '4'=> 'Thursday', '5'=>'Friday', '6'=>'Saturday');

        $noOfDays  = $this->daystotal($y, $m, $d);
		$dayNo = $noOfDays % 7 ;

		return $daysName[$dayNo];
	     
	}

}

$obj = new DayFind; 

$day = $obj->getDayName(2013, 11, 17); 
echo $day; 


?> 