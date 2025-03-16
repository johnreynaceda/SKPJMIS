<div>
    <h1> {{ucfirst($getRecord()->type_of_identification)}}</h1>
    <div class="mt-2">
        <span>Front</span>
        <a href="{{Storage::url($getRecord()->front_path)}}" target="_blank">
            <img src="{{Storage::url($getRecord()->front_path)}}" class="w-full border h-40 object-cover" alt="">
        </a>
    </div>
    <div class="mt-2">
        <span>Back</span>
        <a href="{{Storage::url($getRecord()->back_path)}}" target="_blank">
            <img src="{{Storage::url($getRecord()->back_path)}}" class="w-full border h-40 object-cover" alt="">
        </a>
    </div>
</div>