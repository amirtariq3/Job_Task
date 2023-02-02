<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class MeetingController extends Controller
{
    
    public function store(Request $request)
    {
        
    }

    // $occupied = [['09:00', '11:30'], ['13:30', '16:00'], ['16:00', '17:30'], ['17:45', '19:00']];
    // $occupied = [['09:15', '12:00'], ['14:00', '16:30'], ['17:00', '17:30']];
    // $occupied = [['11:30', '12:15'], ['15:00', '16:30'], ['17:45', '19:00']];
    
    function findEarliestAvailableSlot($start = '09:00', $end = '19:00', $duration = 60, $occupied = [['09:15', '12:00'], ['14:00', '16:30'], ['17:00', '17:30']]) {
        $start = strtotime($start);
        $end = strtotime($end);
        foreach ($occupied as $slot) {
            $start_occupied = strtotime($slot[0]);
            $end_occupied = strtotime($slot[1]);
            if ($start_occupied > $start) {
                $slot_end = strtotime("+{$duration} minutes", $start);
                if ($slot_end <= $start_occupied && $slot_end <= $end) {
                    return [date('H:i', $start), date('H:i', $slot_end)];
                }
            }
            $start = $end_occupied;
        }
        $slot_end = strtotime("+{$duration} minutes", $start);
        if ($slot_end <= $end) {
            return [date('H:i', $start), date('H:i', $slot_end)];
        }
        return null;
    }
}
