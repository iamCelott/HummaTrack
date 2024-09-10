@extends('layouts.app')

@section('content')
    <div class="grid lg:grid-cols-4 gap-6">
        {{-- <div class="col-span-1 flex flex-col gap-6">
            <div class="card p-6">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="card-title">Add Avatar Images</h4>
                    <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                        <i class="ri-add-line"></i>
                    </div>
                </div>

                <!-- Input gambar -->
                <form action="" method="post"></form>
                <div class="mb-4">
                    <input id="imageInput" name="image" type="file" multiple="multiple"
                           class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200"
                           onchange="previewImages(event)">
                </div>

                <!-- Penampung untuk pratinjau gambar -->
                <div id="imagePreview" class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                    <!-- Gambar akan ditampilkan di sini -->
                </div>
            </div>
        </div>

        <script>
            function previewImages(event) {
                const files = event.target.files;
                const previewContainer = document.getElementById('imagePreview');
                previewContainer.innerHTML = ''; // Kosongkan kontainer preview sebelum menambahkan gambar baru

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // Hanya lakukan pratinjau untuk file yang bertipe gambar
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const imgElement = document.createElement('div');
                            imgElement.className = "relative";
                            imgElement.innerHTML = `
                                <img src="${e.target.result}" class="image-preview object-cover rounded-lg shadow-lg">
                            `;

                            // Tambahkan gambar ke penampung
                            previewContainer.appendChild(imgElement);
                        };

                        reader.readAsDataURL(file);
                    }
                }
            }
        </script> --}}

        <style>
            .image-preview {
                max-width: 260px;
                max-height: 200px;
                width: auto;
                height: auto;
            }
        </style>



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
                            <input type="text" name="name" id="project-name" class="form-input rounded-md"
                                placeholder="Enter Title" required>
                        </div>

                        <div class="">
                            <label for="description" class="mb-2 block">Project Description <span
                                    class="text-red-500">*</span></label>
                            <textarea name="description" id="project-description" class="form-input rounded-md" rows="8" required></textarea>
                        </div>

                        <div class="grid md:grid-cols-2 gap-3">
                            <div class="">
                                <label for="start_date" class="mb-2 block">Start Date</label>
                                <input type="date" name="start_date" id="start-date" class="form-input rounded-md"
                                    required>
                            </div>

                            <div class="">
                                <label for="end_date" class="mb-2 block">End Date</label>
                                <input type="date" name="end_date" id="due-date" class="form-input rounded-md" required>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-4 mt-5">
                        <div class="flex justify-end gap-3">
                            <button type="button"
                                class="inline-flex items-center rounded-md border border-transparent bg-danger px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-danger focus:outline-none">
                                Cancel
                            </button>
                            <button type="submit"
                                class="inline-flex items-center rounded-md border border-transparent bg-success px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-success focus:outline-none">
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
                    file.previewElement.querySelector("[data-dz-errormessage]").textContent =
                        "An unknown error occurred.";
                }
            }
        };
    </script>
@endsection
