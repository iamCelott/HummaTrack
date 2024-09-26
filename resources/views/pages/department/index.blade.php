@extends('layouts.app')

@section('banner')
    <div class="flex w-full h-[150px] bg-white justify-center m-0 p-0 relative flex-col" style="margin: 0; padding:0">
        <a href="#" class="font-bold text-[2.5rem]  pl-7 text-black">Kategori Tugas</a>
        <p class=" pl-[1.8rem] text-black">Daftar kategori tugas</p>
        <img src="{{ asset('assets/images/kiri.png') }}" class="absolute" style="left:0;top:0;">
        <img src="{{ asset('assets/images/kanan.png') }}" class="absolute" style="right: 0;top:0;">
    </div>
@endsection

@section('content')
    <div class="card px-6 py-4 flex justify-end ">
        <button type="button" data-fc-type="modal" data-fc-target="createDivision"
            class="inline-flex items-center bg-primary light:bg-[#3e60d5] text-white font-semibold py-1 px-2 rounded group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
            <i class="ri-add-line"></i>
            Tambah kategori tugas
        </button>
        <div id="createDivision"
            class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto sm:mt-0 md:mt-[125px] items-center justify-center">
            <div
                class="-translate-y-5 text-black fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl relative">

                <div class="relative flex justify-between p-6 mb-5">
                    <img src="{{ asset('assets/images/elements/wave-right.png') }}"
                        class="absolute top-0 left-0 w-[70%] sm:h-20" alt="">
                    <h1 class="text-2xl font-bold">Tambah kategori tugas</h1>
                    <button id="closeModal" data-fc-dismiss class="  text-[1.5rem]">
                        <i class="ri-close-line text-gray-500 hover:text-gray-700"></i>
                    </button>
                </div>

                <form action="{{ route('departements.store') }}" method="POST"
                    class="px-6 pb-6 flex flex-col items-center">
                    @csrf


                    <div class="flex justify-center mb-3 mt-6 w-[90%]">
                        <div class=" flex flex-col w-full">
                            <label for="name" class="font-semibold text-black text-[1rem] mb-2">Judul kategori tugas</label>
                            <input type="text" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                                id="name" name="name" value="{{ old('name') }}"
                                placeholder="Masukkan Nama Divisi">
                        </div>
                    </div>

                    <div class="flex justify-end w-[90%] gap-x-2 mt-20  ">
                        <button id="closeModal" data-fc-dismiss
                            class=" px-6 py-2 bg-white text-red-400 border rounded-md border-red-500">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-2 bg-primary rounded-md text-white">Tambah</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-7">
        @foreach ($departments as $index => $department)
            <div class="card p-4 border flex flex-col rounded-lg shadow-lg bg-white relative overflow-hidden h-full transform hover:translate-y-[-10px] transition-all duration-300"
                style="min-height: 270px;">
                <img src="{{ asset('assets/images/Group 7.png') }}" alt="" class="absolute bottom-[0] right-[0] ">
                <img src="{{ asset('assets/images/Group 8 (1).png') }}" alt=""
                    class="absolute top-[-15%] left-[-22%]">
                <div class="flex justify-center items-end relative">
                    <div class="flex items-center justify-center ms-auto me-auto">
                        <img src="{{ asset('assets/images/polymer.png') }}" alt=""
                            style="width: 18px;margin-right:3px;">
                        <h1 class="font-bold text-[1rem] text-[#2176FF]">Humma<span class="text-[black]">Track</span></h1>
                    </div>

                    <button id="dropdownDefaultButton{{ $department->id }}"
                        data-dropdown-toggle="dropdown{{ $department->id }}" class="text-md" type="button">
                        <i class="ri-more-2-line text-[1.1rem]"></i>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown{{ $department->id }}"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44"
                        style="border: 1px solid rgba(0,0,0,.05)">
                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownDefaultButton">
                            <li>
                                <button type="button" data-fc-type="modal"
                                    data-fc-target="editDivision{{ $department->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">
                                    Edit
                                </button>
                            </li>
                            <li>
                                <button type="button" data-fc-type="modal"
                                    data-fc-target="deleteDivision{{ $department->id }}"
                                    class="block px-4 py-2 hover:bg-gray-100 w-full text-left">
                                    Hapus
                                </button>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="flex flex-col justify-center items-center relative text-center w-full mb-5"
                    style="height: 100%">
                    <h1 class="divisionName text-black font-bold">{{ $department->name }}</h1>


                    <div class="flex h-[6px] w-[55%] mt-2 justify-center">
                        <div class=" w-[80%] me-2 h-full bg-blue-500 transform skew-x-[-45deg]"></div>
                        <div class=" w-[15%] me-2 h-full bg-blue-500 transform skew-x-[-45deg]"></div>
                        <div class=" w-[5%]  h-full bg-blue-500 transform skew-x-[-45deg]"></div>
                    </div>
                </div>


                {{-- <div id="edit-modal{{ $department->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center"
                                data-modal-hide="edit-modal{{ $department->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <form action="{{ route('admin.department.update', $department->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <label for="name" class="mb-2 block">Division Name</label>
                                    <input type="text" name="name" id="department-name"
                                        class="form-input rounded-md" value="{{ $department->name }}">
                                    <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-4 py-2.5">
                                        Update
                                    </button>
                                </form>
                                <button data-modal-hide="edit-modal{{ $department->id }}" type="button"
                                    class="py-2.5 px-4 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Modal Delete -->
            <div id="deleteDivision{{ $department->id }}"
                class="w-full h-full fixed top-0 px-5 left-0 z-50 transition-all duration-500 hidden overflow-y-auto sm:mt-0 md:mt-[125px] items-center justify-center">
                <div
                    class="-translate-y-5 text-black fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0  duration-300 ease-in-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl relative">
                    <div class="relative flex justify-end px-6 py-2 mb-5">
                        <button id="closeModal" data-fc-dismiss class="  text-[1.5rem]">
                            <i class="ri-close-line text-gray-500 hover:text-gray-700"></i>
                        </button>
                    </div>
                    <form id="deleteForm" action="{{ route('admin.department.delete', $department->id) }}"
                        method="POST" class="px-6 pb-6 flex flex-col items-center">
                        @csrf
                        @method('DELETE')
                        {{-- <img src="{{ asset('assets/images/Throw down-pana.png') }}" class="w-[300px]" alt=""> --}}
                        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah kamu yakin akan menghapus kategori ini?</h3>
                        <div class="flex justify-center mb-3 mt-6 w-full">
                            <div class=" flex justify-end w-full gap-x-2 mt-5">
                                <button id="closeModal" data-fc-dismiss
                                class=" px-6 py-2 bg-white text-red-400 border rounded-md border-red-500">
                                Batal
                            </button>
                            <button type="submit" class="px-6 py-2 bg-danger rounded-md text-white">Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <!-- Modal Edit -->
            <div id="editDivision{{ $department->id }}"
                class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto sm:mt-0 md:mt-[125px] items-center justify-center">
                <div
                    class="-translate-y-5 text-black fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl relative">
                    <div class="relative flex justify-between p-6 mb-5">
                        <img src="{{ asset('assets/images/elements/wave-right.png') }}"
                            class="absolute top-0 left-0 w-[70%] sm:h-20" alt="">
                        <h1 class="text-2xl font-bold">Edit kategori tugas</h1>
                        <button id="closeModal" data-fc-dismiss class="  text-[1.5rem]">
                            <i class="ri-close-line text-gray-500 hover:text-gray-700"></i>
                        </button>
                    </div>

                    <form action="{{ route('admin.department.update', $department->id) }}" method="post"
                        class="px-6 pb-6 flex flex-col items-center">
                        @csrf
                        @method('PUT')
                        <div class="flex justify-center mb-3 mt-6 w-[90%]">
                            <div class=" flex flex-col w-full">
                                <label for="name" class="font-semibold text-black text-[1rem] mb-2">Judul kategori tugas</label>
                                <input type="text" style="border: 2px solid #cacaca"
                                    class="w-full px-6 py-2 rounded-lg" id="name" name="name"
                                    value="{{ $department->name }}" placeholder="Masukkan Nama Divisi">
                            </div>
                        </div>

                        <div class="flex justify-end w-[90%] gap-x-2 mt-20  ">
                            <button id="closeModal" data-fc-dismiss
                                class=" px-6 py-2 bg-white text-red-400 border rounded-md border-red-500">
                                Batal
                            </button>
                            <button type="submit" class="px-6 py-2 bg-primary rounded-md text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    {{-- belum dicustom --}}
    <div class="paginate mt-5">
        {{ $departments->links() }}
    </div>
    <script>
        function adjustFontSize(element) {
            const length = element.textContent.length;
            let fontSize;

            if (length <= 10) {
                fontSize = '2.5rem'; // Size for short text
            } else if (length <= 15) {
                fontSize = '1.7rem'; // Size for longer text
            } else {
                fontSize = '1.5rem'; // Size for longer text
            }

            element.style.fontSize = fontSize;
        }

        const divisionNames = document.querySelectorAll('.divisionName');
        divisionNames.forEach(adjustFontSize);
    </script>
@endsection
