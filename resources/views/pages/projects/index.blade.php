@extends('layouts.app')

@section('content')
    <style>
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
            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($projects as $project)
                    <div class="relative card flex flex-col justify-between hover:shadow-lg hover:scale-105 transition-all duration-200"
                        style="height: 400px; border-radius: 20px; position: relative;">

                            <div class="card-header p-4 bg-white rounded-xl rounded-b-none">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="bg-info/20 px-3 py-1 rounded-full me-3">
                                            <i class="ri-suitcase-line text-info" style="font-size: 30px;"></i>
                                        </div>
                                        <h5 class="text-black card-title text-2xl sm:text-lg ellipsis">
                                            {{ $project->name }}
                                        </h5>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                        <div class="flex items-center">
                                            @if ($project->status->value === 'not_started')
                                                <span
                                                    class="inline-flex items-center gap-1.5 py-0.5 px-3 rounded-full text-md font-medium bg-dark/10 text-dark badge-status">
                                                    Belum Dimulai
                                                </span>
                                            @elseif ($project->status->value === 'in_progress')
                                                <span
                                                    class="inline-flex items-center gap-3 py-0.5 px-3 rounded-full text-md font-medium bg-warning/10 text-warning">
                                                    Sedang Berjalan
                                                </span>
                                            @elseif ($project->status->value === 'on_hold')
                                                <span
                                                    class="inline-flex items-center gap-3 py-0.5 px-3 rounded-full text-md font-medium bg-danger/10 text-danger">
                                                    Tertunda
                                                </span>
                                            @elseif ($project->status->value === 'completed')
                                                <span
                                                    class="inline-flex items-center gap-1.5 py-0.5 px-4 rounded-full text-md font-medium bg-success/10 text-success">
                                                    Selesai
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-1.5 py-0.5 px-1.5 rounded-full text-md font-medium bg-dark/10 text-dark">
                                                    Status Tidak Diketahui
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="dropdown ml-auto">
                                            <a href="javascript:void(0)" class="" data-fc-type="dropdown" data-fc-placement="bottom-end">
                                                <i class="ri-more-fill"></i>
                                            </a>
                                            <div
                                                class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-60 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-3 absolute hidden">
                                                <a data-fc-target="editProject" type="button" data-fc-type="modal"
                                                    class="flex items-center py-2 px-5 text-base text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                                    href="javascript:void(0)">
                                                    <i class="ri-edit-box-line me-1.5"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="flex items-center py-2 px-5 text-base text-danger hover:bg-slate-100 dark:hover:bg-gray-700"
                                                    href="javascript:void(0)">
                                                    <i class="ri-delete-bin-line me-1.5"></i>

                                                    <span>Remove</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <div class="card-body p-6 flex-grow bg-white">
                            <h5 class="text-slate-900 text-xl dark:text-slate-200 mb-2">
                                {{ $project->subtitle }}
                            </h5>
                            <p class="text-gray-500 text-sm mb-4 description">
                                {{ $project->description }}
                            </p>

                            <div class="">
                                @if ($project->type === 'team')
                                    <span
                                        class="inline-flex items-center gap-1.5 py-0.5 px-5 rounded-full text-md font-medium border border-success text-success">
                                        Tim
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 py-0.5 px-5 rounded-full text-md font-medium border border-info text-info">
                                        Individual
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="flex items-center p-6">
                            <div class="-me-3">
                                <img src="assets/images/users/avatar-1.jpg" alt="" class="rounded-full h-8 w-8">
                            </div>
                            <div class="-me-3">
                                <img src="assets/images/users/avatar-5.jpg" alt="" class="rounded-full h-8 w-8">
                            </div>
                            <div class="-me-3">
                                <div class="bg-success text-white flex items-center justify-center rounded-full h-8 w-8">
                                    K
                                </div>
                            </div>
                            <div class="-me-3">
                                <div class="bg-primary text-white flex items-center justify-center rounded-full h-8 w-8">
                                    9+
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-4 border-t border-gray-300 dark:border-gray-700 bg-white rounded-xl">
                            <div class="flex items-center justify-between w-full px-2">
                                <div class="flex items-center gap-2">
                                    <i class="ri-calendar-line text-info text-lg me-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($project->start_date)->format('d M') }}</span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <i class="ri-file-line text-info text-lg me-2"></i>
                                    <span>1 / 10 Task</span>
                                </div>

                                {{-- data-fc-target="editProject" type="button" data-fc-type="modal" --}}
                                <a href="{{ route('kanban.show', $project->id) }}"
                                    class="btn bg-info text-white rounded-lg">
                                    Kanban
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

        {{-- ini modalnya edit project --}}

        <div class="">
            <div id="editProject"
                class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto flex items-center justify-center">
                <div
                    class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl dark:bg-gray-800 relative">

                    <div class="p-4 overflow-y-auto rounded-xl relative">

                        <div class="flex items-center justify-between mb-8 px-5 mt-5">
                            <h2 class="text-lg font-semibold text-black dark:text-slate-200">Edit Proyek</h2>
                            <button id="closeModal" data-fc-dismiss class="text-gray-500 hover:text-gray-700">
                                <!-- Ikon X menggunakan SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>


                        <form class="px-6" action="{{ route('projects.store') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="space-y-6 mb-6">
                                <div>
                                    {{-- <label for="project-type" class="font-semibold text-gray-500">Tipe Project
                                        <span class="text-danger">*</span></label> --}}
                                    <div class="mx-8 shadow rounded-xl h-10 mb-6 flex p-1 relative items-center">

                                        <div class="w-full flex justify-center">
                                            <button type="button" id="leftButton" class="toggle-button">Individu</button>
                                        </div>
                                        <div class="w-full flex justify-center">
                                            <button type="button" id="rightButton" class="toggle-button">Tim</button>
                                        </div>
                                        <span id="elSwitch"
                                            class="elSwitch bg-info shadow text-white flex items-center justify-center w-1/2 rounded-xl h-8 transition-all top-[4px] absolute left-1">
                                            Individu
                                        </span>
                                        <input type="hidden" id="selectedType" name="type" value="individual">
                                    </div>
                                </div>

                                <div class="flex justify-between gap-4 mb-6">
                                    <div class="flex-1 space-y-1">
                                        <label for="project-name" class="font-semibold text-gray-500">Judul
                                            <span class="text-danger">*</span></label>
                                        <input class="form-input w-full" type="text" id="project-name" name="name"
                                            placeholder="Berikan judul proyek" required>
                                    </div>

                                    <div class="flex-1 space-y-1">
                                        <label for="project-subtitle" class="font-semibold text-gray-500">Sub judul
                                            <span class="text-danger">*</span></label>
                                        <input class="form-input w-full" type="text" id="project-subtitle"
                                            name="subtitle" placeholder="Berikan sub judul proyek" required>
                                    </div>
                                </div>

                                <div class="space-y-1 mb-6">
                                    <label for="project-description" class="font-semibold text-gray-500">Deskripsi
                                        <span class="text-danger">*</span></label>
                                    <textarea class="form-input" id="project-description" name="description" rows="4"
                                        placeholder="Berikan deskripsi untuk proyek" required></textarea>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <label for="start-date" class="font-semibold text-gray-500">Start Date</label>
                                        <input class="form-input" type="date" id="start-date" name="start_date"
                                            required>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="end-date" class="font-semibold text-gray-500">End Date</label>
                                        <input class="form-input" type="date" id="end-date" name="end_date"
                                            required>
                                    </div>
                                </div>

                                <div class="space-y-1">
                                    <label for="project-name" class="font-semibold text-gray-500">Assign
                                        <span class="text-danger"></span></label>
                                    <input class="form-input" type="text" id="project-name" name="name"
                                        placeholder="Cari pengguna atau kelompok" required>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const leftButton = document.getElementById('leftButton');
                                        const rightButton = document.getElementById('rightButton');
                                        const elSwitch = document.getElementById('elSwitch');
                                        const selectedType = document.getElementById('selectedType');

                                        leftButton.addEventListener('click', function() {
                                            elSwitch.style.transform = 'translateX(0)';
                                            elSwitch.textContent = 'Individu';
                                            selectedType.value = 'individual';
                                        });

                                        rightButton.addEventListener('click', function() {
                                            elSwitch.style.transform = 'translateX(100%)';
                                            elSwitch.textContent = 'Tim';
                                            selectedType.value = 'team';
                                        });
                                    });
                                </script>


                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn border-danger text-danger hover:bg-danger hover:text-white rounded-lg"
                                        data-fc-dismiss="">Batal</button>
                                    <button class="btn bg-info rounded-lg text-white" type="submit">Konfirmasi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </main>
@endsection
