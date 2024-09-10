@extends('layouts.app')

@section('content')
    <main class="p-6">

        <!-- Page Title Start -->
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">{{ $kanban->name }}</h4>

            <div class="md:flex hidden items-center gap-2.5 font-semibold">
                <div class="flex items-center gap-2">
                    <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Proyek</a>
                </div>

                <div class="flex items-center gap-2">
                    <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                    <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Kanban</a>
                </div>
                {{--
                <div class="flex items-center gap-2">
                    <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                    <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                        aria-current="page">Kanban</a>
                </div> --}}
            </div>
        </div>
        <!-- Page Title End -->

        <div class="grid w-full">
            <div class="overflow-hidden text-gray-700 dark:text-slate-400">
                <div class="flex overflow-x-auto custom-scroll gap-6 pb-4 h-[calc(100vh-235px)]">

                    <div
                        class="flex flex-col flex-shrink-0 w-80 border rounded-md border-gray-200 dark:border-gray-700 p-4">


                        <div class="rounded-md">
                            <h5 class=" mb-4">TODO (3) <button href="" type="button" data-fc-type="modal"
                                    class="relative top-4 right-4 bg-success text-white px-3 py-1 rounded-md hover:bg-success"
                                    style="margin-left: 140px;">
                                    Task <i class="ri-add-line"></i>
                                </button>
                                {{-- <button class="btn bg-success relative top-4 right-4 bg-success text-white px-3 py-1 rounded-md hover:bg-success" data-fc-type="modal" type="button"> Sign Up Modal </button> --}}

                                <div
                                    class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto">
                                    <div
                                        class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded dark:bg-gray-800">
                                        <div class="p-4 overflow-y-auto">
                                            <div class="p-9">
                                                <h2 class="text-lg font-semibold text-gray-900 dark:text-slate-200">Tambah
                                                    Tugas Baru</h2>
                                            </div>

                                            <form class="px-6" action="{{ route('tasks.store') }}" method="POST">
                                                @csrf
                                                <div class="space-y-1 mb-6">
                                                    <label for="name" class="font-semibold text-gray-500">Name</label>
                                                    <input class="form-input" type="text" id="name" name="name"
                                                        placeholder="Name">
                                                </div>

                                                <div class="space-y-1 mb-6">
                                                    <label for="kanban_id" class="font-semibold text-gray-500">
                                                        Project
                                                    </label>
                                                    <input class="form-input" name="kanban_id" type="hidden" id="kanban_id"
                                                        placeholder="{{ $kanban->name }}" value="{{ $kanban->id }}">
                                                    <input class="form-input" type="text" id="kanban_id"
                                                        placeholder="{{ $kanban->name }}" value="{{ $kanban->name }}"
                                                        disabled>
                                                </div>

                                                <div class="space-y-1 mb-6">
                                                    <label for="user_id" class="font-semibold text-gray-500">Nama
                                                        User</label>
                                                    <select class="form-select" id="user_id" name="user_id">
                                                        <option value="">Pilih Nama User</option>

                                                        @forelse($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @empty
                                                            <option value="">Tidak ada pengguna tersedia</option>
                                                        @endforelse
                                                    </select>
                                                </div>

                                                <div class="space-y-1 mb-6">
                                                    <label for="description"
                                                        class="font-semibold text-gray-500">Deskripsi</label>
                                                    <textarea class="form-input" id="description" name="description" rows="4" placeholder="Deskripsi tugas"></textarea>
                                                </div>


                                                <div class="mb-6">
                                                    <div class="flex items-center">
                                                        <input type="checkbox" class="form-checkbox rounded text-primary"
                                                            id="checkbox-signin">
                                                        <label class="ms-2 text-sm font-medium text-gray-500"
                                                            for="checkbox-signin">I accept <a href="#">Terms and
                                                                Conditions</a></label>
                                                    </div>
                                                </div>

                                                <div class="mb-6 text-center">
                                                    <button class="btn bg-danger text-white" data-fc-dismiss type="button"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button class="btn bg-primary text-white" type="submit">Tambah
                                                        Tugas</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </h5>



                        <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                            id="kanbanborad-one">


                            <!-- Task Item -->
                            {{-- {{ dd($kanban->task) }} --}}
                            @php
                                $to_do = $kanban->task()->where('status', 'to_do')->get();
                                $in_progres = $kanban->task()->where('status', 'in_progres')->get();
                                $review = $kanban->task()->where('status', 'review')->get();
                                $done = $kanban->task()->where('status', 'done')->get();
                            @endphp
                            @forelse ($to_do as $task)
                                <div class="card cursor-pointer">
                                    <div class="p-6">

                                        <div class="flex justify-between items-center">
                                            <span
                                                class="inline-flex items-center gap-1.5 px-1 rounded-md text-xs font-medium bg-danger/10 text-danger">High</span>
                                        </div>


                                        <h5 class="my-2">
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                type="button"
                                                class="text-base text-gray-700 dark:text-slate-400 font-medium">
                                                {{ $task->name }}
                                            </a>
                                        </h5>

                                        <p class="space-x-3">
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-briefcase-2-line text-gray-500 dark:text-gray-400"></i>
                                                {{ $task->kanban->project->name }}
                                            </span>
                                            {{-- <span class="text-nowrap mb-2">
                                                <i class="ri-discuss-line text-gray-500 dark:text-gray-400"></i>
                                                <b class="text-gray-500 dark:text-gray-400">Deskripsi :</b>
                                                {{ $task->description }}
                                            </span> --}}
                                        </p> <!-- space end -->

                                        <div class="mt-5">
                                            <div class="flex items-center">
                                                <div class="-me-3">
                                                    <a href="javascript: void(0);" data-fc-type="tooltip"
                                                        data-fc-placement="top">
                                                        <img src="{{ $task->user->photo_profile }}"
                                                            class="rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                                    </a>
                                                    <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                                        role="tooltip">
                                                        {{ $task->user->name }}
                                                        <div data-fc-arrow
                                                            class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]">
                                                        </div>
                                                    </div>
                                                </div> <!-- avatar-icon end -->


                                            </div> <!-- flex end -->
                                        </div>

                                    </div>
                                </div> <!-- Task Item End -->
                            @empty
                                {{-- {{ dd($todo) }} --}}
                                Kosong
                            @endforelse
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>


                        </div> <!-- end company-list-1-->
                    </div>

                    <div
                        class="flex flex-col flex-shrink-0 w-80 border rounded-md border-gray-200 dark:border-gray-700 p-4">

                        <h5 class="uppercase mb-4">In Progress (2)</h5>

                        <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                            id="kanbanborad-two">

                            @forelse ($in_progres as $task)
                                <div class="card cursor-pointer">
                                    <div class="p-6">

                                        <div class="flex justify-between items-center">
                                            <small>18 Jul 2023</small>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-1 rounded-md text-xs font-medium bg-danger/10 text-danger">High</span>
                                        </div>


                                        <h5 class="my-2">
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                type="button"
                                                class="text-base text-gray-700 dark:text-slate-400 font-medium">iOS App
                                                home
                                                page</a>
                                        </h5>

                                        <p class="space-x-3">
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-briefcase-2-line text-gray-500 dark:text-gray-400"></i> iOS
                                            </span>
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-discuss-line text-gray-500 dark:text-gray-400"></i>
                                                <b class="text-gray-500 dark:text-gray-400">74</b> Comments
                                            </span>
                                        </p> <!-- space end -->

                                        <div class="mt-5">
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

                                    </div>
                                </div> <!-- Task Item End -->
                            @empty
                                {{-- {{ dd($todo) }} --}}
                                Kosong
                            @endforelse

                        </div> <!-- end company-list-1-->
                    </div>

                    <div
                        class="flex flex-col flex-shrink-0 w-80 border rounded-md border-gray-200 dark:border-gray-700 p-4">

                        <h5 class="uppercase mb-4">Review (4)</h5>

                        <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                            id="kanbanborad-three">

                            @forelse ($review as $task)
                                <div class="card cursor-pointer">
                                    <div class="p-6">

                                        <div class="flex justify-between items-center">
                                            <small>18 Jul 2023</small>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-1 rounded-md text-xs font-medium bg-danger/10 text-danger">High</span>
                                        </div>


                                        <h5 class="my-2">
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                type="button"
                                                class="text-base text-gray-700 dark:text-slate-400 font-medium">iOS App
                                                home
                                                page</a>
                                        </h5>

                                        <p class="space-x-3">
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-briefcase-2-line text-gray-500 dark:text-gray-400"></i> iOS
                                            </span>
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-discuss-line text-gray-500 dark:text-gray-400"></i>
                                                <b class="text-gray-500 dark:text-gray-400">74</b> Comments
                                            </span>
                                        </p> <!-- space end -->

                                        <div class="mt-5">
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

                                    </div>
                                </div> <!-- Task Item End -->
                            @empty
                                {{-- {{ dd($todo) }} --}}
                                Kosong
                            @endforelse

                        </div> <!-- end company-list-1-->
                    </div>

                    <div
                        class="flex flex-col flex-shrink-0 w-80 border rounded-md border-gray-200 dark:border-gray-700 p-4">

                        <h5 class="uppercase mb-4">Done (1)</h5>

                        <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                            id="kanbanborad-four">

                            @forelse ($review as $task)
                                <div class="card cursor-pointer">
                                    <div class="p-6">

                                        <div class="flex justify-between items-center">
                                            <small>18 Jul 2023</small>
                                            <span
                                                class="inline-flex items-center gap-1.5 px-1 rounded-md text-xs font-medium bg-danger/10 text-danger">High</span>
                                        </div>


                                        <h5 class="my-2">
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                type="button"
                                                class="text-base text-gray-700 dark:text-slate-400 font-medium">iOS App
                                                home
                                                page</a>
                                        </h5>

                                        <p class="space-x-3">
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-briefcase-2-line text-gray-500 dark:text-gray-400"></i> iOS
                                            </span>
                                            <span class="text-nowrap mb-2">
                                                <i class="ri-discuss-line text-gray-500 dark:text-gray-400"></i>
                                                <b class="text-gray-500 dark:text-gray-400">74</b> Comments
                                            </span>
                                        </p> <!-- space end -->

                                        <div class="mt-5">
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

                                    </div>
                                </div> <!-- Task Item End -->
                            @empty
                                {{-- {{ dd($todo) }} --}}
                                Kosong
                            @endforelse

                        </div> <!-- end company-list-1-->
                    </div>
                </div> <!-- end board-->
            </div>
        </div>

        <!--Verically centered modal-->
        <div id="task-detail-modal"
            class="fc-modal fixed start-0 top-0 z-50 hidden fc-modal:flex h-full w-full items-center overflow-y-auto">
            <div
                class="pointer-events-none relative w-auto -translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 transition-all duration-300 ease-in-out sm:max-w-2xl md:max-w-3xl sm:w-full min-h-full flex items-center sm:mx-auto">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md bg-white shadow-lg dark:bg-gray-800 m-4">
                    <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                        <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                            iOS App home page
                            <span
                                class="inline-flex items-center gap-1.5 p-1 rounded-md text-xs font-medium bg-danger text-white ms-3">High</span>
                        </h3>

                        <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                            data-fc-dismiss type="button">
                            <i class="ri-close-line text-xl"></i>
                        </button> <!-- close-button end -->
                    </div> <!-- flex end -->

                    <div class="px-4 py-8 overflow-y-auto">
                        <h5 class="mb-1">Description:</h5>
                        <p class="font-light text-gray-500 dark:text-gray-400">
                            Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore,
                            quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem
                            ipsum dolor sit amet. With supporting text below as a natural lead-in to additional
                            contenposuere erat a ante.
                        </p>

                        <div class="my-7">
                            <div class="grid sm:grid-cols-3 gap-6">
                                <div class="col-span-1">
                                    <h5 class="mb-2 text-gray-600">Create Date</h5>
                                    <p class="font-normal text-gray-500 dark:text-gray-400">17 March 2023 <small
                                            class="font-light">1:00 PM</small></p>
                                </div> <!-- col end -->

                                <div class="col-span-1">
                                    <h5 class="mb-2 text-gray-600">Due Date</h5>
                                    <p class="font-normal text-gray-500 dark:text-gray-400">22 December 2023 <small
                                            class="font-light">1:00 PM</small></p>
                                </div> <!-- col end -->

                                <div class="col-span-1">
                                    <h5 class="mb-2 text-gray-600">Asignee:</h5>
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
                                                    class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]"></div>
                                            </div>
                                        </div> <!-- avatar-icon end -->

                                        <div class="-me-3">
                                            <a href="javascript: void(0);" data-fc-type="tooltip"
                                                data-fc-placement="top">
                                                <div
                                                    class="bg-warning text-white font-medium flex items-center justify-center rounded-full h-8 w-8 hover:-translate-y-0.5 transition-all duration-200">
                                                    K
                                                </div>
                                            </a>
                                            <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                                role="tooltip">
                                                Hooker
                                                <div data-fc-arrow
                                                    class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]"></div>
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
                                                    class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]"></div>
                                            </div>
                                        </div> <!-- avatar-icon end -->
                                    </div> <!-- tooltip-flex end -->
                                </div> <!-- col end -->
                            </div> <!-- grid end -->
                        </div>

                        <div data-fc-type="tab">
                            <nav class="flex space-x-5 border-b border-gray-300 dark:border-gray-700" aria-label="Tabs">
                                <button data-fc-target="#tabs-with-underline-1" type="button"
                                    class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px transition-all text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 hover:text-primary active">
                                    Comments
                                </button> <!-- button end -->
                                <button data-fc-target="#tabs-with-underline-2" type="button"
                                    class="fc-tab-active:font-semibold fc-tab-active:border-primary fc-tab-active:text-primary py-4 px-1 inline-flex items-center gap-2 border-b-2 border-transparent -mb-px transition-all text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 hover:text-primary">
                                    Files
                                </button> <!-- button end -->
                            </nav>

                            <div class="mt-5 overflow-hidden">
                                <div id="tabs-with-underline-1"
                                    class="active fc-tab-active:opacity-100 opacity-0 transition-all duration-300 transform"
                                    role="tabpanel" aria-labelledby="tabs-with-underline-item-1">
                                    <textarea class="form-input mt-2" id="example-textarea" placeholder="Write message" rows="4"></textarea>
                                    <div class="flex items-center justify-end">
                                        <div class="mb-2 inline-block">
                                            <button type="button" class="btn btn-link text-xl"><i
                                                    class="ri-attachment-2"></i></button>
                                        </div>
                                        <div class="mb-2 inline-block">
                                            <button type="button"
                                                class="btn bg-primary text-white btn-sm">Submit</button>
                                        </div>
                                    </div>

                                    <div class="flex gap-5">
                                        <img src="assets/images/users/avatar-3.jpg" alt=""
                                            class="h-12 rounded-full">
                                        <div class="w-full">
                                            <h5 class="mb-2 text-gray-500 dark:text-gray-400 font-semibold">Jeremy
                                                Tomlinson</h5>
                                            <p class="font-light">Cras sit amet nibh libero, in gravida nulla. Nulla vel
                                                metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in
                                                vulputate at, tempus viverra turpis.</p>
                                            <!-- chat-end -->

                                            <div class="mt-5">
                                                <div class="flex gap-5">
                                                    <img src="assets/images/users/avatar-4.jpg" alt=""
                                                        class="h-12 rounded-full">
                                                    <div class="w-full">
                                                        <h5 class="mb-2 text-gray-500 dark:text-gray-400 font-semibold">
                                                            Thelma Fridley</h5>
                                                        <p class="font-light">Cras sit amet nibh libero, in gravida nulla.
                                                            Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                                                            vestibulum in
                                                            vulputate at, tempus viverra turpis.</p>
                                                    </div>
                                                </div> <!-- chat-end -->
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- tabs-with-underline-1 end -->

                                <div id="tabs-with-underline-2"
                                    class="hidden fc-tab-active:opacity-100 transition-all duration-300 transform opacity-0"
                                    role="tabpanel" aria-labelledby="tabs-with-underline-item-2">
                                    <div class="border rounded-md border-gray-300 dark:border-gray-700 p-3 mb-2">
                                        <div class="flex justify-between items-center">
                                            <a href="javascript:void(0);" class="btn btn-link">
                                                <i class="ri-download-line text-lg"></i>
                                            </a>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <span
                                                class="flex items-center justify-center bg-primary text-white font-semibold rounded-md w-12 h-12">
                                                .ZIP
                                            </span>
                                            <div>
                                                <a href="javascript:void(0);" class="font-medium">-admin-design.zip</a>
                                                <p class="font-light">2.3 MB</p>
                                            </div>
                                        </div>
                                    </div> <!-- border-end -->

                                    <div class="border rounded-md border-gray-300 dark:border-gray-700 p-3 mb-2">
                                        <div class="flex justify-between items-center">
                                            <a href="javascript:void(0);" class="btn btn-link">
                                                <i class="ri-download-line text-lg"></i>
                                            </a>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <span>
                                                <img src="assets/images/small/small-1.jpg" alt=""
                                                    class="h-12 w-12 rounded-md">
                                            </span>
                                            <div>
                                                <a href="javascript:void(0);" class="font-medium">Dashboard-design.jpg</a>
                                                <p class="font-light">3.25 MB</p>
                                            </div>
                                        </div>
                                    </div> <!-- border-end -->

                                    <div class="border rounded-md border-gray-300 dark:border-gray-700 p-3 mb-2">
                                        <div class="flex justify-between items-center">
                                            <a href="javascript:void(0);" class="btn btn-link">
                                                <i class="ri-download-line text-lg"></i>
                                            </a>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <span
                                                class="flex items-center justify-center bg-secondary text-white font-semibold rounded-md w-12 h-12">
                                                .MP4
                                            </span>
                                            <div>
                                                <a href="javascript:void(0);" class="font-medium">Admin-bug-report.mp4</a>
                                                <p class="font-light">7.05 MB</p>
                                            </div>
                                        </div>
                                    </div> <!-- border-end -->
                                </div> <!-- tabs-with-underline-2 end -->
                            </div>
                        </div> <!-- tab end -->

                        <div class="text-center mt-2 font-medium">
                            <a href="javascript:void(0);" class="text-danger">Load more </a>
                        </div> <!-- link end -->
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Sortablejs -->
    <script src="{{ asset('assets/libs/sortablejs/Sortable.min.js') }}"></script>

    <!-- Dragula Demo Component js -->
    <script src="{{ asset('assets/js/pages/apps-kanban.js') }}"></script>
@endsection
