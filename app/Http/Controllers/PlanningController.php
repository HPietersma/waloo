<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Planning;

class PlanningController extends Controller
{
    public function createPlanningNextWeek(Request $request) {
        $company_id = $request->employee['company_id'];
        $employee_id = $request->employee['id'];
        $planning = $request->planning;

        $weekRoster = [];

        if ($request->user()->company_id == $company_id) {
            foreach ($planning['days'] as $key => $day) {
                $startTime = Carbon::createFromFormat('Y-m-d H:i', $day['date'] . $day["startTime"]);
                $endTime = Carbon::createFromFormat('Y-m-d H:i', $day['date'] . $day["endTime"]);
                $dayRoster = [];

                while ($startTime->timestamp < $endTime->timestamp) {
                    $dayRoster[] = Planning::create([
                        'user_id' => $employee_id,
                        'date' => $day['date'],
                        'time' => $startTime->format('H:i:s'),
                        'timestamp' => $startTime->format('Y-m-d H:i:s'),
                    ]);

                    $startTime->addMinutes(30);
                }

                $weekRoster[] = $dayRoster;
                
            }

            return $weekRoster;
        }

    }

    // public function getAvailableTimesbyUser(Request $request) {

    //     return AvailableTimes::where([
    //         ['user_id', '=', $request->user_id],
    //         ['date', '=', $request->date]
    //     ])->get();
    // }
    
}
