<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="mt-5">
        <x-button label="Submit Profile" right-icon="arrow-right" wire:click="submitProfile" spinner="submitProfile" dark />
    </div>
</div>
