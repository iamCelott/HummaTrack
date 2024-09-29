@extends('layouts.app')

@section('content')

    {{-- <style>
        .description {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            max-height: 6rem;
            line-height: 1.5rem;
        }

        .ellipsis {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style> --}}

    @php
        use App\Helpers\ImageProfileHelper;
        $userId = Auth::id();
        $hasCreatedProject = \App\Models\Project::where('created_by', $userId)->exists();
    @endphp

    @if ($hasCreatedProject)
        <div class="flex relative w-full bg-white mb-6 px-6 py-3 items-center justify-between rounded-md overflow-hidden">
            <img src="{{ asset('assets/images/elements/wave-right.png') }}" class="absolute top-0 left-0 sm:h-14 md:h-16"
                alt="">
            <h1 class="text-sm sm:text-lg md:text-2xl font-bold">PROYEK</h1>
            <div class="flex gap-3 items-center h-8 md:h-10 justify-between relative">
                <i class="ri-search-line absolute sm:top-1.5 md:top-2.5 left-3"></i>
                <form action="{{ route('projects.index') }}" method="GET">
                    @csrf
                    <input name="search" placeholder="cari proyek anda disini...." type="text"
                        class="rounded-md h-full bg-white w-[15rem] md:w-[20rem] lg:w-[25rem] xl:w-[30rem] px-8"
                        style="border: 2px solid #cacaca">
                </form>
                <button data-fc-target="createProject" data-fc-type="modal"
                    class="rounded-md text-xs sm:text-sm sm:py-1.5 h-full sm:px-3 text-white outline-none"
                    style="background-color: #0396fe"><i class="ri-menu-add-line"></i>
                    Tambah Proyek</button>
            </div>
        </div>
    @endif

    @hasrole('admin')
    @endhasrole

    @hasrole('member')
        @if ($hasCreatedProject)
            <div class="flex flex-auto flex-col">
                <div class="grid md:px-12 md:grid-cols-1 lg:px-0 lg:grid-cols-2 gap-6">
                    @forelse ($projects as $project)
                        <div class="relative card flex flex-col justify-between hover:shadow-lg overflow-hidden hover:scale-105 transition-all duration-200"
                            style="height: 400px; border-radius: 20px; position: relative;">
                            <img class="absolute top-1/6 -right-10 translate-y-1/2" src="{{ asset('assets/images/bulat.png') }}"
                                alt="">
                            <div class="card-header p-4 bg-white rounded-xl rounded-b-none">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="bg-info/20 px-3 py-1 rounded-full me-3">
                                            <i class="ri-suitcase-line text-info" style="font-size: 30px;"></i>
                                        </div>
                                        <h5 class="text-black card-title text-sm sm:text-xl lg:text-3xl font-bold ellipsis">
                                            {{ $project->name }}
                                        </h5>
                                    </div>
                                    <div>
                                        <a href="javascript: void(0);" data-fc-type="dropdown" data-fc-placement="bottom-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24" fill="rgb(0,0,0)">
                                                <path
                                                    d="M12 3C10.9 3 10 3.9 10 5C10 6.1 10.9 7 12 7C13.1 7 14 6.1 14 5C14 3.9 13.1 3 12 3ZM12 17C10.9 17 10 17.9 10 19C10 20.1 10.9 21 12 21C13.1 21 14 20.1 14 19C14 17.9 13.1 17 12 17ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z">
                                                </path>
                                            </svg>
                                        </a>
                                        <div
                                            class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                            <button
                                                class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                data-fc-target="editModal" data-fc-type="modal" type="button"><i
                                                    class="far fa-pencil mr-1"></i>
                                                <span>Edit</span></button>
                                            <button
                                                class="w-full flex items-center py-1.5 px-5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                data-fc-target="deleteModal" data-fc-type="modal" type="button"><i
                                                    class="far fa-trash mr-1"></i>
                                                <span>Delete</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="relative card-body p-6 py-3 flex-grow bg-white w-3/4 ">
                                <h5 class="text-slate-900 text-xl dark:black lg:text-2xl font-semibold mb-2">
                                    {{ $project->subtitle }}
                                </h5>
                                <p class="text-gray-500 text-sm mb-4 description ellipsis-3 ">
                                    {{ $project->description }}
                                </p>

                                <div class="flex gap-2">
                                    @if ($project->type === 'team')
                                        <span
                                            class="text-[#39b1e6] inline-flex items-center gap-1.5 py-0.5 px-6 rounded-lg text-md font-medium border bg-[#caebfa] text-success">
                                            Tim
                                        </span>
                                    @else
                                        <span
                                            class="text-[#60d265] inline-flex items-center gap-1.5 py-0.5 px-6 rounded-lg text-md font-medium border bg-[#d9f7db] text-info">
                                            Individual
                                        </span>
                                    @endif

                                    <div class="flex items-center">
                                        @if ($project->status->value === 'not_started')
                                            <span
                                                class="inline-flex items-center gap-1.5 py-2 px-3 lg:px-6 rounded-lg text-md font-medium bg-dark/10 text-dark badge-status ">
                                                Belum Dimulai
                                            </span>
                                        @elseif ($project->status->value === 'in_progress')
                                            <span
                                                class="inline-flex items-center gap-3 py-0.5 px-3 lg:px-6 rounded-lg text-md font-medium bg-warning/10 text-warning">
                                                Sedang Berjalan
                                            </span>
                                        @elseif ($project->status->value === 'on_hold')
                                            <span
                                                class="inline-flex items-center gap-3 py-0.5 px-3 lg:px-6 rounded-lg text-md font-medium bg-danger/10 text-danger">
                                                Tertunda
                                            </span>
                                        @elseif ($project->status->value === 'completed')
                                            <span
                                                class="inline-flex items-center gap-1.5 py-0.5 px-4 lg:px-6 rounded-lg text-md font-medium bg-success/10 text-success">
                                                Selesai
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 py-0.5 px-1.5 lg:px-6 rounded-lg text-md font-medium bg-dark/10 text-dark">
                                                Status Tidak Diketahui
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-6 py-3 pt-2">
                                @forelse ($project->teams->flatMap->users as $user)
                                    <div class="-me-2">
                                        <img src="{{ ImageProfileHelper::getPhotoProfile($user->photo_profile) }}"
                                            alt="{{ $user->name }}" class="rounded-full h-8 w-8">
                                    </div>
                                @empty
                                @endforelse
                            </div>

                            <div class="card-footer p-3 border-t border-[#cacaca] bg-white rounded-b-xl">
                                <div class="flex items-center justify-between w-full px-2">
                                    <div class="flex items-center gap-1">
                                        <i class="ri-calendar-line text-info text-lg me-2"></i>
                                        <span>{{ \Carbon\Carbon::parse($project->start_date)->format('d M') }}</span>
                                    </div>

                                    <div class="flex items-center gap-1">
                                        <i class="ri-time-line text-info text-lg me-2"></i>
                                        <span>{{ \Carbon\Carbon::parse($project->end_date)->format('d M') }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <i class="ri-file-line text-info text-lg me-2"></i>

                                        @php
                                            $doneCount = 0;
                                            if ($project->kanban && $project->kanban->task) {
                                                foreach ($project->kanban->task as $task) {
                                                    if ($task->status === 'done') {
                                                        $doneCount++;
                                                    }
                                                }
                                            }
                                        @endphp
                                        <span>Project Selesai
                                            {{ $doneCount }}/{{ $project->kanban && $project->kanban->task ? $project->kanban->task->count() : '0' }}</span>
                                    </div>

                                    <a href="{{ route('kanban.show', $project->id) }}" data-project-id="{{ $project->id }}"
                                        class="openKanbanBtn btn bg-info text-white rounded-lg">
                                        Kanban
                                    </a>
                                </div>
                            </div>

                        </div>
                    @empty
                        <h1 class="font-bold text-lg">Project {{ request('search') }} tidak ditemukan.</h1>
                    @endforelse

                    <script>
                        $(document).ready(function() {
                            $(document).on('click', '.openKanbanBtn', function() {
                                var projectId = $(this).data('project-id');

                                $.ajax({
                                    url: "{{ route('api.store.recent_projects') }}",
                                    type: 'POST',
                                    data: {
                                        user_id: {{ Auth::user()->id }},
                                        project_id: projectId
                                    },
                                    error: function(xhr) {
                                        alert('Error: ' + xhr.responseJSON.message);
                                    }
                                })
                            });
                        });
                    </script>
                </div>
            </div>
        @else
            <div class="flex justify-center items-center text-black">
                <div class="flex flex-col lg:mt-[2rem] 2xl:mt-[8rem]" style="max-width: 18rem;">
                    <div class="flex justify-center ">
                        <img src="{{ asset('assets/images/svg/no-team-logo.svg') }}" alt="">
                    </div>
                    <h1 class="py-3 text-center text-lg">Anda Belum Memiliki Project</h1>

                    <div class="mb-3">
                        <div class="flex gap-2 items-center mb-3">
                            <div class="flex justify-center items-center rounded-full"
                                style="background-color: #AEE6FF; width: 50px; height: 30px;">
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.00065 17.3333C6.63954 17.3333 6.31315 17.2465 6.02148 17.0729C5.72982 16.8993 5.50065 16.6666 5.33398 16.375C4.87565 16.375 4.48329 16.2118 4.1569 15.8854C3.83051 15.559 3.66732 15.1666 3.66732 14.7083V11.75C2.84787 11.2083 2.19162 10.493 1.69857 9.60413C1.20551 8.71524 0.958984 7.74996 0.958984 6.70829C0.958984 5.02774 1.54579 3.60065 2.7194 2.42704C3.89301 1.25343 5.3201 0.666626 7.00065 0.666626C8.68121 0.666626 10.1083 1.25343 11.2819 2.42704C12.4555 3.60065 13.0423 5.02774 13.0423 6.70829C13.0423 7.77774 12.7958 8.74996 12.3027 9.62496C11.8097 10.5 11.1534 11.2083 10.334 11.75V14.7083C10.334 15.1666 10.1708 15.559 9.8444 15.8854C9.51801 16.2118 9.12565 16.375 8.66732 16.375C8.50065 16.6666 8.27148 16.8993 7.97982 17.0729C7.68815 17.2465 7.36176 17.3333 7.00065 17.3333ZM5.33398 14.7083H8.66732V13.9583H5.33398V14.7083ZM5.33398 13.125H8.66732V12.3333H5.33398V13.125ZM5.16732 10.6666H6.37565V8.41663L4.54232 6.58329L5.41732 5.70829L7.00065 7.29163L8.58398 5.70829L9.45898 6.58329L7.62565 8.41663V10.6666H8.83398C9.58398 10.3055 10.1951 9.77427 10.6673 9.07288C11.1395 8.37149 11.3757 7.58329 11.3757 6.70829C11.3757 5.48607 10.952 4.45135 10.1048 3.60413C9.2576 2.7569 8.22287 2.33329 7.00065 2.33329C5.77843 2.33329 4.74371 2.7569 3.89648 3.60413C3.04926 4.45135 2.62565 5.48607 2.62565 6.70829C2.62565 7.58329 2.86176 8.37149 3.33398 9.07288C3.80621 9.77427 4.41732 10.3055 5.16732 10.6666Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <p class="text-xs">dengan membuat proyek, anda bisa melihat perkembangan proyek tujuan anda.</p>
                        </div>

                        <div class="flex gap-2">
                            <div class="flex justify-center items-center rounded-full"
                                style="background-color: #AEE6FF; width: 65px; height: 30px;">
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.79232 14.1667L10.1048 9.00008H6.77148L7.37565 4.27091L3.52148 9.83341H6.41732L5.79232 14.1667ZM3.66732 17.3334L4.50065 11.5001H0.333984L7.83398 0.666748H9.50065L8.66732 7.33341H13.6673L5.33398 17.3334H3.66732Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <p class="text-xs">dengan membuat proyek, anda dapat berkolaborasi dengan user atau tim untuk
                                menggapai satu tujuan yang sama.</p>
                        </div>
                    </div>

                    <button data-fc-type="modal" data-fc-target="createProject"
                        class="rounded-xl text-white py-2 mt-3 text-lg font-semibold outline-none"
                        style="background-color: #0288D1">
                        Buat Proyek
                    </button>
                </div>
            </div>
        @endif
    @endhasrole

    <style>
        .ellipsis-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

@endsection
