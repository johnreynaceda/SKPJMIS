<x-staff-layout>
    <div>
        <nav class="text-sm font-medium text-slate-700 dark:text-slate-300" aria-label="breadcrumb">
            <ol class="flex flex-wrap items-center gap-2">
                <li class="flex items-center gap-2">
                    <a href="#" class="hover:text-black dark:hover:text-white">Home</a>
                    <span aria-hidden="true">/</span>
                </li>

                <li class="text-main font-bold dark:text-white" aria-current="page">Cell Inmates</li>
            </ol>
        </nav>
        <div class="mt-10">
            <livewire:staff.cell-inmate />
        </div>
    </div>
</x-staff-layout>