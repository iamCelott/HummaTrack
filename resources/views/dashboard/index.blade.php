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
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3" name="description">
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

                <main class="p-6">

                    <!-- Page Title Start -->
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Dashboard</h4>

                        <div class="md:flex hidden items-center gap-2.5 font-semibold">
                            <div class="flex items-center gap-2">
                                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Dashboard</a>
                            </div>

                            <div class="flex items-center gap-2">
                                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Apps</a>
                            </div>

                            <div class="flex items-center gap-2">
                                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">File Manager</a>
                            </div>
                        </div>
                    </div>
                    <!-- Page Title End -->

                    {{-- <div class="lg:flex gap-2">
                        <div id="default-offcanvas" class="lg:block hidden inset-y-0 start-0 transform h-ful min-h-full min-w-72 fc-offcanvas-open:translate-x-0 lg:z-0 z-50 fixed lg:static lg:translate-x-0 -translate-x-full transition-all duration-300 lg:rtl:-translate-x-0 rtl:translate-x-full" tabindex="-1">
                            <div class="card p-6 h-full min-h-full lg:rounded-md rounded-none">
                                <div class="relative">
                                    <a href="javascript:void(0)" data-fc-type="dropdown" data-fc-placement="bottom" type="button" class="btn bg-success inline-flex justify-center text-white w-full relative">
                                        <i class="ri-file-add-line me-1"></i>
                                        Create New
                                        <div class="ms-[0.35rem] align-[0.1575rem] border-[0.35rem] border-b-0 border-white border-s-transparent border-e-transparent"></div>
                                    </a>

                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 !start-0 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                            <i class="ri-folder-5-line me-1.5"></i>
                                            <span>Folder</span>
                                        </a>
                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                            <i class="ri-file-2-line me-1.5"></i>
                                            <span>File</span>
                                        </a>
                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                            <i class="ri-file-list-3-line me-1.5"></i>
                                            <span>Document</span>
                                        </a>
                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                            <i class="ri-upload-line me-1.5"></i>
                                            <span>Choose File</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-folders-line text-lg align-middle me-3"></i>My Files</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-drive-line text-lg align-middle me-3"></i>Google Drive</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-dropbox-line text-lg align-middle me-3"></i>Dropbox</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-user-voice-line text-lg align-middle me-3"></i>Share with me</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-time-line text-lg align-middle me-3"></i>Recent</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-star-line text-lg align-middle me-3"></i>Starred</a>
                                    <a href="javascript:void(0)" class="py-2 px-1.5 transition-all text-gray-400 flex items-center hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-300"><i class="ri-delete-bin-line text-lg align-middle me-3"></i>Deleted Files</a>
                                </div>

                                <div class="mt-16">
                                    <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-sm/none font-semibold uppercase bg-gray-900/20 text-gray-900 dark:bg-gray-700 dark:text-gray-400 open:opacity-0">Free</span>
                                    <h6 class="text-uppercase mt-3">Storage</h6>
                                    <div class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700 mt-4">
                                        <div class="flex flex-col justify-center overflow-hidden bg-success" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-gray-500 mt-4 text-xs">7.02 GB (46%) of 15 GB used</p>
                                </div>
                            </div>
                        </div>

                        <div class="card p-6 w-full">
                            <div class="flex flex-wrap justify-between items-center gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="lg:hidden block">
                                        <button data-fc-target="default-offcanvas" data-fc-type="offcanvas" class="inline-flex items-center justify-center text-gray-700 border border-gray-200 rounded hover:bg-slate-100 dark:text-gray-400 hover:dark:bg-gray-800 dark:border-gray-600 transition h-9 w-9 duration-100">
                                            <div class="ri-menu-2-fill text-lg"></div>
                                        </button>
                                    </div>
                                    <form>
                                        <div class="relative flex rounded-md">
                                            <input type="text" id="trailing-button-add-on-with-icon-and-button" name="trailing-button-add-on-with-icon-and-button" class="form-input bg-slate-100 border-0 ps-8 dark:bg-slate-700" placeholder="Search files...">
                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3">
                                                <i class="ri-search-line"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-sm bg-light dark:bg-slate-700"><i class="ri-list-check text-sm"></i></button>
                                    <button type="submit" class="btn btn-sm"><i class="ri-grid-fill text-sm"></i></button>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h5 class="text-base mb-4">Quick Access</h5>

                                <div class="grid xl:grid-cols-4 md:grid-cols-2 -mx-1.5 g-0">
                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-file-zip-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Attex-sketch.zip</a>
                                                    <p class="text-sm">2.3 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-folder-5-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Compile Version</a>
                                                    <p class="text-sm">87.2 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-primary/10 text-primary rounded">
                                                            <i class="ri-folder-5-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Admin.zip</a>
                                                    <p class="text-sm">45.1 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-file-pdf-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Docs.pdf</a>
                                                    <p class="text-sm">7.5 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-file-pdf-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">License-details.pdf</a>
                                                    <p class="text-sm">784 KB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-folder-5-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Purchase Verification</a>
                                                    <p class="text-sm">2.2 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>

                                    <div class="border rounded m-1.5 border-gray-200 dark:border-gray-700">
                                        <div class="p-3">
                                            <div class="flex items-center gap-3">
                                                <div class="">
                                                    <div class="w-12 h-12">
                                                        <span class="inline-flex items-center justify-center h-full w-full bg-light text-secondary rounded dark:bg-slate-700 dark:text-slate-400">
                                                            <i class="ri-folder-5-line text-xl font-normal"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <a href="javascript:void(0);" class="text-gray-500 text-sm font-bold dark:text-gray-400">Attex Integrations</a>
                                                    <p class="text-sm">874 MB</p>
                                                </div>
                                            </div> <!-- end flex -->
                                        </div> <!-- end .p-3 -->
                                    </div>
                                </div> <!-- end grid-->
                            </div>

                            <div class="mt-6">
                                <h5 class="text-base mb-4">Recent</h5>

                                <div class="grid grid-cols-2">
                                    <div class="col-span-2 overflow-x-auto">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden">
                                                <table class="min-w-full">
                                                    <thead class="bg-light/40 border-t border-b dark:bg-slate-700/30 border-gray-200 dark:border-gray-700">
                                                        <tr class="text-gray-800 dark:text-gray-300">
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold min-w-40">File Name</th>
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold min-w-40">Last Modified</th>
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold min-w-24">File Size</th>
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold min-w-32">Owner</th>
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold min-w-24">Members</th>
                                                            <th scope="col" class="text-gray-500 dark:text-gray-400 p-3.5 text-sm text-start font-semibold">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="">
                                                        <tr>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <a href="javascript: void(0);" class="font-semibold">App Design &amp; Development</a>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <p>Jan 03, 2020</p>
                                                                <span class="text-xs">by Andrew</span>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">128 MB</td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                Danielle Thompson
                                                            </td>
                                                            <td class="p-3.5 relative">
                                                                <div class="flex -space-x-1.5">
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-1.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Mat Helme
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-2.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Michael Zenaty
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-3.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            James Anderson
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-5.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Username
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div>
                                                                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" class="btn bg-light px-1.5 dark:bg-slate-700 fc-dropdown">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>

                                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-share-line me-3"></i>
                                                                            <span>Share</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-link me-3"></i>
                                                                            <span>Get Sharable Link</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-pencil-line me-3"></i>
                                                                            <span>Rename</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-download-line me-3"></i>
                                                                            <span>Download</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-delete-bin-line me-3"></i>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <a href="javascript: void(0);" class="font-semibold">Hyper-sketch-design.zip</a>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <p>Feb 13, 2020</p>
                                                                <span class="text-xs">by Coderthemes</span>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">521 MB</td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                Coder Themes
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div class="flex -space-x-1.5 relative">
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-4.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            Mat Helme
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-1.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            Michael Zenaty
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-6.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            James Anderson
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div>
                                                                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" class="btn bg-light px-1.5 dark:bg-slate-700 fc-dropdown">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>

                                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-share-line me-3"></i>
                                                                            <span>Share</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-link me-3"></i>
                                                                            <span>Get Sharable Link</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-pencil-line me-3"></i>
                                                                            <span>Rename</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-download-line me-3"></i>
                                                                            <span>Download</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-delete-bin-line me-3"></i>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <a href="javascript: void(0);" class="font-semibold">Annualreport.pdf</a>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <p>Dec 18, 2019</p>
                                                                <span class="text-xs">by Alejandro</span>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">7.2 MB</td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                Gary Coley
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div class="flex -space-x-1.5">
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-9.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            Mat Helme
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-7.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            Michael Zenaty
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-3.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1511.41px; top: 547px;">
                                                                            James Anderson
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 41.5px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div>
                                                                    <button data-fc-type="dropdown" data-fc-placement="bottom-end" class="btn bg-light px-1.5 dark:bg-slate-700 fc-dropdown">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>

                                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-share-line me-3"></i>
                                                                            <span>Share</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-link me-3"></i>
                                                                            <span>Get Sharable Link</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-pencil-line me-3"></i>
                                                                            <span>Rename</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-download-line me-3"></i>
                                                                            <span>Download</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-delete-bin-line me-3"></i>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <a href="javascript: void(0);" class="font-semibold">Wireframes</a>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <p>Nov 25, 2019</p>
                                                                <span class="text-xs">by Dunkle</span>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">54.2 MB</td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                Jasper Rigg
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div class="flex -space-x-1.5 relative">
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-1.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Mat Helme
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-8.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Michael Zenaty
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-2.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            James Anderson
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-5.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark px-3 py-1.5 rounded-md transition-all text-white z-50 dark:bg-light dark:text-gray-800 absolute open opacity-0 hidden" role="tooltip" style="left: 1592.02px; top: 547px;">
                                                                            Username
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light absolute" data-fc-arrow="" style="left: 39px; bottom: -5px;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div>
                                                                    <button data-fc-type="dropdown" data-fc-placement="top-end" class="btn bg-light px-1.5 dark:bg-slate-700 fc-dropdown">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>

                                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-share-line me-3"></i>
                                                                            <span>Share</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-link me-3"></i>
                                                                            <span>Get Sharable Link</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-pencil-line me-3"></i>
                                                                            <span>Rename</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-download-line me-3"></i>
                                                                            <span>Download</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-delete-bin-line me-3"></i>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <a href="javascript: void(0);" class="font-semibold">Documentation.docs</a>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                <p>Feb 9, 2020</p>
                                                                <span class="text-xs">by Justin</span>
                                                            </td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">8.3 MB</td>
                                                            <td class="p-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                                Cooper Sharwood
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div class="flex -space-x-1.5 relative">
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-3.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            James Anderson
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="h-8 w-8 group">
                                                                        <img class="inline-block h-full w-full rounded-full hover:-translate-y-0.5 transition-all duration-200" src="assets/images/users/avatar-10.jpg" alt="Image Description" data-fc-placement="top" data-fc-type="tooltip">
                                                                        <div class="bg-dark hidden px-3 py-1.5 rounded-md transition-all text-white opacity-0 z-50 dark:bg-light dark:text-gray-800" role="tooltip">
                                                                            Michael Zenaty
                                                                            <div class="bg-dark w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px] dark:bg-light" data-fc-arrow></div>
                                                                        </div>
                                                                    </div>  
                                                                </div>
                                                            </td>
                                                            <td class="p-3.5">
                                                                <div>
                                                                    <button data-fc-type="dropdown" data-fc-placement="top-end" class="btn bg-light px-1.5 dark:bg-slate-700 fc-dropdown">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>

                                                                    <div class="fc-dropdown fc-dropdown-open:opacity-100 opacity-0 min-w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-600 rounded-md py-1 hidden">
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-share-line me-3"></i>
                                                                            <span>Share</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-link me-3"></i>
                                                                            <span>Get Sharable Link</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-pencil-line me-3"></i>
                                                                            <span>Rename</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-download-line me-3"></i>
                                                                            <span>Download</span>
                                                                        </a>
                                                                        <a class="flex items-center py-1.5 px-5 text-sm text-gray-500 hover:bg-slate-100 hover:text-slate-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="javascript:void(0)">
                                                                            <i class="ri-delete-bin-line me-3"></i>
                                                                            <span>Remove</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Card End -->

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
        <div id="theme-customization" class="fc-offcanvas-open:translate-x-0 hidden translate-x-full rtl:-translate-x-full fixed inset-y-0 end-0 transition-all duration-300 transform max-w-72 w-full z-50 bg-white dark:bg-gray-800" tabindex="-1">
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
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode" id="layout-color-light" value="light">
                                <label class="ms-1.5" for="layout-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-mode" id="layout-color-dark" value="dark">
                                <label class="ms-1.5" for="layout-color-dark"> Dark </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Direction</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir" id="direction-ltr" value="ltr">
                                <label class="ms-1.5" for="direction-ltr"> LTR </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="dir" id="direction-rtl" value="rtl">
                                <label class="ms-1.5" for="direction-rtl"> RTL </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6 2xl:block hidden">
                        <h5 class="font-semibold text-sm mb-3">Content Width</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width" id="layout-mode-default" value="default">
                                <label class="ms-1.5" for="layout-mode-default"> Fluid </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-layout-width" id="layout-mode-boxed" value="boxed">
                                <label class="ms-1.5" for="layout-mode-boxed"> Boxed </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Sidenav View</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-default" value="default">
                                </label>
                                <label class="ms-1.5" for="sidenav-view-default"> Default </label>
                            </div>                       

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-sm" value="sm">
                                <label class="ms-1.5" for="sidenav-view-sm"> Small </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-md" value="md">
                                <label class="ms-1.5" for="sidenav-view-md"> Compact </label>
                            </div>                      

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-mobile" value="mobile">
                                <label class="ms-1.5" for="sidenav-view-mobile"> Mobile </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hidden" value="hidden">
                                <label class="ms-1.5" for="sidenav-view-hidden"> Hidden </label>
                            </div>
                        
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hover" value="hover">
                                <label class="ms-1.5" for="sidenav-view-hover"> Hover </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-sidenav-view" id="sidenav-view-hover-active" value="hover-active">
                                <label class="ms-1.5" for="sidenav-view-hover-active"> Hover Active </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Menu Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-light" value="light">
                                <label class="ms-1.5" for="menu-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-dark" value="dark">
                                <label class="ms-1.5" for="menu-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-menu-color" id="menu-color-brand" value="brand">
                                <label class="ms-1.5" for="menu-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h5 class="font-semibold text-sm mb-3">Topbar Color</h5>
                        <div class="flex flex-col gap-2">
                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                <label class="ms-1.5" for="topbar-color-light"> Light </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                <label class="ms-1.5" for="topbar-color-dark"> Dark </label>
                            </div>

                            <div class="flex items-center">
                                <input class="form-switch form-switch-sm" type="checkbox" name="data-topbar-color" id="topbar-color-brand" value="brand">
                                <label class="ms-1.5" for="topbar-color-brand"> Brand </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h5 class="font-semibold text-sm mb-3">Layout Position</h5>

                        <div class="flex btn-radio">
                            <input type="radio" class="form-radio hidden" name="data-layout-position" id="layout-position-fixed" value="fixed">
                            <label class="btn rounded-e-none bg-gray-100 dark:bg-gray-700" for="layout-position-fixed">Fixed</label>
                            <input type="radio" class="form-radio hidden" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                            <label class="btn rounded-s-none bg-gray-100 dark:bg-gray-700" for="layout-position-scrollable">Scrollable</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-16 p-4 flex items-center gap-4 border-t border-gray-300 dark:border-gray-600 px-6">
                <button type="button" class="btn bg-primary text-white w-1/2" id="reset-layout">Reset</button>
                <button type="button" class="btn bg-light text-dark dark:text-light dark:bg-opacity-10 w-1/2">Buy Now</button>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

</body>


</html>



