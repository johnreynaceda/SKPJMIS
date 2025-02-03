<div class="grid grid-cols-5 gap-5">
    <div class="border rounded-xl overflow-hidden">
        <div class="p-1 px-4  bg-gray-600 text-white"><span>THUMB</span></div>
        <center>
            <a href="{{ asset('images/' . $getRecord()->inmateFingerprint->left_thumb_path) }}" target="_blank">
                @if ($getRecord()->inmateFingerprint->left_thumb_path)
                    <img src="{{ asset('images/' . $getRecord()->inmateFingerprint->left_thumb_path) }}" class="h-40 w-40"
                        alt="left_thumb">
                @else
                    <img src="{{ asset('images/no_fingerprint.jpg') }}" class="h-40 w-40" alt="left_thumb">
                @endif
            </a>
        </center>
    </div>
    <div class="border rounded-xl overflow-hidden">
        <div class="p-1 px-4  bg-gray-600 text-white"><span>INDEX</span></div>
        <center>
            <a href="{{ asset('images/' . $getRecord()->inmateFingerprint->left_index_path) }}" target="_blank">
                @if ($getRecord()->inmateFingerprint->left_index_path)
                    <img src="{{ asset('images/' . $getRecord()->inmateFingerprint->left_index_path) }}"
                        class="h-40 w-40" alt="left_thumb">
                @else
                    <img src="{{ asset('images/no_fingerprint.jpg') }}" class="h-40 w-40" alt="left_thumb">
                @endif
            </a>
        </center>
    </div>
    <div class="border rounded-xl overflow-hidden">
        <div class="p-1 px-4  bg-gray-600 text-white"><span>MIDDLE</span></div>
        <center>
            <a href="{{ asset('images/' . $getRecord()->inmateFingerprint->left_middle_path) }}" target="_blank">
                @if ($getRecord()->inmateFingerprint->left_middle_path)
                    <img src="{{ asset('images/' . $getRecord()->inmateFingerprint->left_middle_path) }}"
                        class="h-40 w-40" alt="left_thumb">
                @else
                    <img src="{{ asset('images/no_fingerprint.jpg') }}" class="h-40 w-40" alt="left_thumb">
                @endif
            </a>
        </center>
    </div>
    <div class="border rounded-xl overflow-hidden">
        <div class="p-1 px-4  bg-gray-600 text-white"><span>RING</span></div>
        <center>
            <a href="{{ asset('images/' . $getRecord()->inmateFingerprint->left_ring_path) }}" target="_blank">
                @if ($getRecord()->inmateFingerprint->left_ring_path)
                    <img src="{{ asset('images/' . $getRecord()->inmateFingerprint->left_ring_path) }}"
                        class="h-40 w-40" alt="left_thumb">
                @else
                    <img src="{{ asset('images/no_fingerprint.jpg') }}" class="h-40 w-40" alt="left_thumb">
                @endif
            </a>
        </center>
    </div>
    <div class="border rounded-xl overflow-hidden">
        <div class="p-1 px-4  bg-gray-600 text-white"><span>LITTLE</span></div>
        <center>
            <a href="{{ asset('images/' . $getRecord()->inmateFingerprint->left_little_path) }}" target="_blank">
                @if ($getRecord()->inmateFingerprint->left_little_path)
                    <img src="{{ asset('images/' . $getRecord()->inmateFingerprint->left_little_path) }}"
                        class="h-40 w-40" alt="left_thumb">
                @else
                    <img src="{{ asset('images/no_fingerprint.jpg') }}" class="h-40 w-40" alt="left_thumb">
                @endif
            </a>
        </center>
    </div>

</div>
