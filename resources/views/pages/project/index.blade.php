@extends('layouts.app')

@section('content')
    <style>
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
                        style="height: 350px; border-radius: 20px; position: relative;">

                        {{-- @dd($project) --}}
                        @if ($project->type === 'team')
                            <div class="absolute top-0 left-0 h-full">
                                <div class="bg-success text-white font-bold text-xs py-2 px-2 mr-6 h-full flex items-center"
                                    style="writing-mode: vertical-rl;  border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                    TEAM
                                </div>
                            </div>
                        @else
                            <div class="absolute top-0 left-0 h-full">
                                <div class="bg-info text-white font-bold text-xs py-2 px-2 mr-6 h-full flex items-center"
                                    style="writing-mode: vertical-rl;  border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                                    PERSONAL
                                </div>
                            </div>
                        @endif

                        <div class="card-header">
                            <div class="flex justify-between items-center">

                                <!-- Project Name and Icon -->
                                <div class="w-full flex items-center">
                                    <div class="bg-primary/20 px-2 py-1 rounded-full me-2" style="margin-left: 1.5rem;">
                                        <i class="ri-suitcase-line text-primary/90" style="font-size: 20px;"></i>
                                    </div>
                                    <h5 class="flex items-center card-title py-3 ellipsis ml-3">
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
                            <h5 class="my-2 ellipsis" style="margin-left: 1.5rem;">
                                <a href="{{ route('kanban.index') }}"
                                    class="text-slate-900 dark:text-slate-200">{{ $project->name }}</a>
                            </h5>
                            <p class="text-gray-500 text-sm mb-4 ellipsis" style="margin-left: 1.5rem;">
                                {{ $project->description }}</p>
                        </div>

                        <!-- Footer with Task Progress -->
                        <div class="border-t p-5 border-gray-300 dark:border-gray-700">
                            <div class="grid lg:grid-cols-2 gap-4">
                                <div class="flex items-center justify-between gap-2" style="margin-left: 1.5rem;">
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
