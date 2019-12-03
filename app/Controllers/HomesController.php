<?php

namespace App\Controllers;

use \App\Core\Controller;
use \App\Core\View;
use \App\Core\Services\CalendarService;
use \DateTime;

    class HomesController extends Controller {

        public function index($id = null) : View {
            return new View('homes/1/part1');
        }

        public function calendar() : View {
            $data = array();
            if(isset($_POST['month']) && $_POST['month'] > 0 && $_POST['month'] <= 12)
            {
               $data['calendar'] = CalendarService::getCalendar($_POST['month']);
               $dateObj   = DateTime::createFromFormat('!m', $_POST['month']);
               $monthName = $dateObj->format('F'); 
               $data['month'] = $monthName;
               $data['monthNum'] = $_POST['month'];
            }    

            return new View('homes/1/part1', $data);
        }
    }