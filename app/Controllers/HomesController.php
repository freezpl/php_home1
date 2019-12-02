<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Core\Services\CalendarService;

    class HomesController extends Controller {

        public function index($id = null) : View {
            return new View('homes/1/part1');
        }

        public function calendar() : View {
            if(isset($_POST['month']) && $_POST['month'] > 0 && $_POST['month'] <= 12)     
            {
                // $year = 2020;
                // $month = $_POST['month'];
                // $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                // $calendar = array();
                
                // $startDay = date('w', strtotime($year.'-'.$month.'-1'));
                // $lastDay = date('w', strtotime($year.'-'.$month.'-'.$daysInMonth));
                // $lastRow = false;
                // $row = 0;
                // $day = 1;
                // while($lastRow == false){
                //     for ($i=0; $i < 7; $i++) { 
                //         if($day == $daysInMonth) 
                //             $lastRow = true;
                        
                //         if($day < $startDay || ($day > $lastDay && $lastRow))
                //             $calendar[$row][$i] = 0;
                //         else{
                //             $calendar[$row][$i] = $day;
                //         }
                //         $day++;
                //     }
                //     $row++;
                // }
                //CalendarService::getCalendar($_POST['month']);
                print_r(CalendarService::getCalendar($_POST['month']));
                exit();
            }

            return new View('homes/1/part1');
        }
    }