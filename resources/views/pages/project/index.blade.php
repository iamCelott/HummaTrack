@extends('layouts.app')

@section('content')
<main class="flex-grow p-6">

    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">List Proyek</h4>

        <div class="md:flex hidden items-center gap-2.5 text-sm font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Proyek</a>
            </div>

            
        </div>
    </div>
    <!-- Page Title End -->

    <div class="flex flex-auto flex-col">

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex justify-between items-center">
                        <h5 class="card-title">Web Design</h5>
                        <div class="bg-success text-xs text-white rounded-md py-1 px-1.5 font-medium" role="alert">
                            <span>Completed</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="py-3 px-6">
                        <h5 class="my-2"><a href="{{ route('kanban.index') }}" class="text-slate-900 dark:text-slate-200">Landing page Design</a></h5>
                        <p class="text-gray-500 text-sm mb-9">If several languages coalesce, the grammar of the resulting language is more regular.</p>

                        <div class="flex -space-x-2">
                            <a href="javascript: void(0);">
                                <img class="inline-block h-12 w-12 rounded-full border-2 border-white dark:border-gray-700" src="assets/images/users/avatar-2.jpg" alt="Image Description">
                            </a>
                            <a href="javascript: void(0);">
                                <img class="inline-block h-12 w-12 rounded-full border-2 border-white dark:border-gray-700" src="assets/images/users/avatar-3.jpg" alt="Image Description">
                            </a>
                            <a href="javascript: void(0);">
                                <div class="relative inline-flex">
                                    <button class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-gray-200 border-2 border-white font-medium text-gray-700 shadow-sm align-middle dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 transition-all text-sm">
                                        <span class="font-medium leading-none">2+</span>
                                    </button>
                                </div>
                            </a>

                        </div>
                    </div>

                    <div class="border-t p-5 border-gray-300 dark:border-gray-700">
                        <div class="grid lg:grid-cols-2 gap-4">
                            <div class="flex items-center justify-between gap-2">
                                <a href="#" class="text-sm">
                                    <i class="ri-calendar-line text-lg me-2"></i>
                                    <span class="align-text-bottom">15 Dec</span>
                                </a>

                                <a href="#" class="text-sm">
                                    <i class="ri-task-line text-lg me-2"></i>
                                    <span class="align-text-bottom">1 / 10</span>
                                </a>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                                    <div class="bg-white h-1.5 rounded-full dark:bg-gray-800 w-2/3"></div>
                                </div>
                                <a href="{{ route('kanban.index') }}" type="button" class="btn bg-primary text-white rounded-full">Kanban</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

    </div>

</main>
@endsection
