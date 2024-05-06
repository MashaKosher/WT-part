<?php
class Birthday{
    public function __construct($day, $month, $year, $second=0, $minute=0,  $hour=0){        
        $today = getdate();
        $birth_time = new DateTimeImmutable($year."-".$month."-".$day." ".$hour.":".$minute.":".$second);
        $current_time = new DateTimeImmutable($today["year"]."-".$today["mon"]."-".$today["mday"]." ".$today["hours"].":".$today["minutes"].":".$today["seconds"]);
        $interval = date_diff($current_time, $birth_time);
        echo $interval->format("%Y-%M-%D")."\n";
    }
}

$a = new Birthday(21, 12, 2004);
