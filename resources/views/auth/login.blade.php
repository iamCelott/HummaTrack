<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HummaTrack - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>
</head>

<body class="relative flex flex-col">
    <div class="circlebg"
        style="
        background-color: rgba(166, 212, 255,.5);
        width: 950px;
        height: 650px;
        filter: blur(90px);
        border-radius: 100%;
        position: absolute;
        top:50%;
        left:50%;
        translate: -50% -50%;
    ">
    </div>

    <!-- Login Card -->
    <div class="relative flex flex-col items-center justify-center h-screen">
        <div class="flex justify-center">
            <div class="max-w-lg px-32 mx-auto">

                <div class="card overflow-hidden" style="border-radius:20px;">

                    <div class="p-9">
                        <div class="text-start mx-auto w-4/4">
                            <h2 class="text-dark/70 text-start text-2xl font-bold dark:text-light/80 mb-2">Login</h2>
                            <p class="text-gray-400 mb-9" style="min-width: 400px">Masuk untuk mulai tugasmu!
                            </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <div class="relative">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <i class="ri-mail-line absolute"
                                        style="top: 50%;left:15px;translate: -20% -10%;font-size:20px;"></i>
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        style="padding-left: 40px" :value="old('email')" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <!-- Form Group -->
                                <!-- End Form Group -->
                                <div class="relative">
                                    <!-- Password Input Label -->
                                    <div class="relative">
                                        <x-input-label for="password" :value="__('Password')" />

                                        <!-- Password Input Field -->
                                        <i class="ri-shield-keyhole-line absolute cursor-pointer"
                                            style="top: 50%;left:15px;translate: -20% -10%;font-size:20px;"></i>
                                        <x-text-input id="password" class="block mt-1 w-full pr-10" type="password"
                                            style="padding-left: 40px" name="password" required
                                            autocomplete="current-password" />

                                        <!-- Eye Icon for Toggle Visibility -->
                                        <i id="eye-icon" class="ri-eye-line absolute cursor-pointer"
                                            style="top: 50%;right:10px;translate: -20% -10%;font-size:20px;"></i>


                                        <!-- Error Message -->
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Script for Toggle Functionality -->
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const passwordInput = document.getElementById('password');
                                        const eyeIcon = document.getElementById('eye-icon');

                                        eyeIcon.addEventListener('click', function() {
                                            // Toggle password visibility
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                eyeIcon.classList.remove('ri-eye-line')
                                                eyeIcon.classList.add('ri-eye-off-line')
                                                eyeIcon.setAttribute('stroke', 'gray');
                                            } else {
                                                passwordInput.type = 'password';
                                                eyeIcon.classList.remove('ri-eye-off-line')
                                                eyeIcon.classList.add('ri-eye-line')
                                                eyeIcon.setAttribute('stroke', 'currentColor');
                                            }
                                        });
                                    });
                                </script>

                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center justify-between" style="margin: 25px 0 30px 0">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span
                                        class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat kata sandi') }}</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <label for="forgotPw" class="inline-flex items-center">
                                        <a ID="forgotPw"
                                            class=" text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                            href="{{ route('password.request') }}">
                                            <span
                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lupa Password?') }}</span>

                                        </a>
                                    </label>
                                @endif
                            </div>
                            <div class="flex items-center justify-between" style="margin: 25px 0 30px 0">
                                <div class="line"
                                    style="height: 1px; width: 50%;background-color: gray;margin-right:10px;"></div>
                                <span class="text-gray">atau</span>
                                <div class="line"
                                    style="height: 1px; width: 50%;background-color: gray;margin-left:10px;"></div>
                            </div>

                            <div class="flex items-center justify-start mt-4">
                                <style>
                                    .gugel:hover {
                                        background-color: rgba(230, 230, 230, .2);
                                        transition: .1s;
                                    }
                                </style>
                                <button type='button' class="gugel flex items-center bg-white"
                                    style="
                                    padding:7px 7px;
                                    width:100%;
                                    border-radius:10px;
                                    color:#fefefe;
                                    border:2px solid rgba(0,0,0,.1);
                                    ">
                                    <img src="{{ asset('assets/images/google-icon.png') }}" alt=""
                                        style="width:30px;">
                                    <span class="text-gray-400" style="margin: 0px 0px 0px 10px">Google</span>
                                </button>
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <button type='submit'
                                    style="
                                    padding: 10px 45px;
                                    border-radius:10px;
                                    margin-top:20px;
                                    color:#fefefe;
                                    background:linear-gradient(to right, #4D00FF, #00C8FF);
                                    ">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center my-4">
                        <p class="text-muted">Belum punya akun? <a href="{{ route('register') }}"
                                class="text-muted  ms-1 link-offset-3 " style="color:#246AFF ">Daftar Sekarang</a></p>
                    </div>
                </div>
                <!-- end card -->

            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <!-- App Js -->
    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from coderthemes.com/attex/tailwind/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2024 00:47:32 GMT -->

</html>

{{-- </x-guest-layout> --}}
