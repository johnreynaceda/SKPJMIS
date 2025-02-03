<div>
    <div>
        {{ $this->form }}
    </div>
    <div class="mt-10">
        <x-button dark label="Submit Form" right-icon="arrow-right" wire:click="submitForm" spinner="submitForm" />
    </div>
</div>
