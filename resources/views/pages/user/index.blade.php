@extends('layouts.app')

@section('content')

<main class="p-6">
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Tabel Pengguna</h4>

        <!-- Search Form -->
        <form action="{{ route('users.index') }}" method="GET" class="flex items-center">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari pengguna..." 
                value="{{ request('search') }}"
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
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">#</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Foto Profil</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Nama</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Email</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Nomor Telepon</th>
                                        <th scope="col" class="px-4 py-4 text-start text-sm font-medium text-gray-500">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <th scope="row" class="px-4 py-4 text-sm font-medium text-gray-500 dark:text-gray-200">{{ $index + 1 }}</th>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                <img src="{{ $user->photo_profile }}" alt="Foto Profil" class="h-10 w-10 rounded-full">
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{ $user->name }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{ $user->email }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">{{ $user->phone_number }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-500 dark:text-gray-200">
                                                <a href="#" class="bg-primary text-white text-md px-2 py-1 rounded-md inline-block">
                                                    <i class="ri-pencil-line text-lg"></i>
                                                </a>  
                                                <a href="#" class="bg-danger text-white text-md px-2 py-1 rounded-md inline-block">
                                                    <i class="ri-delete-bin-line text-lg"></i>
                                                </a>
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
