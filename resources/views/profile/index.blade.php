@extends('layouts.app')

@section('content')
    <style>
        .active {
            background-color: #2563eb;
            /* Ganti dengan warna biru yang diinginkan */
        }
    </style>

    <ul class="flex flex-wrap mb-4 text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="-me-[-4px]">
            <a href="#" class="flex items-center px-4 py-3 bg-white border text-whit rounded-lg active"
                aria-current="page" onclick="switchTab(event, 'tab1')">
                <!-- Icon for Profile -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 me-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
                Profile
            </a>
        </li>
        <li class="me-2">
            <a href="#" class="flex items-center px-4 py-3 bg-white border border-gray-200 rounded-lg text-black "
                onclick="switchTab(event, 'tab2')">
                <!-- Icon for Security -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 me-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M12 22s8-4.5 8-10V5.58C20 5.21 19.79 4.88 19.5 4.65L12 0 4.5 4.65c-.29.23-.5.56-.5.93V12c0 5.5 8 10 8 10z" />
                    <path d="M12 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
                Keamanan
            </a>
        </li>
    </ul>

    <div id="tabContent" class="flex justify-center rounded-lg bg-white items-center w-full h-full">
        <div id="tab1" class="tab-content hidden w-full h-full relative">
            <img class="absolute bottom-0 left-0" src="{{ asset('assets/images/profilehias.png') }}" alt="Profile Hias">
            <img class="absolute top-0 right-0" src="{{ asset('assets/images/profilehias2.png') }}" alt="Profile Hias">
            <form action="">
                <center>
                    <div class="max-w-lg">
                        <div class="flex flex-col items-center pt-8">
                            <label for="profilePhoto" class="cursor-pointer items-center">
                                <div class="relative w-52 h-52">
                                    <img id="profileImage" class="w-full h-full rounded-full object-cover hover:opacity-30"
                                        src="https://via.placeholder.com/150" alt="Profile Photo">
                                    <input type="file" id="profilePhoto" class="hidden" accept="image/*"
                                        onchange="previewImage(event)">
                                    <div
                                        class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 hover:opacity-100 transition-opacity">
                                        <img src="{{ asset('assets/images/iconCamera.png') }}" alt="iconCamera"
                                            class="w-12 h-12">
                                    </div>
                                </div>
                            </label>
                        </div>

                        <div class="flex flex-col items-start mt-6">
                            <label for="name" class="block text-base font-bold text-gray-700">Name</label>
                            <input type="text" id="name" name="name"
                                class="mt-1 block w-full font-medium border border-gray-300 bg-transparent rounded-lg shadow-sm p-2"
                                value="{{ Auth::user()->name }}">
                        </div>

                        <div class="flex flex-col items-start mt-6">
                            <label for="phone" class="block text-base font-bold text-gray-700">Phone Number</label>
                            <input type="tel" id="phone" name="phone"
                                class="mt-1 block w-full font-medium border bg-transparent border-gray-300 rounded-lg shadow-sm p-2"
                                value="{{ Auth::user()->phone_number }}">
                        </div>

                        <div class="flex flex-col items-start mt-6">
                            <label for="email" class="block text-base font-bold text-gray-700">Email</label>
                            <input type="email" id="email" name="email"
                                class="mt-1 block w-full border bg-transparent font-medium border-gray-300 rounded-lg shadow-sm p-2"
                                value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                </center>

                <div class="flex justify-end px-8 pt-24">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-5 rounded-md hover:bg-blue-600">Konfirmasi</button>
                </div>
            </form>
        </div>

        <div id="tab2" class="tab-content hidden  w-full h-full relative">
            <img class="absolute bottom-0 left-0" src="{{ asset('assets/images/profilehias.png') }}" alt="Profile Hias">
            <img class="absolute top-0 right-0" src="{{ asset('assets/images/profilehias2.png') }}" alt="Profile Hias">
            <div class="text-4xl text-center mb-4 font-bold text-gray-800 tracking-wide pt-8">
                Ganti Password
            </div>
            <div class="text-lg font-bold text-gray-600 text-center leading-relaxed mb-4">
                Ganti Kata Sandi untuk Menjaga Akun Anda Tetap Aman
            </div>
            <form action="">
                <center>
                    <div class="max-w-lg mt-14">
                        <div class="flex flex-col items-start mt-6">
                            <label for="password" class="block text-base font-bold text-gray-700">Password Anda</label>
                            <div class="relative w-full flex">
                                <!-- Ikon Kunci di Kiri -->
                                <i class="ri-shield-keyhole-line absolute cursor-pointer"
                                    style="top: 50%; left: 15px; transform: translateY(-50%); font-size: 20px;"></i>

                                <!-- Input Password -->
                                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password"
                                    style="padding-left: 40px" name="password" required
                                    autocomplete="current-password" placeholder="Masukkan password anda"/>

                                <!-- Ikon Mata untuk Toggle Visibility -->
                                <i id="eye-icon" class="ri-eye-line absolute cursor-pointer"
                                    style="top: 50%; right: 10px; transform: translateY(-50%); font-size: 20px;"
                                    onclick="togglePasswordVisibility()"></i>
                            </div>
                        </div>

                        <div class="flex flex-col items-start mt-6">
                            <label for="password" class="block text-base font-bold text-gray-700">Password Baru</label>
                            <div class="relative w-full flex">
                                <!-- Ikon Kunci di Kiri -->
                                <i class="ri-shield-keyhole-line absolute cursor-pointer"
                                    style="top: 50%; left: 15px; transform: translateY(-50%); font-size: 20px;"></i>

                                <!-- Input Password -->
                                <x-text-input id="password" class="block mt-1 w-full pr-10"  type="password"
                                    style="padding-left: 40px" name="new_password" required
                                    autocomplete="current-password" placeholder="Masukkan password baru"/>

                                <!-- Ikon Mata untuk Toggle Visibility -->
                                <i id="eye-icon" class="ri-eye-line absolute cursor-pointer"
                                    style="top: 50%; right: 10px; transform: translateY(-50%); font-size: 20px;"
                                    onclick="togglePasswordVisibility()"></i>
                            </div>
                        </div>

                        <div class="flex flex-col items-start mt-6">
                            <label for="password" class="block text-base font-bold text-gray-700">Konfirmasi Password</label>
                            <div class="relative w-full flex">
                                <!-- Ikon Kunci di Kiri -->
                                <i class="ri-shield-keyhole-line absolute cursor-pointer"
                                    style="top: 50%; left: 15px; transform: translateY(-50%); font-size: 20px;"></i>

                                <!-- Input Password -->
                                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password"
                                    style="padding-left: 40px" name="confrim_password" required
                                    autocomplete="current-password" placeholder="Konfirmasi password"/>

                                <!-- Ikon Mata untuk Toggle Visibility -->
                                <i id="eye-icon" class="ri-eye-line absolute cursor-pointer"
                                    style="top: 50%; right: 10px; transform: translateY(-50%); font-size: 20px;"
                                    onclick="togglePasswordVisibility()"></i>
                            </div>
                        </div>
                </center>
                <div class="flex justify-end px-8 pt-24">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-5 rounded-md hover:bg-blue-600">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(event, tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.classList.add('hidden');
                if (tab.id === tabId) {
                    tab.classList.remove('hidden');
                }
            });

            const links = document.querySelectorAll('a');
            links.forEach(link => {
                link.classList.remove('active', 'text-white', 'bg-blue-600');
                if (link.textContent === event.target.textContent) {
                    link.classList.add('active', 'bg-blue-600', 'text-white');
                }
            });

            localStorage.setItem('activeTab', tabId);
        }

        function loadActiveTab() {
            const activeTabId = localStorage.getItem('activeTab') || 'tab1';

            const activeTabLink = document.querySelector(`a[onclick="switchTab(event, '${activeTabId}')"]`);
            if (activeTabLink) {
                activeTabLink.click();
            }
        }

        document.addEventListener('DOMContentLoaded', loadActiveTab);

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.getElementById('profileImage');
                img.src = e.target.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        let isPasswordVisible = false; // Flag untuk melacak status visibilitas password

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            // Toggle input type
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('ri-eye-line');
                eyeIcon.classList.add('ri-eye-off-line'); // Ganti ikon mata terbuka
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('ri-eye-off-line');
                eyeIcon.classList.add('ri-eye-line'); // Ganti ikon mata tertutup
            }
        }
    </script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
