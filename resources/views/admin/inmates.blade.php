<x-admin-layout>
    <div>
        <nav class="text-sm font-medium text-slate-700 dark:text-slate-300" aria-label="breadcrumb">
            <ol class="flex flex-wrap items-center gap-2">
                <li class="flex items-center gap-2">
                    <a href="#" class="hover:text-black dark:hover:text-white">Home</a>
                    <span aria-hidden="true">/</span>
                </li>

                <li class="text-main font-bold dark:text-white" aria-current="page">Inmates</li>
            </ol>
        </nav>
        <div class="mt-10">
            <livewire:admin.inmate-list />
            <script>
                function printOut(data) {
                    var mywindow = window.open('', '', 'height=1000,width=1000');
                    mywindow.document.head.innerHTML =
                        '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                    mywindow.document.body.innerHTML = '<div>' + data +
                        '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                    mywindow.document.close();
                    mywindow.focus(); // necessary for IE >= 10

                    setTimeout(() => {
                        mywindow.print();
                        mywindow.onafterprint = function() {
                            mywindow.close();
                        };
                    }, 1000);
                }
            </script>
        </div>
    </div>
</x-admin-layout>
