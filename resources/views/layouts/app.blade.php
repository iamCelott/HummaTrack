{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Dashboard | HummaTrack - Progress Pengerjaan </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="coderthemes" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/icon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script> --}}

    {{-- CK Editor 5 --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />

    {{-- Toast JS --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"> --}}

    {{-- Solid Toast --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex wrapper">

        <!-- Sidenav Menu -->
        @include('layouts.sidenav')
        <!-- Sidenav Menu End  -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- Topbar Start -->
            @include('layouts.topbar')
            <!-- Topbar End -->

            @yield('banner')
            <main class="p-3 sm:p-6 md:px-12 md:py-6">
                @yield('content')
            </main>

            <!-- Footer Start -->
            {{-- <footer class="footer h-16 flex items-center px-6 bg-white shadow dark:bg-gray-800 mt-auto">
                    <div class="flex md:justify-between justify-center w-full gap-4">
                        <div>
                            <script>document.write(new Date().getFullYear())</script> © Attex - <a href="https://coderthemes.com/" target="_blank">Coderthemes</a>
                        </div>
                        <div class="md:flex hidden gap-4 item-center md:justify-end">
                            <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">About</a>
                            <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Support</a>
                            <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Contact Us</a>
                        </div>
                    </div>
                </footer> --}}
            <!-- Footer End -->

        </div>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>

    <!-- Theme Settings Offcanvas -->
    <div>
        <div id="theme-customization"
            class="fc-offcanvas-open:translate-x-0 hidden translate-x-full rtl:-translate-x-full fixed inset-y-0 end-0 transition-all duration-300 transform max-w-72 w-full z-50 bg-white dark:bg-gray-800"
            tabindex="-1">
            <div class="h-16 flex items-center text-white bg-primary px-6 gap-3">
                <h5 class="text-base flex-grow">Theme Settings</h5>
                <button type="button" data-fc-dismiss><i class="ri-close-line text-xl"></i></button>
            </div>

            <div class="h-[calc(100vh-128px)]" data-simplebar>
                <div class="p-6">
                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Theme</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode"
                                    id="layout-color-light" value="light">
                                <label class="ms-1.5" for="layout-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode"
                                    id="layout-color-dark" value="dark">
                                <label class="ms-1.5" for="layout-color-dark"> Dark </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Direction</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir"
                                    id="direction-ltr" value="ltr">
                                <label class="ms-1.5" for="direction-ltr"> LTR </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir"
                                    id="direction-rtl" value="rtl">
                                <label class="ms-1.5" for="direction-rtl"> RTL </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 2xl:block hidden">
                        <h5 class="font-semibold text-sm mb-3">Content Width</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width"
                                    id="layout-mode-default" value="default">
                                <label class="ms-1.5" for="layout-mode-default"> Fluid </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width"
                                    id="layout-mode-boxed" value="boxed">
                                <label class="ms-1.5" for="layout-mode-boxed"> Boxed </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Sidenav View</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-default" value="default">
                                </label>
                                <label class="ms-1.5" for="sidenav-view-default"> Default </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-sm" value="sm">
                                <label class="ms-1.5" for="sidenav-view-sm"> Small </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-md" value="md">
                                <label class="ms-1.5" for="sidenav-view-md"> Compact </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-mobile" value="mobile">
                                <label class="ms-1.5" for="sidenav-view-mobile"> Mobile </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-hidden" value="hidden">
                                <label class="ms-1.5" for="sidenav-view-hidden"> Hidden </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-hover" value="hover">
                                <label class="ms-1.5" for="sidenav-view-hover"> Hover </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view"
                                    id="sidenav-view-hover-active" value="hover-active">
                                <label class="ms-1.5" for="sidenav-view-hover-active"> Hover Active </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Menu Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color"
                                    id="menu-color-light" value="light">
                                <label class="ms-1.5" for="menu-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color"
                                    id="menu-color-dark" value="dark">
                                <label class="ms-1.5" for="menu-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color"
                                    id="menu-color-brand" value="brand">
                                <label class="ms-1.5" for="menu-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Topbar Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-light" value="light">
                                <label class="ms-1.5" for="topbar-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-dark" value="dark">
                                <label class="ms-1.5" for="topbar-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color"
                                    id="topbar-color-brand" value="brand">
                                <label class="ms-1.5" for="topbar-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h5 class="font-semibold text-sm mb-3">Layout Position</h5>

                        <div class="flex btn-radio">
                            <input type="radio" class="form-radio hidden" name="data-layout-position"
                                id="layout-position-fixed" value="fixed">
                            <label class="btn rounded-e-none bg-gray-100 dark:bg-gray-700"
                                for="layout-position-fixed">Fixed</label>
                            <input type="radio" class="form-radio hidden" name="data-layout-position"
                                id="layout-position-scrollable" value="scrollable">
                            <label class="btn rounded-s-none bg-gray-100 dark:bg-gray-700"
                                for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-16 p-4 flex items-center gap-4 border-t border-gray-300 dark:border-gray-600 px-6">
                <button type="button" class="btn bg-primary text-white w-1/2" id="reset-layout">Reset</button>
                <button type="button" class="btn bg-light text-dark dark:text-light dark:bg-opacity-10 w-1/2">Buy
                    Now</button>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/lucide/umd/lucide.min.js') }}"></script>
    <script src="{{ asset('assets/libs/%40frostui/tailwindcss/frostui.js') }}"></script>


    <!-- App Js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <!-- Sortablejs -->
    <script src="{{ asset('assets/libs/sortablejs/Sortable.min.js') }}"></script>

    <!-- Dragula Demo Component js -->

    <script src="assets/js/pages/apps-kanban.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

    <script src="{{ asset('assets/js/pages/apps-kanban.js') }}"></script>

    {{-- solid toast --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
<<<<<<< HEAD
        document.addEventListener("DOMContentLoaded", function () {
    
            @if(session('success'))
            Toastify({
                text: "{{ session('success') }}", 
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4CAF50", 
            }).showToast();
            @endif
    
            @if(session('error'))
            Toastify({
                text: "{{ session('error') }}", 
                duration: 2000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#F44336", 
            }).showToast();
=======
        document.addEventListener("DOMContentLoaded", function() {

            @if (session('success'))
                Toastify({
                    text: "{{ session('success') }}",
                    duration: 5000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#4CAF50",
                }).showToast();
            @endif

            @if (session('error'))
                Toastify({
                    text: "{{ session('error') }}",
                    duration: 5000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#F44336",
                }).showToast();
>>>>>>> 81d89a56b1416bb3ac53443b6ae518f7e14f3887
            @endif

        });
    </script>

</body>

</html>
