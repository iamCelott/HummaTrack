@extends('layouts.app')

@section('content')
<main class="p-6">

    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Calendar</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Apps</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Calendar</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid lg:grid-cols-4 gap-6">
        {{-- <div class="card h-full min-h-full "> --}}
            <div class="p-6">
                {{-- <button class="px-3 py-2 rounded bg-primary text-white text-base w-full mb-4" id="btn-new-event"><i class="mgc_add_line"></i> Create New Event</button> --}}

                <div class="flex flex-col gap-1" id="external-events">
                    {{-- <p class="text-sm text-slate-700 dark:text-slate-400 mb-4">Drag and drop your event or click in the calendar</p>
                    <button class="external-event bg-success px-3 py-2 rounded text-white text-base text-start w-full mb-2" data-class="bg-success">
                        <i class="mgc_round_fill me-3 vertical-middle"></i>New Theme Release
                    </button>
                    <button class="external-event bg-info px-3 py-2 rounded text-white text-base text-start w-full mb-2" data-class="bg-info">
                        <i class="mgc_round_fill me-3 vertical-middle"></i>My Event
                    </button>
                    <button class="external-event bg-warning px-3 py-2 rounded text-white text-base text-start w-full mb-2" data-class="bg-warning">
                        <i class="mgc_round_fill me-3 vertical-middle"></i>Meet manager
                    </button>
                    <button class="external-event bg-danger px-3 py-2 rounded text-white text-base text-start w-full mb-2" data-class="bg-danger">
                        <i class="mgc_round_fill me-3 vertical-middle"></i>Create New theme
                    </button> --}}
                </div>

                {{-- <div class="mt-5">
                    <h5 class="text-center mb-2">How It Works ?</h5>

                    <ul class="ps-3">
                        <li class="text-sm text-slate-700 dark:text-slate-400 mb-3">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </li>
                        <li class="text-sm text-slate-700 dark:text-slate-400 mb-3">
                            Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage.
                        </li>
                        <li class="text-sm text-slate-700 dark:text-slate-400 mb-3">
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>

        <div class="lg:col-span-3">
            <div class="card">
                <div class="p-6">
                    <div id="calendar"></div>
                </div>
            </div> <!-- end card -->
        </div>
    </div>
</main>
<!-- Fullcalendar Plugin Js -->
<script src="assets/libs/fullcalendar/index.global.min.js"></script>

<!-- Calendar Js -->
<script src="assets/js/pages/apps-calendar.js"></script>
@endsection

