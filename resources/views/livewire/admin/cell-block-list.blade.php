<div>
    <div>
        {{ $this->table }}
    </div>
    <div class="mt-5">
        <div
            class="bg-gradient-to-bl from-gray-700 to-gray-500 p-5 w-full rounded-2xl shadow-md relative overflow-hidden">
            <img src="{{ asset('images/cell.jpg') }}"
                class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10" alt="">
            <div class="mt-2">
                <h1 class="text-4xl font-black uppercase text-white">DISCHARGED </h1>
                <h1 class="text-gray-100 text-2xl font-medium mt-1">
                    {{\App\Models\Inmate::where('status', 'discharge')->count()}} Inmate(s)
                </h1>
            </div>
        </div>

    </div>

</div>