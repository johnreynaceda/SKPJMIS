<div>
    <div class="bg-white p-5 rounded-xl">
        <div>
            {{$this->form}}
        </div>
        <div class="mt-5">
            <x-button label="Create User" slate wire:click="submitUser" spinner="submitUser" />
        </div>
    </div>
</div>