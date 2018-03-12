<?php

function return_date($year,$day,$month){
	if($month=='01'){
		$month = "Jan";
	}
	else if($month =="02")
		{$month = "Feb";}
	else if($month =="03")
		{$month = "March";}
	else if($month =="04")
		{$month = "April";}
	else if($month =="05")
		{$month = "May";}
	else if($month =="06")
		{$month = "June";}
	else if($month =="07")
		{$month = "July";}
	else if($month =="08")
		{$month = "August";}
	else if($month =="09")
		{$month = "September";}
	else if($month =="10")
		{$month = "October";}
	else if($month =="11")
		{$month = "November";}
	else 
		{$month = "December";}
	


if($day=='1'){
	$day=  $day."st";
}
	else if ($day =='2') {
		$day = $day."nd";
	}else if ($day=='3') {
		$day= $day."rd";
	}else {
		$day=$day."th";
	}

$year = str_split($year,2);

return $day." ".$month." ".$year[1];
	
}

?>