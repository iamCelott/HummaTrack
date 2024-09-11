@extends('layouts.app')

@section('content')
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="inline-block w-auto text-white bg-secondary hover:bg-secondary-dark focus:ring-4 focus:outline-none focus:ring-secondary-light font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-4"
        type="button">
        Buat Team
    </button>
    <div class="flex flex-auto flex-col">

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6" style="border-radius: 20px">


            <!-- Modal toggle -->


            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Buat Team
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('teams.store') }}" method="post" class="p-4 md:p-5">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <!-- Input untuk nama team -->
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama Team" required>
                                </div>

                                <!-- Dropdown untuk created_by -->
                                <div class="col-span-2">
                                    <label for="created_by"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created
                                        By</label>
                                    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
                                    <input type="text" name="creted_by" id="created_by"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="{{ auth()->user()->name }}" value="{{ auth()->user()->name }}"
                                        disabled>
                                </div>

                                <!-- Input untuk deskripsi team -->
                                <div class="col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Team
                                        Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Deskripsi Team"></textarea>
                                </div>
                            </div>

                            <!-- Tombol submit -->
                            <button type="submit"
                                class="text-white inline-flex items-center bg-secondary hover:bg-secondary-dark focus:ring-4 focus:outline-none focus:ring-secondary-light font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Buat Team
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            @forelse ($teams as $team)
                <div class="w-full p-6 rounded-lg text-black" style="background-color: white">
                    <h1 style="padding-bottom: 20px" class="font-bold text-2xl">{{ $team->name }}</h1>

                    <div class="flex py-3 justify-between"
                        style="border-top: 2px solid #CACACA; border-bottom: 2px solid #CACACA;">
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.625 10.5V8.75C0.625 8.39583 0.716146 8.07031 0.898438 7.77344C1.08073 7.47656 1.32292 7.25 1.625 7.09375C2.27083 6.77083 2.92708 6.52865 3.59375 6.36719C4.26042 6.20573 4.9375 6.125 5.625 6.125C6.3125 6.125 6.98958 6.20573 7.65625 6.36719C8.32292 6.52865 8.97917 6.77083 9.625 7.09375C9.92708 7.25 10.1693 7.47656 10.3516 7.77344C10.5339 8.07031 10.625 8.39583 10.625 8.75V10.5H0.625ZM11.875 10.5V8.625C11.875 8.16667 11.7474 7.72656 11.4922 7.30469C11.237 6.88281 10.875 6.52083 10.4062 6.21875C10.9375 6.28125 11.4375 6.38802 11.9063 6.53906C12.375 6.6901 12.8125 6.875 13.2188 7.09375C13.5938 7.30208 13.8802 7.53385 14.0781 7.78906C14.276 8.04427 14.375 8.32292 14.375 8.625V10.5H11.875ZM5.625 5.5C4.9375 5.5 4.34896 5.25521 3.85938 4.76562C3.36979 4.27604 3.125 3.6875 3.125 3C3.125 2.3125 3.36979 1.72396 3.85938 1.23438C4.34896 0.744792 4.9375 0.5 5.625 0.5C6.3125 0.5 6.90104 0.744792 7.39062 1.23438C7.88021 1.72396 8.125 2.3125 8.125 3C8.125 3.6875 7.88021 4.27604 7.39062 4.76562C6.90104 5.25521 6.3125 5.5 5.625 5.5ZM11.875 3C11.875 3.6875 11.6302 4.27604 11.1406 4.76562C10.651 5.25521 10.0625 5.5 9.375 5.5C9.26042 5.5 9.11458 5.48698 8.9375 5.46094C8.76042 5.4349 8.61458 5.40625 8.5 5.375C8.78125 5.04167 8.9974 4.67188 9.14844 4.26562C9.29948 3.85938 9.375 3.4375 9.375 3C9.375 2.5625 9.29948 2.14062 9.14844 1.73438C8.9974 1.32812 8.78125 0.958333 8.5 0.625C8.64583 0.572917 8.79167 0.539062 8.9375 0.523438C9.08333 0.507813 9.22917 0.5 9.375 0.5C10.0625 0.5 10.651 0.744792 11.1406 1.23438C11.6302 1.72396 11.875 2.3125 11.875 3ZM1.875 9.25H9.375V8.75C9.375 8.63542 9.34635 8.53125 9.28906 8.4375C9.23177 8.34375 9.15625 8.27083 9.0625 8.21875C8.5 7.9375 7.93229 7.72656 7.35938 7.58594C6.78646 7.44531 6.20833 7.375 5.625 7.375C5.04167 7.375 4.46354 7.44531 3.89062 7.58594C3.31771 7.72656 2.75 7.9375 2.1875 8.21875C2.09375 8.27083 2.01823 8.34375 1.96094 8.4375C1.90365 8.53125 1.875 8.63542 1.875 8.75V9.25ZM5.625 4.25C5.96875 4.25 6.26302 4.1276 6.50781 3.88281C6.7526 3.63802 6.875 3.34375 6.875 3C6.875 2.65625 6.7526 2.36198 6.50781 2.11719C6.26302 1.8724 5.96875 1.75 5.625 1.75C5.28125 1.75 4.98698 1.8724 4.74219 2.11719C4.4974 2.36198 4.375 2.65625 4.375 3C4.375 3.34375 4.4974 3.63802 4.74219 3.88281C4.98698 4.1276 5.28125 4.25 5.625 4.25Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <span>
                                <span>Anggota</span>
                                <br>
                                <span class="font-bold">{{ $team->users->count() }}</span>
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 12.125C1.15625 12.125 0.861979 12.0026 0.617188 11.7578C0.372396 11.513 0.25 11.2188 0.25 10.875V4C0.25 3.65625 0.372396 3.36198 0.617188 3.11719C0.861979 2.8724 1.15625 2.75 1.5 2.75H4V1.5C4 1.15625 4.1224 0.861979 4.36719 0.617188C4.61198 0.372396 4.90625 0.25 5.25 0.25H7.75C8.09375 0.25 8.38802 0.372396 8.63281 0.617188C8.8776 0.861979 9 1.15625 9 1.5V2.75H11.5C11.8438 2.75 12.138 2.8724 12.3828 3.11719C12.6276 3.36198 12.75 3.65625 12.75 4V10.875C12.75 11.2188 12.6276 11.513 12.3828 11.7578C12.138 12.0026 11.8438 12.125 11.5 12.125H1.5ZM1.5 10.875H11.5V4H1.5V10.875ZM5.25 2.75H7.75V1.5H5.25V2.75Z"
                                        fill="#29B6F6" />
                                </svg>

                            </div>
                            <span>
                                <span>Total Proyek</span>
                                <br>
                                <span class="font-bold">13</span>
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="11" height="13" viewBox="0 0 11 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.84375 10.25L8.375 6.71875L7.46875 5.8125L4.82812 8.45312L3.51563 7.14063L2.625 8.03125L4.84375 10.25ZM1.75 12.75C1.40625 12.75 1.11198 12.6276 0.867188 12.3828C0.622396 12.138 0.5 11.8438 0.5 11.5V1.5C0.5 1.15625 0.622396 0.861979 0.867188 0.617188C1.11198 0.372396 1.40625 0.25 1.75 0.25H6.75L10.5 4V11.5C10.5 11.8438 10.3776 12.138 10.1328 12.3828C9.88802 12.6276 9.59375 12.75 9.25 12.75H1.75ZM6.125 4.625V1.5H1.75V11.5H9.25V4.625H6.125Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <span>
                                <span>Proyek Selesai</span>
                                <br>
                                <span class="font-bold">13</span>
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between pt-3">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/brands/dribbble.png') }}" alt=""
                                class="w-12 h-12 rounded-full object-cover">
                            <span>
                                <span class="font-bold" style="font-size: 1.1rem">Ketua</span>
                                <br>
                                <span style="font-size: 1.1rem">{{ $team->create_by->name }}</span>
                            </span>
                        </div>

                        <div class="flex items-end">
                            <button class="rounded-xl py-1 text-white font-semibold"
                                style="background-color: #0496FF;padding-left: 1.8rem; padding-right: 1.8rem"><i
                                    class="ri-information-line"></i> Detail</button>
                        </div>
                    </div>
                </div>
            @empty
                Kosong
            @endforelse
        </div>
    </div>
@endsection
