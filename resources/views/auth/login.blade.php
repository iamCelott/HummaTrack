<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register | Attex - Responsive Tailwind CSS 3 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="coderthemes" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="assets/js/config.js"></script>
</head>

<body class="">
    <div class="flex items-stretch h-screen relative ">


        <div class=" w-full h-screen relative hidden lg:block" style="background-color: #e6f5ff">
            <div class="logo absolute " style="top: 40px;left:40px;">
                <a href="/" class="flex gap-2">
                    <img src="{{ asset('assets/images/polymer.png') }}" alt="" style="width: 40px">
                    <h3 style="font-size: 30px;font-weight: 800; color:#2176FF;">Humma<span
                            style="color: black">Track</span></h3>
                </a>
            </div>
            <div class=" flex mt-auto justify-center items-center text-center h-screen">
                <div class="xl:w-2/4 w-full mx-auto">
                    <img src="{{ asset('assets/images/loginregister.png') }}" alt="" data-aos="zoom-in"
                        data-aos-duration="1000" data-aos-delay="200">
                </div>
            </div>
        </div>

        <div class="bg-white lg:max-w-[50%] z-10 p-12 relative w-full h-full  ">
            <div class="relative flex flex-col items-center justify-center h-full">
                <div class="flex justify-center">
                    <div class=" px-32 mx-auto">
                        <div class=" overflow-hidden">
                            <div class="p-9">
                                <div class="text-start mx-auto w-4/4">
                                    <h2 class="text-dark/70 text-start text-2xl font-bold  mb-2">
                                        Login</h2>
                                    <p class="text-gray-700 mb-9" style="min-width: 400px">Masuk untuk mulai
                                        tugasmu!
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
                                                class="rounded  border-gray-300  text-indigo-600 shadow-sm focus:ring-indigo-500 "
                                                name="remember">
                                            <span
                                                class="ms-2 text-sm text-gray-600">{{ __('Ingat kata sandi') }}</span>
                                        </label>
                                        @if (Route::has('password.request'))
                                            <label for="forgotPw" class="inline-flex items-center">
                                                <a ID="forgotPw"
                                                    class=" text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
                                                    href="{{ route('password.request') }}">
                                                    <span
                                                        class="ms-2 text-sm text-gray-600 ">{{ __('Lupa Password?') }}</span>

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
                                </form><!-- tailwind css -->
                                <div class="text-center" style="margin-top: 30px">
                                    <p class="text-muted">Belum punya akun? <a href="{{ route('register') }}"
                                            class="text-muted  ms-1 link-offset-3 "
                                            style="color:#246AFF ">Daftar!</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

    <!-- Swiper Plugin Js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Auth Demo Js -->
    <script src="assets/js/pages/auth-swiper.js"></script>
    <script>
        AOS.init();
    </script>
</body>


<!-- Mirrored from coderthemes.com/attex/tailwind/layouts/auth-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 05:27:55 GMT -->

</html>


<!-- Login Card -->
