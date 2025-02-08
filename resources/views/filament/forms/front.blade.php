@if ($getRecord()->descriptiveInformation)
    <div class="div w-full rounded-xl border p-5">
        <h1>FRONT</h1>
        <img src="{{ asset(Storage::url($getRecord()->descriptiveInformation->front_path)) }}"
            class="h-96 w-full rounded-xl" alt="">

    </div>
@else
    <x-input label="Front" type="file" wire:model="front" />
@endif
