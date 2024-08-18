<div class="bg-gradient-to-bl h-40 from-gray-700 to-gray-500 p-5 w-full rounded-2xl shadow-md relative overflow-hidden">
    <img src="{{ asset('images/cell.jpg') }}" class="absolute top-0 bottom-0 w-full h-full object-cover left-0 opacity-10"
        alt="">
    <div class="mt-5">
        <h1 class="text-4xl font-black uppercase text-white">{{ $getRecord()->name }}</h1>
        <h1 class="text-gray-100 font-medium mt-1 ">{{ $getRecord()->cellInmates->count() }} Inmate(s)</h1>
    </div>
</div>
