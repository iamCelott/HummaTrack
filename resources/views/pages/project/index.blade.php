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
            @foreach ($projects as $project)
                <div class="card">
                    <div class="card-header">
                        <div class="flex justify-between items-center">
                            <h5 class="card-title">{{ $project->name }}</h5>
                                <div class="bg-success text-xs text-white rounded-md py-1 px-1.5 font-medium" role="alert">
                                    {{-- {{ dd($project->status) }} --}}
                                    @if ($project->status->value === 'not_started')
                                    <span>Belum di Mulai</span>
                                    @else
                                    <span>belum ada status</span>
                                    @endif
                             </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="py-3 px-6">
                            <h5 class="my-2">
                                <a href="{{ route('kanban.index') }}" class="text-slate-900 dark:text-slate-200">{{ $project->name }}</a>
                            </h5>
                            <p class="text-gray-500 text-sm mb-9">{{ $project->description }}</p>

                            <!-- Gambar Avatar (ambil dari kolom image) -->
                            {{-- <div class="flex -space-x-2">
                                <a href="javascript: void(0);">
                                    <img class="inline-block h-12 w-12 rounded-full border-2 border-white dark:border-gray-700" src="{{ asset('path_to_images/' . $project->image) }}" alt="{{ $project->name }}">
                                </a>
                            </div> --}}
                        </div>

                        <!-- Bagian tanggal dan tombol komentar -->
                        <div class="border-t p-5 border-gray-300 dark:border-gray-700">
                            <div class="grid lg:grid-cols-2 gap-4">
                                <div class="flex items-center justify-between gap-2">
                                    <a href="#" class="text-sm">
                                        <i class="ri-calendar-line text-lg me-2"></i>
                                        <span class="align-text-bottom">{{ \Carbon\Carbon::parse($project->start_date)->format('d M') }}</span>
                                    </a>
                        -
                                    <a href="#" class="text-sm">
                                        <i class="ri-calendar-close-line text-lg me-2"></i>
                                        <span class="align-text-bottom">{{ \Carbon\Carbon::parse($project->end_date)->format('d M') }}</span>
                                    </a>
                                </div>

                                <!-- Bagian progress bar dan kanban (dikomen sesuai permintaan) -->

                                <div class="flex items-center gap-2">
                                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                                        <div class="bg-white h-1.5 rounded-full dark:bg-gray-800 w-2/3"></div>
                                    </div>
                                <a href="{{ route('kanban.show', $project->id) }}" type="button" class="btn bg-primary text-white rounded-full">Kanban</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

</main>
@endsection
