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

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<style>
    body {
        background-image: url("{{ asset('assets/images/invite-bg.png') }}");
        background-size: cover;
        background-position: center;
        height: 100vh;
        overflow: hidden;
    }
</style>

<div class="relative flex flex-col items-center justify-center h-screen">
    <div class="flex justify-center">
        <div class="max-w-xl px-32 mx-auto">

            <div class="card overflow-hidden p-8 px-16" style="border-radius:20px; background-color: white">

                <div class="p-9">
                    <div class="text-start mx-auto w-4/4">
                        <h2 class="text-dark/70 text-center text-2xl font-bold dark:text-light/80 mb-2">
                            <i class="ri-team-fill text-7xl" style="color: #0288D1"></i>
                        </h2> Dirwa Sanami Islam 
                        <span class="text-gray-400 mb-9" style="min-width: 400px">mengundang anda untuk
                            bergabung!
                        </span>
                    </div>
                </div>

                <div class="text-center mt-4 mb-1">
                  <h3 class="font-bold text-2xl"> Project Managements </h3>
                </div>
                
                
                <div class="text-center my-3">
                    <div class="flex items-center justify-center">
                        <i class="ri-circle-fill text-gray-300 px-2"></i> <span class="font-semibold text-sm">15 Anggota</span>
                        <i class="ri-circle-fill text-green-500 px-2"></i><span class="font-semibold text-sm">3 Online</span>
                    </div>
                </div>

                <div class="flex items-center justify-center mb-8">

                    <div class="card mt-5 my-2 rounded-xl px-5" style="background-color: rgba(4, 150, 255, 0.1)">
                        <div class="text-center p-4"
                            <h2 class="text-gray-600">Sebagai</h2>
                            <h2 class="text-3xl font-bold" style="color: #0288D1">UIUX Designer</h2>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-center">

                    <button type="button"
                                class="btn border-danger text-danger hover:bg-danger hover:text-white rounded-lg"
                                data-fc-dismiss style="">Batal</button>
                            <button class="btn bg-info rounded-lg text-white" type="submit">Konfirmasi</button>
                </div>

            </div>
            <!-- end card -->

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
