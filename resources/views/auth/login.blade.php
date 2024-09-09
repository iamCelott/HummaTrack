<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login | Attex - Responsive Tailwind CSS 3 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

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
                        <div class="text-center mx-auto w-3/4">
                            <h4 class="text-dark/70 text-center text-lg font-bold dark:text-light/80 mb-2">Log In</h4>
                            <p class="text-gray-400 mb-9">Enter your email address and password to access admin panel.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                        name="remember">
                                    <span
                                        class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                            </div>
                            <div class="flex items-center justify-start mt-4">
                                <button type='submit' class="flex items-center"
                                style="
                                    padding:7px 7px;
                                    width:100%;
                                    border-radius:10px;
                                    color:#fefefe;
                                    box-shadow: 0px 0px 3px rgba(0,0,0,.3)
                                    ">
                                    <img src="{{ asset('assets/images/google-icon.png') }}" alt="" style="width:30px;">
                                    <span class="text-gray-400" style="margin: 0px 0px 0px 10px">Google</span>
                                </button>
                            </div>
                                <div class="flex items-center justify-center mt-4">
                                <button type='submit' style="
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
                </div>
                <!-- end card -->

                <div class="text-center my-4">
                    <p class="text-muted">Don't have an account? <a href="auth-register.html"
                            class="text-muted ms-1 link-offset-3 underline underline-offset-4"><b>Sign Up</b></a></p>
                </div>
            </div>
        </div>
    </div>

    <footer class="absolute bottom-0 inset-x-0">
        <p class="font-medium text-center p-6">
            <script>
                document.write(new Date().getFullYear())
            </script> © Attex - Coderthemes.com
        </p>
    </footer>

    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from coderthemes.com/attex/tailwind/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Sep 2024 00:47:32 GMT -->

</html>

{{-- </x-guest-layout> --}}
