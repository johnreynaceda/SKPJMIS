<x-admin-layout>
    <div class="grid grid-cols-4 gap-5">
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">{{ \App\Models\Inmate::count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Inmates</h1>
            </div>
        </div>
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">{{ \App\Models\CellBlock::count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Cell Block</h1>
            </div>
        </div>
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">{{ \App\Models\Crime::count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Crimes</h1>
            </div>
        </div>
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">{{ \App\Models\Event::count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Activities</h1>
            </div>
        </div>
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">
                    {{ \App\Models\InmateAttendance::whereDate('created_at', now())->count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Daily Attendance</h1>
            </div>
        </div>
        <div class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-5">
                <h1 class="text-5xl font-black text-white">{{ \App\Models\Action::count() }}</h1>
                <h1 class="text-gray-200 mt-1 text-sm">Actions</h1>
            </div>
        </div>
    </div>
</x-admin-layout>
