<div>
    <h1 class="font-bold text-xl text-gray-700 uppercase">{{ $getRecord()->name }}</h1>
    <ul role="list" class="divide-y divide-gray-100 border rounded-xl p-5">
        @foreach ($getRecord()->cellInmates as $item)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">

                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 uppercase text-gray-900">{{ $item->inmate->fullname }}
                        </p>
                        <p class="mt-1 truncate text-xs leading-3 text-gray-500">
                            {{ \Carbon\Carbon::parse($item->inmate->created_at)->format('F d, Y') }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <x-button label="Delete" sm negative icon="trash" />
                </div>
            </li>
        @endforeach

    </ul>

</div>
