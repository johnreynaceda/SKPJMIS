<div>
    <x-button label="Back" slate href="{{route('staff.inmates')}}" class="mb-10" />
    @if ($info)
        <div class="grid grid-cols-2 gap-10">
            <div>
                <div class="div w-full rounded-xl border p-5">
                    <h1>FRONT</h1>
                    <img src="{{ asset(Storage::url($info->front_path)) }}" class="h-96 w-full object-cover rounded-xl"
                        alt="">

                </div>
            </div>
            <div>
                <div class="div w-full rounded-xl border p-5">
                    <h1>BACK</h1>
                    <img src="{{ asset(Storage::url($info->back_path)) }}" class="h-96 w-full object-cover rounded-xl"
                        alt="">
                </div>
            </div>
        </div>
    @else
        <div>
            {{$this->form}}
        </div>
        <div class="mt-5">
            <x-button label="Submit" slate wire:click="save" />
        </div>
    @endif
</div>