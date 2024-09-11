@extends('layouts.app')

@section('content')
    <main class="p-6">
        <!-- Page Title Start -->
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Tabel Pengguna</h4>

            <!-- Search Form -->
            <form action="{{ route('users.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" placeholder="Cari pengguna..." value="{{ request('search') }}"
                    class="px-4 py-2 border rounded-md focus:outline-none focus:ring focus:ring-primary">
                <button type="submit" class="ms-2 bg-primary text-white px-4 py-2 rounded-md">Cari</button>
            </form>
        </div>
        <!-- Page Title End -->

        <div class="xl:col-span-2">
            <div class="card">
                <div class="p-6">
                    <h3 class="card-title mb-4">Tabel Pengguna</h3>

                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">#</th>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">Foto Profil
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">Nama</th>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">Email</th>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">Nomor Telepon
                                            </th>
                                            <th scope="col"
                                                class="px-4 py-4 text-start text-sm font-medium text-gray-500">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($users as $index => $user)
                                            <tr>
                                                <th scope="row"
                                                    class="px-4 py-4 text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    {{ $index + 1 }}</th>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    <img src="{{ $user->photo_profile }}" alt="Foto Profil"
                                                        class="h-10 w-10 rounded-full">
                                                </td>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    {{ $user->name }}</td>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    {{ $user->email }}</td>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    {{ $user->phone_number }}</td>
                                                <td
                                                    class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                    <!-- Tombol untuk membuka modal -->
                                                    <a href="#"
                                                        class="bg-primary text-white text-md px-2 py-1 rounded-md inline-block"
                                                        id="openModal">
                                                        <i class="ri-pencil-line text-lg"></i>
                                                    </a>

                                                    <!-- Modal Edit Kosong -->
                                                    <div id="editModal"
                                                        class="fixed inset-0 flex justify-center z-50 items-start hidden bg-black bg-opacity-50">
                                                        <div class="bg-white p-6 rounded-md w-1/3 h-auto"
                                                            style="margin-top: 15px">
                                                            <!-- Modal Header -->
                                                            <div class="flex justify-between items-center mb-4">
                                                                <h3 class="text-lg font-semibold text-gray-700">Update User
                                                                </h3>
                                                                <button id="closeModal"
                                                                    class="text-gray-500 hover:text-black text-2xl">&times;</button>
                                                            </div>

                                                            <!-- Modal Content -->
                                                            <form action="{{ route('users.update', $user->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <!-- Profile Picture -->
                                                                <div class="mb-4 text-center">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-gray-700">Profile
                                                                        Photo</label>
                                                                    <div class="relative">
                                                                        <img id="profilePicPreview"
                                                                            src="https://via.placeholder.com/100"
                                                                            class="mx-auto w-32 h-32 object-cover border border-white-300"
                                                                            alt="Profile Picture Preview">
                                                                        <label for="profilePic"
                                                                            class="absolute bottom-0 right-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-full cursor-pointer hover:bg-blue-600">
                                                                        </label>
                                                                        <input id="profilePic" type="file"
                                                                            class="hidden">
                                                                    </div>
                                                                </div>


                                                                <!-- Name User -->
                                                                <div class="mb-4">
                                                                    <label for="name"
                                                                        class="block mb-2 text-sm font-medium text-gray-700">Name</label>
                                                                    <input type="text" id="name" name="name"
                                                                        class="block w-full px-4 py-2 text-gray-700 bg-white-100 border border-white-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                                        value="{{ $user->name }}">
                                                                </div>

                                                                <!-- Phone Number Field -->
                                                                <div class="mb-4">
                                                                    <label for="phone_number"
                                                                        class="block mb-2 text-sm font-medium text-gray-700">Phone
                                                                        Number</label>
                                                                    <input type="tel" id="phone_number" name="phone_number"
                                                                        class="block w-full px-4 py-2 text-gray-700 bg-white-100 border border-white-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                                                        value="{{ $user->phone_number }}">
                                                                </div>

                                                                <div class="flex justify-end mt-10 space-x-2">
                                                                    <button id="closeModalBtn"
                                                                        class="btn bg-danger rounded-md text-white">kembali</button>
                                                                    <button id="enterModalBtn"
                                                                        class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark">simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!-- JavaScript untuk membuka dan menutup modal -->
                                                    <script>
                                                        const openModal = document.getElementById('openModal');
                                                        const closeModal = document.getElementById('closeModal');
                                                        const modal = document.getElementById('editModal');

                                                        openModal.addEventListener('click', function(event) {
                                                            event.preventDefault();
                                                            modal.classList.remove('hidden');
                                                        });

                                                        closeModal.addEventListener('click', function() {
                                                            modal.classList.add('hidden');
                                                        });

                                                        // Optional: Close modal when clicking outside of it
                                                        window.addEventListener('click', function(event) {
                                                            if (event.target === modal) {
                                                                modal.classList.add('hidden');
                                                            }
                                                        });
                                                    </script>

                                                    <!-- Delete Button -->
                                                    <a href="#" id="deleteButton"
                                                        class="bg-danger text-white text-md px-2 py-1 rounded-md inline-block">
                                                        <i class="ri-delete-bin-line text-lg"></i>
                                                    </a>

                                                    <!-- Delete Modal -->
                                                    <div id="deleteModal"
                                                        class="fixed inset-0 flex justify-center items-start z-50 hidden bg-black bg-opacity-50">
                                                        <div class="bg-white p-6 rounded-md w-1/3" style="margin-top: 15px">
                                                            <!-- Modal Header -->
                                                            <div class="flex justify-between items-center mb-4">
                                                                <h3 class="text-lg font-semibold text-gray-700">Yakin ingin
                                                                    menghapus</h3>
                                                                <button id="closeDeleteModal"
                                                                    class="text-gray-500 hover:text-black text-2xl">&times;</button>
                                                            </div>

                                                            <!-- Modal Content -->
                                                            <p class="text-gray-700  mb-6">Apakah Anda yakin ingin menghapus
                                                                users <span class="font-bold text-base">{{ $user->name }}</span></p>

                                                            <!-- Modal Footer with Form -->
                                                            <form id="deleteForm"
                                                                action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="flex justify-end space-x-2">
                                                                    <button type="submit"
                                                                        class="bg-danger text-white px-4 py-2 rounded-md hover:bg-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <!-- Script -->
                                                    <script>
                                                        // Toggle modal visibility
                                                        const deleteButton = document.getElementById('deleteButton');
                                                        const deleteModal = document.getElementById('deleteModal');
                                                        const closeDeleteModal = document.getElementById('closeDeleteModal');
                                                        const cancelButton = document.getElementById('cancelButton');

                                                        // Open modal when delete button is clicked
                                                        deleteButton.addEventListener('click', function(event) {
                                                            event.preventDefault(); // Prevent default link behavior
                                                            deleteModal.classList.remove('hidden'); // Show modal
                                                        });

                                                        // Close modal when X or Cancel is clicked
                                                        closeDeleteModal.addEventListener('click', function() {
                                                            deleteModal.classList.add('hidden'); // Hide modal
                                                        });

                                                        cancelButton.addEventListener('click', function() {
                                                            deleteModal.classList.add('hidden'); // Hide modal
                                                        });

                                                        // The form will automatically handle the delete action when submitted
                                                        // You can add extra validation or confirmation in this script if needed
                                                    </script>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div>
    </main>
@endsection
