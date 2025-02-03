@if ($getRecord()->descriptiveInformation->back_path)
    <div class="div w-full rounded-xl border p-5">
        <h1>BACK</h1>
        <img src="{{ asset(Storage::url($getRecord()->descriptiveInformation->back_path)) }}"
            class="h-96 w-full rounded-xl" alt="">

    </div>
@else
    <x-input label="Front" type="file" wire:model="back" />
@endif
