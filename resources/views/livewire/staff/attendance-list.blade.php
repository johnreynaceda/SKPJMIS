<div>
    <div class="space-y-10">
        <div>
            <h1 class="text-xl font-bold text-gray-700">Inmates</h1>
            <div class="mt-5 border-y py-2">
                <div>
                    @if ($inmates->count() > 0)
                        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="6"
                            space-between="30" free-mode="true">
                            @foreach ($inmates as $item)
                                <swiper-slide>
                                    <div class="h-40 w-48 border rounded-2xl p-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600" width="30"
                                            height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 21a6 6 0 0 0-12 0" />
                                            <circle cx="12" cy="11" r="4" />
                                            <rect width="18" height="18" x="3" y="3" rx="2" />
                                        </svg>
                                        <div class="mt-5">
                                            <p>{{ $item->inmate->fullname }}</p>
                                            <p class="text-sm">
                                                {{ \Carbon\Carbon::parse($item->date_of_attendance)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </swiper-slide>
                            @endforeach
                        </swiper-container>
                    @else
                        <span>No Attendance for today...</span>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-xl font-bold text-gray-700">Visitors</h1>
            <div class="mt-5 border-y py-2">
                <div>
                    @if ($visitors->count() > 0)
                        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true"
                            slides-per-view="6" space-between="30" free-mode="true">
                            @foreach ($visitors as $item)
                                <swiper-slide>
                                    <div class="h-40 w-48 border rounded-2xl p-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600" width="30"
                                            height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 21a6 6 0 0 0-12 0" />
                                            <circle cx="12" cy="11" r="4" />
                                            <rect width="18" height="18" x="3" y="3" rx="2" />
                                        </svg>
                                        <div class="mt-5">
                                            <p>{{ $item->visitor->fullname }}</p>
                                            <p class="text-sm">
                                                {{ \Carbon\Carbon::parse($item->date_of_attendance)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </swiper-slide>
                            @endforeach
                        </swiper-container>
                    @else
                        <span>No Attendance for today...</span>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-xl font-bold text-gray-700">Staffs</h1>
            <div class="mt-5 border-y py-2">
                <div>
                    @if ($staffs->count() > 0)
                        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true"
                            slides-per-view="6" space-between="30" free-mode="true">
                            @foreach ($staffs as $item)
                                <swiper-slide>
                                    <div class="h-40 w-48 border rounded-2xl p-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-600" width="30"
                                            height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 21a6 6 0 0 0-12 0" />
                                            <circle cx="12" cy="11" r="4" />
                                            <rect width="18" height="18" x="3" y="3" rx="2" />
                                        </svg>
                                        <div class="mt-5">
                                            <p>{{ $item->staff->fullname }}</p>
                                            <p class="text-sm">
                                                {{ \Carbon\Carbon::parse($item->date_of_attendance)->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </swiper-slide>
                            @endforeach
                        </swiper-container>
                    @else
                        <span>No Attendance for today...</span>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
</div>
