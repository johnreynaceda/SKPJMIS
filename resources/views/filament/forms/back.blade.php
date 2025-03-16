<div>
    @if ($getRecord()->descriptiveInformation)
        <div class="div w-full rounded-xl border p-5">
            <h1>BACK</h1>
            <img src="{{ asset(Storage::url($getRecord()->descriptiveInformation->back_path)) }}"
                class="h-96 w-full rounded-xl" alt="">
        </div>
    @else
        <input type="file" accept="image/*" wire:model="back" capture="environment" id="fileInput">
    @endif
</div>