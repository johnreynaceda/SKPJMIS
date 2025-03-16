<div>
    <div class="bg-white p-5 rounded-xl">
        <div class="flex space-x-4 items-center mb-5">
            <x-button label="BACK" href="{{route('staff.events')}}" class="font-semibold" />
            <h1 class="text-xl font-bold text-gray-700">{{$event_name}} Attendance</h1>
        </div>
        {{$this->table}}
        <div>
        </div>
    </div>
</div>