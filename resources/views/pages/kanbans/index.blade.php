@extends('layouts.app')


@section('content')
@section('banner')
    <div class="flex w-full h-[135px] bg-white justify-between m-0 p-0" style="margin: 0; padding:0">
        <a href="#" class="font-bold text-2xl absolute p-7 text-black">Kanban</a>
        <a href="#" class="font-semibold text-md absolute p-7 mt-[55px] text-black">{{ $kanban->name }}</a>
        <img src="{{ asset('assets/images/kiri.png') }}">
        <img src="{{ asset('assets/images/kanan.png') }}">
    </div>
@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">

<main class="p-6">


    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        {{-- <h4 class=" text-lg font-medium">{{ $kanban->name }}</h4> --}}

        {{-- <div class="md:flex hidden items-center gap-2.5 font-semibold">
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
                </div>
        </div> --}}
    </div>
    <!-- Page Title End -->

    @php
        $to_do = $kanban->task()->where('status', 'to_do')->get();
        $in_progress = $kanban->task()->where('status', 'in_progress')->get();
        $review = $kanban->task()->where('status', 'review')->get();
        $done = $kanban->task()->where('status', 'done')->get();
    @endphp

    <div class="grid w-full">
        <div class="overflow-hidden text-gray-700 dark:text-slate-400">
            <div class="flex overflow-x-auto custom-scroll gap-6 pb-4">
                <div class="flex flex-col flex-shrink-0 border rounded-md w-[80%] max-w-[30rem] border-gray-300 p-4"
                    style="background-color: rgba(255, 187, 187, 0.3)">
                    <div class="rounded-md">
                        <div class="flex justify-between">

                            <h5 class="items-center text-black mb-6">TODO ({{ $to_do->count() }}) </h5>
                            {{-- <button type="button" data-fc-type="modal" data-fc-target="addTask"
                                    class="relative bg-success text-white px-3 py-1 rounded-md hover:bg-success mb-6">
                                    Task
                                    <i class="ri-add-line"></i>
                                </button> --}}
                        </div>
                        {{-- <button class="btn bg-success relative top-4 right-4 bg-success text-white px-3 py-1 rounded-md hover:bg-success" data-fc-type="modal" type="button"> Sign Up Modal </button> --}}

                        {{-- modal  --}}
                        <div id="addTask"
                            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto flex items-center justify-center">
                            <div
                                class="-translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl">
                                <div class="px-12 overflow-y-auto rounded-xl relative">

                                    <div class="flex items-center justify-between mb-10 px-2 mt-5">
                                        <img src="{{ asset('assets/images/elements/wave-right.png') }}"
                                            class="absolute top-0 left-0 sm:h-20" alt="">
                                        <h2 class="text-lg font-semibold text-black">Tambah
                                            Tugas Baru</h2>
                                        <button id="closeModal" data-fc-dismiss
                                            class="text-gray-500 hover:text-gray-700">
                                            <!-- Ikon X menggunakan SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>


                                    <form class="px-6" action="{{ route('tasks.store') }}" method="POST">
                                        @csrf
                                        <div class="space-y-6 mb-6">

                                            <!-- Select for Task Category -->
                                            <div class="space-y-1 mb-6 sm:w-full">
                                                <label for="department_id" class="font-semibold text-gray-500">Kategori Tugas</label>
                                                <select class="form-select" id="department_id" name="department_id"
                                                    <option value="">Pilih Kategori</option>
                                                    @forelse ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @empty
                                                    <option value="">Divisi Tidak Ditemukan</option>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="space-y-1 mb-6 sm:w-full">
                                                <label for="name" class="font-semibold text-gray-500">Judul
                                                    Tugas</label>
                                                <input class="form-input" type="text" id="name" name="name"
                                                    placeholder="Masukkan judul tugas" required>
                                            </div>

                                            <div class="space-y-1 mb-6">
                                                <label for="kanban_id"
                                                    class="font-semibold text-gray-500">Proyek</label>
                                                <input class="form-input" type="hidden" name="kanban_id"
                                                    value="{{ $kanban->id }}">
                                                <input class="form-input" type="text"
                                                    placeholder="{{ $kanban->name }}" value="{{ $kanban->name }}"
                                                    disabled>
                                            </div>

                                            <div class="space-y-1 mb-6">
                                                <label for="user_id" class="font-semibold text-gray-500">Nama
                                                    Pengguna</label>
                                                <select class="form-select" id="user_id" name="user_id" required>
                                                    <option value="">Pilih Nama Pengguna</option>
                                                    @forelse($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}
                                                        </option>
                                                    @empty
                                                        <option value="">Tidak ada pengguna tersedia</option>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="space-y-1 mb-6">
                                                <label for="description" class="font-semibold text-gray-500">Deskripsi
                                                    Tugas</label>
                                                <textarea class="form-input" id="description" name="description" rows="4" placeholder="Deskripsi tugas" required></textarea>
                                            </div>

                                            <div class="mb-6 flex justify-end">
                                                <button class="btn bg-info rounded-lg text-white"
                                                    type="submit">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                    </div>



                    <button type="button" data-fc-type="modal" data-fc-target="addTask">
                        <div class="flex items-center justify-center w-full py-20 border-4 border-dashed mb-6 border-gray-400 cursor-pointer hover:bg-red-200 transition duration-300 ease-in-out"
                            style="border-radius: 18px">
                            <div class="text-center">
                                <i class="ri-file-line text-gray-500 text-6xl"></i>
                                <p class="text-gray-500 text-lg mt-2">Tambah Tugas</p>
                            </div>
                        </div>
                    </button>

                    <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden px-1 h-full"
                        id="to_do">

                        @foreach ($to_do as $task)
                            <div class="card" data-id="{{ $task->id }}" style="border-radius: 18px">
                                <div class="grid grid-rows-[auto,1fr]">
                                    <div class="card-header flex justify-between items-center">
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black capitalize">
                                                @if ($task->category == 'digmar')
                                                    Digital Marketing
                                                @else
                                                {{ $task->category }}
                                                @endif
                                            </a>
                                        </h5>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-medium bg-danger/10 text-danger">Todo</span>
                                    </div>

                                    <div class="card-body p-6">
                                        <p>
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black">
                                                {{ $task->name }}
                                            </a>
                                        </h5>
                                        <h5 class="text-gray-500">
                                            {{ Str::limit($task->description, 100, '...') }}
                                        </h5>
                                        </p>

                                        <div class="mt-5">
                                            <div class="grid items-center">
                                                <div
                                                    class="flex items-center gap-2 hover:-translate-y-0.5 transition-all duration-200">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{ $task->user->photo_profile }}"
                                                            class="rounded-full h-8 w-8 ">
                                                    </a>
                                                    <p class="text-gray-500">{{ $task->user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer grid items-center gap-4 p-6">
                                        <div class="flex justify-start gap-4">
                                            <div class="">
                                                <i class="ri-calendar-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <div class="">
                                                <i class="ri-file-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    1 / 10 Selesai
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end company-list-1-->
                </div>

                <div class="flex flex-col flex-shrink-0 border rounded-md w-[80%] max-w-[30rem] border-gray-300 p-4"
                    style="background-color: rgba(248, 218, 173, 0.3)">


                    <h5 class="uppercase text-black mb-4">In Progress ({{ $in_progress->count() }})</h5>

                    <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                        id="in_progress">

                        @foreach ($in_progress as $task)
                            <div class="card" data-id="{{ $task->id }}" style="border-radius: 18px">
                                <div class="grid grid-rows-[auto,1fr]">
                                    <div class="card-header flex justify-between items-center">
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black capitalize">
                                                @if ($task->category == 'digmar')
                                                    Digital Marketing
                                                @else
                                                    {{ $task->category }}
                                                @endif
                                            </a>
                                        </h5>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-medium bg-warning/10 text-warning">In
                                            Progress</span>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer grid items-center gap-4 p-6">
                                        <div class="flex justify-start gap-4">
                                            <div class="">
                                                <i class="ri-calendar-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <div class="">
                                                <i class="ri-file-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    1 / 10 Selesai
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> <!-- end company-list-1-->
                </div>

                <div class="flex flex-col flex-shrink-0 border rounded-md w-[80%] max-w-[30rem] border-gray-300 p-4"
                    style="background-color: rgba(174, 230, 255, 0.3)">


                    <h5 class="uppercase text-black mb-4">Review ({{ $review->count() }})</h5>

                    <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                        id="review">

                        @foreach ($review as $task)
                            <div class="card" data-id="{{ $task->id }}" style="border-radius: 18px">
                                <div class="grid grid-rows-[auto,1fr]">
                                    <div class="card-header flex justify-between items-center">
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black capitalize">
                                                @if ($task->category == 'digmar')
                                                    Digital Marketing
                                                @else
                                                    {{ $task->category }}
                                                @endif
                                            </a>
                                        </h5>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-medium bg-info/10 text-info">Review</span>
                                    </div>

                                    <div class="card-body p-6">
                                        <p>
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black">
                                                {{ $task->name }}
                                            </a>
                                        </h5>
                                        <h5 class="text-gray-500">
                                            {{ Str::limit($task->description, 100, '...') }}
                                        </h5>
                                        </p>

                                        <div class="mt-5">
                                            <div class="grid items-center">
                                                <div
                                                    class="flex items-center gap-2 hover:-translate-y-0.5 transition-all duration-200">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{ $task->user->photo_profile }}"
                                                            class="rounded-full h-8 w-8 ">
                                                    </a>
                                                    <p class="text-gray-500">{{ $task->user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer grid items-center gap-4 p-6">
                                        <div class="flex justify-start gap-4">
                                            <div class="">
                                                <i class="ri-calendar-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <div class="">
                                                <i class="ri-file-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    1 / 10 Selesai
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- {{ dd($todo) }} --}}
                        @endforeach

                    </div> <!-- end company-list-1-->
                </div>

                <div class="flex flex-col flex-shrink-0 border rounded-md w-[80%] max-w-[30rem] bg-green-100 border-gray-300 p-4"
                    style="background-color: rgba(170, 255, 174, 0.3))">


                    <h5 class="uppercase text-black mb-4">Done ({{ $done->count() }})</h5>

                    <div class="flex flex-col gap-4 kanban-board custom-scroll overflow-x-hidden overflow-y-auto px-1 h-full"
                        id="done">

                        @foreach ($done as $task)
                            <div class="card" data-id="{{ $task->id }}" style="border-radius: 18px">
                                <div class="grid grid-rows-[auto,1fr]">
                                    <div class="card-header flex justify-between items-center">
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black capitalize">
                                                @if ($task->category == 'digmar')
                                                    Digital Marketing
                                                @else
                                                    {{ $task->category }}
                                                @endif
                                            </a>
                                        </h5>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md text-xs font-medium bg-success/10 text-success">Completed</span>
                                    </div>

                                    <div class="card-body p-6">
                                        <p>
                                        <h5>
                                            <a href="#" data-fc-type="modal" data-fc-target="task-detail-modal"
                                                class="font-semibold text-lg text-black">
                                                {{ $task->name }}
                                            </a>
                                        </h5>
                                        <h5 class="text-gray-500">
                                            {{ Str::limit($task->description, 100, '...') }}
                                        </h5>
                                        </p>

                                        <div class="mt-5">
                                            <div class="grid items-center">
                                                <div
                                                    class="flex items-center gap-2 hover:-translate-y-0.5 transition-all duration-200">
                                                    <a href="javascript: void(0);">
                                                        <img src="{{ $task->user->photo_profile }}"
                                                            class="rounded-full h-8 w-8 ">
                                                    </a>
                                                    <p class="text-gray-500">{{ $task->user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer grid items-center gap-4 p-6">
                                        <div class="flex justify-start gap-4">
                                            <div class="">
                                                <i class="ri-calendar-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    {{ \Carbon\Carbon::parse($task->created_at)->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                            <div class="">
                                                <i class="ri-file-line" style="margin-right: 8px"></i>
                                                <span class="text-gray-500">
                                                    1 / 10 Selesai
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

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

<script>
    Toastify({
        text: "This is a toast",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "left", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: "linear-gradient(to right, #00b09b, #96c93d)",
        },
        onClick: function() {} // Callback after click
    }).showToast();
</script>

<!-- Sortablejs -->
<script src="{{ asset('assets/libs/sortablejs/Sortable.min.js') }}"></script>

<!-- Dragula Demo Component js -->
<script src="{{ asset('assets/js/pages/apps-kanban.js') }}"></script>
@endsection
