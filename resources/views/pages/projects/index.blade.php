@extends('layouts.app')

@section('content')
    <style>
        .description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            /* Batasi hingga 3 baris, sesuaikan sesuai kebutuhan */
            max-height: 6rem;
            /* Sesuaikan dengan ukuran card */
            line-height: 1.5rem;
            /* Sesuaikan tinggi baris */
        }

        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <main class="flex-grow p-6">

        

        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">List Proyek</h4>

            <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
                <div class="flex items-center gap-2">
                    <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Proyek</a>
                </div>
            </div>
        </div>

        <div class="flex flex-auto flex-col">
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6" style="border-radius: 20px">
                @foreach ($projects as $project)
                    <div class="relative card flex flex-col justify-between"
                        style="height: 400px; border-radius: 20px; position: relative;">

                        {{-- @dd($project) --}}
                        {{-- @if ($project->type === 'team')
                            <div class="absolute top-0 left-0 h-full">
                                <div class="bg-success text-white font-bold text-xs py-2 px-3 mr-6 h-full flex items-center"
                                    style="writing-mode: vertical-rl;  border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                    TEAM
                                </div>
                            </div>
                        @else
                            <div class="absolute top-0 left-0 h-full">
                                <div class="bg-info text-white font-bold text-xs py-2 px-3 mr-6 h-full flex items-center"
                                    style="writing-mode: vertical-rl;  border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                    PERSONAL
                                </div>
                            </div>
                        @endif --}}

                        <div class="card-header">
                            <div class="flex justify-between items-center">

                                <!-- Project Name and Icon -->
                                <div class="w-full flex items-center">
                                    <div class="bg-primary/20 px-2 py-1 rounded-full me-2">
                                        <i class="ri-suitcase-line text-primary/90" style="font-size: 20px;"></i>
                                    </div>
                                    <h5 class="flex items-center card-title py-3 text-2xl ellipsis ml-3">
                                        {{ $project->name }}
                                    </h5>
                                </div>

                                <!-- Project Status -->
                                <div class="text-xs text-white rounded-md py-1 px-3 font-medium whitespace-nowrap"
                                    role="alert"
                                    style="max-width: 150px; text-align: center;
                                    background-color:
                                        @if ($project->status->value === 'not_started') #6c757d; /* Secondary */
                                        @elseif ($project->status->value === 'in_progress') #ffc107; /* Yellow */
                                        @elseif ($project->status->value === 'on_hold') #fd7e14; /* Orange */
                                        @elseif ($project->status->value === 'completed') #28a745; /* Green */
                                        @else #6c757d; /* Default - Secondary */ @endif">
                                    @if ($project->status->value === 'not_started')
                                        <span>Belum Dimulai</span>
                                    @elseif ($project->status->value === 'in_progress')
                                        <span>Sedang Berjalan</span>
                                    @elseif ($project->status->value === 'on_hold')
                                        <span>Tertunda</span>
                                    @elseif ($project->status->value === 'completed')
                                        <span>Selesai</span>
                                    @else
                                        <span>Status Tidak Diketahui</span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="py-3 px-6 flex-grow">
                            <h5 class="my-2">
                                <a href="{{ route('kanban.index') }}"
                                    class="text-slate-900 text-xl dark:text-slate-200">{{ $project->name }}</a>
                            </h5>
                            <p class="text-gray-500 text-sm mb-2 description">
                                {{ $project->description }}
                            </p>
                        </div>

                        <div class="flex flex-wrap items-end gap-2 ms-4 mb-6">
                            @if ($project->type === 'team')
                                <span
                                class="inline-flex items-center gap-1.5 py-0.5 px-6 rounded-full text-md font-medium bg-success/10 text-success">Tim</span>
                                @else
                                <span
                                class="inline-flex items-center gap-1.5 py-0.5 px-4 rounded-full text-md font-medium bg-info/10 text-info">Individual</span>
                            @endif
                        </div>

                        <div class="flex flex-wrap items-end gap-2 ms-4">
                            <div class="flex items-center">
                                <div class="-me-3">
                                    <a href="javascript: void(0);" data-fc-type="tooltip"
                                        data-fc-placement="top">
                                        <img src="assets/images/users/avatar-1.jpg" alt=""
                                            class="rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                    </a>
                                    <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                        role="tooltip">
                                        Tosha
                                        <div data-fc-arrow
                                            class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]">
                                        </div>
                                    </div>
                                </div> <!-- avatar-icon end -->

                                <div class="-me-3">
                                    <a href="javascript: void(0);" data-fc-type="tooltip"
                                        data-fc-placement="top">
                                        <img src="assets/images/users/avatar-5.jpg" alt=""
                                            class="rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                    </a>
                                    <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                        role="tooltip">
                                        Brain
                                        <div data-fc-arrow
                                            class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]">
                                        </div>
                                    </div>
                                </div> <!-- avatar-icon end -->

                                <div class="-me-3">
                                    <a href="javascript: void(0);" data-fc-type="tooltip"
                                        data-fc-placement="top">
                                        <div
                                            class="bg-success text-white font-medium flex items-center justify-center rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                            K
                                        </div>
                                    </a>
                                    <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                        role="tooltip">
                                        Hooker
                                        <div data-fc-arrow
                                            class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]">
                                        </div>
                                    </div>
                                </div> <!-- avatar-icon end -->

                                <div class="-me-3">
                                    <a href="javascript: void(0);" data-fc-type="tooltip"
                                        data-fc-placement="top">
                                        <div
                                            class="bg-primary text-white font-medium flex items-center justify-center rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                            9+
                                        </div>
                                    </a>
                                    <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                        role="tooltip">
                                        More +
                                        <div data-fc-arrow
                                            class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]">
                                        </div>
                                    </div>
                                </div> <!-- avatar-icon end -->
                            </div> <!-- flex end -->
                        </div>


                        <!-- Footer with Task Progress -->
                        <div class="border-t p-5 border-gray-300 dark:border-gray-700 mt-5">
                            <div class="grid lg:grid-cols-2 gap-4">
                                <div class="flex items-center justify-between gap-2" style="">
                                    <a href="#" class="text-sm">
                                        <i class="ri-calendar-line text-lg me-2"></i>
                                        <span
                                            class="align-text-bottom">{{ \Carbon\Carbon::parse($project->start_date)->format('d M') }}</span>
                                    </a>

                                    <a href="#" class="text-sm">
                                        <i class="ri-file-line text-lg me-2"></i>
                                        <span class="align-text-bottom">1 / 10 Task</span>
                                    </a>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                                        <div class="bg-white h-1.5 rounded-full dark:bg-gray-800 w-2/3"></div>
                                    </div>
                                    <a href="{{ route('kanban.show', $project->id) }}"
                                        class="btn bg-primary text-white rounded-full">Kanban</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </main>
@endsection
