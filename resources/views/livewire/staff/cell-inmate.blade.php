<div>
    <div class="bg-white p-5 rounded-xl">
        <div class="flex space-x-4 items-center">
            <x-button label="BACK" href="{{route('staff.cell')}}" class="font-bold" />
            <h1 class="text-2xl font-bold ">{{$block_name}}</h1>
        </div>
        <div class="mt-3">
            {{$this->table}}
        </div>
    </div>
</div>