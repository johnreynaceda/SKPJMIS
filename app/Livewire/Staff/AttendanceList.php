<?php

namespace App\Livewire\Staff;

use App\Models\InmateAttendance;
use App\Models\StaffAttendance;
use App\Models\VisitorAttendance;
use Livewire\Component;

class AttendanceList extends Component
{
    public function render()
    {
        return view('livewire.staff.attendance-list',[
            'inmates' => InmateAttendance::whereDate('date_of_attendance', now())->orderBy('date_of_attendance', 'DESC')->get(),
            'visitors' => VisitorAttendance::whereDate('date_of_attendance', now())->orderBy('date_of_attendance', 'DESC')->get(),
            'staffs' => StaffAttendance::whereDate('date_of_attendance', now())->orderBy('date_of_attendance', 'DESC')->get(),
        ]);
    }
}
