<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
    public function getNextWeek() {
        $weekNr = Carbon::now()->addWeek()->startOfWeek()->weekOfYear;
        $day1 = Carbon::now()->addWeek()->startOfWeek();
        $day2 = Carbon::now()->addWeek()->startOfWeek()->addDays(1);
        $day3 = Carbon::now()->addWeek()->startOfWeek()->addDays(2);
        $day4 = Carbon::now()->addWeek()->startOfWeek()->addDays(3);
        $day5 = Carbon::now()->addWeek()->startOfWeek()->addDays(4);
        $day6 = Carbon::now()->addWeek()->startOfWeek()->addDays(5);
        $day0 = Carbon::now()->addWeek()->startOfWeek()->addDays(6);


        return [
            'weekNr' => $weekNr,
            'days' => [
                'day1' => [
                    'date' => $day1->format('Y-m-d'),
                    'name' => 'maandag',
                    'day' => $day1->format('d'),
                    'month' => $day1->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day2' => [
                    'date' => $day2->format('Y-m-d'),
                    'name' => 'dinsdag',
                    'day' => $day2->format('d'),
                    'month' => $day2->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day3' => [
                    'date' => $day3->format('Y-m-d'),
                    'name' => 'woensdag',
                    'day' => $day3->format('d'),
                    'month' => $day3->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day4' => [
                    'date' => $day4->format('Y-m-d'),
                    'name' => 'donderdag',
                    'day' => $day4->format('d'),
                    'month' => $day4->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day5' => [
                    'date' => $day5->format('Y-m-d'),
                    'name' => 'vrijdag',
                    'day' => $day5->format('d'),
                    'month' => $day5->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day6' => [
                    'date' => $day6->format('Y-m-d'),
                    'name' => 'zaterdag',
                    'day' => $day6->format('d'),
                    'month' => $day6->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
                'day0' => [
                    'date' => $day0->format('Y-m-d'),
                    'name' => 'zondag',
                    'day' => $day0->format('d'),
                    'month' => $day0->format('m'),
                    'startTime' => '8:00',
                    'endTime' => '17:00',
                ],
            ],
        ];
    }

    public function getNext2ndWeek() {
        $weekNr = Carbon::now()->addWeeks(2)->startOfWeek()->weekOfYear;
        $day1 = Carbon::now()->addWeeks(2)->startOfWeek();
        $day2 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(1);
        $day3 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(2);
        $day4 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(3);
        $day5 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(4);
        $day6 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(5);
        $day7 = Carbon::now()->addWeeks(2)->startOfWeek()->addDays(6);


        return [
            'weekNr' => $weekNr,
            'days' => [
                'monday' => $day1,
                'tuesday' => $day2,
                'wednesday' => $day3,
                'thursday' => $day4,
                'friday' => $day5,
                'saturday' => $day6,
                'sunday' => $day7,
            ],
        ];
    }

    public function getNext3rdWeek() {
        $weekNr = Carbon::now()->addWeeks(3)->startOfWeek()->weekOfYear;
        $day1 = Carbon::now()->addWeeks(3)->startOfWeek();
        $day2 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(1);
        $day3 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(2);
        $day4 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(3);
        $day5 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(4);
        $day6 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(5);
        $day7 = Carbon::now()->addWeeks(3)->startOfWeek()->addDays(6);


        return [
            'weekNr' => $weekNr,
            'days' => [
                'monday' => $day1,
                'tuesday' => $day2,
                'wednesday' => $day3,
                'thursday' => $day4,
                'friday' => $day5,
                'saturday' => $day6,
                'sunday' => $day7,
            ],
        ];
    }
}
