<?php

class SmartDate
{

    const MONTH = ["Январь", "Февраль", "Март", "Апрель", "Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
    function __construct($day, $month, $year,$second=0, $minute=0,  $hour=0)
    {
        $this->day = $day;
        $this->month = array_search($month, SmartDate::MONTH)+1;
        $this->year = $year;
        $this->second = $second;
        $this->minute = $minute;
        $this->hour = $hour;

        $this->l = date('l', mktime($this->hour,$this->minute,$this->second, $this->month , $this->day , $this->year));

        if ($this->l == "Saturday" or $this->l == "Sunday"){
            echo "Данный день является выходным\n";
        }else{
            echo "Данный день не является выходным\n";
        }

        if ($this->year % 4 == 0){
            echo "Данный год является високосным\n";
        }else{
            echo "Данный год не является високосным\n";
        }

        $this->t = time() - mktime($this->hour,$this->minute,$this->second, $this->month , $this->day , $this->year);
        echo "Разница между текущим временем и заданным в секундах: ".$this->t."\n";

    }
}

$a = new SmartDate(24, "Март", 2024, 0, 14,19);