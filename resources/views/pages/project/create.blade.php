@extends('layouts.app')

@section('content')
<style>
    .dropzone {
        position: relative; /* Agar input dapat menutupi area */
    }

    .dropzone .dz-message {
        text-align: center; /* Pastikan konten berada di tengah */
        width: 100%; /* Lebar penuh agar dapat menampung konten */
        height: 100%; /* Pastikan tinggi penuh */
    }

    .dropzone .dz-message i {
        display: block; /* Membuat ikon dan teks berada di blok yang sama */
        margin: 0 auto; /* Memastikan ikon berada di tengah */
    }

    /* Sembunyikan input file asli */
    .dropzone input[type="file"] {
        position: absolute; /* Mengatur posisi absolut agar menutupi div */
        top: 0;
        left: 0;
        width: 100%; /* Lebar penuh */
        height: 100%; /* Tinggi penuh */
        opacity: 0; /* Sembunyikan input */
        cursor: pointer; /* Tampilkan kursor pointer saat hover */
    }
</style>

<div class="grid lg:grid-cols-4 gap-6">
    <div class="col-span-1 flex flex-col gap-6">
        <div class="card p-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="card-title">Add Avatar Images</h4>
                <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="ri-add-line"></i>
                </div>
            </div>
        
            <form action="{{ route('projects.store') }}" enctype="multipart/form-data" method="POST" class="dropzone flex flex-col items-center justify-center text-gray-700 dark:text-gray-300 h-52">
                @csrf
                <div class="fallback">
                    <input name="image" type="file" multiple="multiple">
                </div>
                <div class="dz-message needsclick w-full text-center">
                    <i class="ri-image-line text-8xl"></i>
                    <p class="mt-2">Drag and drop files here or click to upload</p>
                </div>
            </form>
        </div>            
    </div>

    <div class="lg:col-span-3 space-y-6">
        <div class="card p-6">
            <div class="flex justify-between items-center mb-4">
                <p class="card-title">Tambah Project</p>
                <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                    <i class="ri-transfer-line"></i>
                </div>
            </div>

            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-3">
                    <div class="">
                        <label for="name" class="mb-2 block">Project Name</label>
                        <input type="text" name="name" id="project-name" class="form-input rounded-md" placeholder="Enter Title" required>
                    </div>

                    <div class="">
                        <label for="description" class="mb-2 block">Project Description <span class="text-red-500">*</span></label>
                        <textarea name="description" id="project-description" class="form-input rounded-md" rows="8" required></textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-3">
                        <div class="">
                            <label for="start_date" class="mb-2 block">Start Date</label>
                            <input type="date" name="start_date" id="start-date" class="form-input rounded-md" required>
                        </div>

                        <div class="">
                            <label for="end_date" class="mb-2 block">End Date</label>
                            <input type="date" name="end_date" id="due-date" class="form-input rounded-md" required>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 mt-5">
                    <div class="flex justify-end gap-3">
                        <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none">
                            Cancel
                        </button>
                        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    Dropzone.options.myAwesomeDropzone = {
        paramName: "image", // Pastikan nama field di server cocok
        maxFilesize: 2, // Maksimal 2MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictDefaultMessage: "Drop files here to upload",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function(file, response) {
            console.log("Upload sukses", response);
        },
        error: function(file, response) {
            if (typeof response === 'string') {
                file.previewElement.querySelector("[data-dz-errormessage]").textContent = response;
            } else if (response.error) {
                file.previewElement.querySelector("[data-dz-errormessage]").textContent = response.error;
            } else {
                file.previewElement.querySelector("[data-dz-errormessage]").textContent = "An unknown error occurred.";
            }
        }
    };
</script>
@endsection
