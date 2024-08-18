<div>
    <h1 class="text-xl font-semibold text-gray-700 uppercase">Create New Inmate</h1>
    <div class="mt-5">

        {{ $this->form }}
    </div>
    <div class="mt-5 flex justify-end space-x-3 items-center">
        <x-button label="Close" negative icon="x" />
        <x-button label="Save Form" icon="save" class="font-medium" positive wire:click="submitForm"
            spinner="submitForm" />
    </div>
</div>
