@extends('layouts.app')

@section('content')
    <form action="{{ route('departements.index') }}" method="GET">
        @csrf
        <input name="search" placeholder="cari proyek anda disini...." type="text"
            class="rounded-md h-full bg-white w-[15rem] md:w-[20rem] lg:w-[25rem] xl:w-[30rem] px-8"
            style="border: 2px solid #cacaca">
    </form>
    <form action="{{ route('departements.store') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-3">
            <div class="">
                <label for="name" class="mb-2 block">Division Name</label>
                <input type="text" name="name" id="department-name" class="form-input rounded-md"
                    placeholder="Enter Title" required>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="">
                <label for="description" class="mb-2 block">Department Name</label>
                <input type="text" name="description" id="department-desc" class="form-input rounded-md"
                    placeholder="Enter desc" required>
            </div>
        </div>

        <div class="lg:col-span-4 mt-5">
            <div class="flex justify-end gap-3">
                {{-- <button type="button"
                    class="inline-flex items-center rounded-md border border-transparent bg-danger px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-danger focus:outline-none">
                    Cancel
                </button> --}}
                <button type="submit"
                    class="inline-flex items-center rounded-md border border-transparent bg-success px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-success focus:outline-none">
                    Save
                </button>
            </div>
        </div>
    </form>
    @foreach ($departments as $index => $department)
        <div class="card">
            <h1>{{ $department->name }}</h1>
            <h1>{{ $department->description }}</h1>
            <form action=""></form>

            <button data-modal-target="delete-modal{{ $department->id }}"
                data-modal-toggle="delete-modal{{ $department->id }}"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
                type="button">
                Delete
            </button>

            <div id="delete-modal{{ $department->id }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow ">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                            data-modal-hide="delete-modal{{ $department->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to
                                delete this product?</h3>
                                <form id="deleteForm"
                                action="{{ route('admin.department.delete', $department->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button  type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                                </form>
                            <button data-modal-hide="delete-modal{{ $department->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button data-modal-target="edit-modal{{ $department->id }}" data-modal-toggle="edit-modal{{ $department->id }}"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button">
            Edit
        </button>

        <div id="edit-modal{{ $department->id }}" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="edit-modal{{ $department->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <form action="{{ route('admin.department.update', $department->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label for="name" class="mb-2 block">Division Name</label>
                            <input type="text" name="name" id="department-name" class="form-input rounded-md" value="{{ $department->name }}">
                            <label for="description" class="mb-2 block">description</label>
                            <input type="text" name="description" id="department-desc" class="form-input rounded-md" value="{{ $department->description }}">
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                        </form>
                        <button data-modal-hide="edit-modal{{ $department->id }}" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
