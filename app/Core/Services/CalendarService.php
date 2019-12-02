<?php 
namespace App\Core\Services;
use PDO;

class CalendarService{

    static function getCalendar(int $month, int $year = 2020){
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $calendar = array();
        
        $startDay = date('w', strtotime($year.'-'.$month.'-1'));
        $lastDay = date('w', strtotime($year.'-'.$month.'-'.$daysInMonth));
        $lastRow = false;
        $row = 0;
        $day = 1;
        while($lastRow == false){
            for ($i=0; $i < 7; $i++) { 
                if($day == $daysInMonth) 
                    $lastRow = true;
                
                if($day < $startDay || ($day > $lastDay && $lastRow))
                    $calendar[$row][$i] = 0;
                else{
                    $calendar[$row][$i] = $day;
                }
                $day++;
            }
            $row++;
        }

        return $calendar;
    }
}