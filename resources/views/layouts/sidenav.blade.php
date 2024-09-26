<!-- Sidenav Menu -->
<style>
    .toggle-button {
        padding: 15px 30px;
        width: 100%;
        text-align: center;
    }

    #elSwitch {
        transition: transform 0.3s ease;
    }

    .menu-item {
        position: relative;
        /* Untuk kontrol posisi */
    }

    .menu-item .inline-flex {
        position: absolute;
        top: 50%;
        right: 0;
        margin-right: 20px;
        transform: translateY(-50%);
        /* Mentransformasi untuk menempatkan di tengah vertikal */
        opacity: 0;
        /* Awalnya tidak terlihat */
        transition: opacity 0.3s ease;
        /* Transisi untuk efek opacity */
    }

    .menu-item:hover .inline-flex {
        opacity: 1;
        /* Menampilkan tombol saat hover */
    }
</style>

<div class="app-menu">

    <!-- App Logo -->
    <a href="{{ route('dashboard') }}" class="logo-box">
        <!-- Light Logo -->
        <div class="logo-light">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo-lg h-[22px]" alt="Light logo">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm h-[22px]" alt="Small logo">
        </div>

        <!-- Dark Logo -->
        <div class="logo-dark">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="logo-lg h-[22px]" alt="Dark logo">
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="logo-sm h-[22px]" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="ri-checkbox-blank-circle-line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="scrollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title mt-4">Terakhir Dibuka</li>

            <div class="menu" id="lastRecentResult"></div>

            <script>
                $(document).ready(function() {
                    $.ajax({
                        url: "{{ route('api.recent_projects') }}",
                        type: "POST",
                        data: {
                            id: {{ Auth::user()->id }},
                        },
                        success: function(data) {
                            $('#lastRecentResult').empty();

                            $.each(data.data, function(index, project) {
                                console.log(project);
                                $('#lastRecentResult').append(`
                    <li class="menu-item">
                        <a href="{{ route('projects.show', '') }}/${project.id}" class="menu-link">
                            <span class="menu-icon">
                                <i class="ri-file-line"></i>
                            </span>
                            <span class="menu-text">${project.name}</span>
                        </a>
                    </li>
                `);
                            });
                        }
                    });
                });
            </script>

            @hasrole('admin')
                <li class="menu-title">Manajemen Umum</li>

                <li class="menu-item">
                    {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-dashboard-line"></i>
                        </span>
                        <span class="menu-text"> Dashboard </span>
                        {{-- <span class="badge bg-success rounded-full">2</span> --}}
                    </a>
                </li>

                <li class="menu-item">
                    {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-user-line"></i>
                        </span>
                        <span class="menu-text"> Pengguna </span>
                    </a>
                </li>
            @endhasrole

            <li class="menu-title">Manajemen Proyek</li>

            <li class="menu-item">
                {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                <a href="{{ route('projects.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-suitcase-line"></i>
                    </span>
                    <span class="menu-text"> Proyek </span>
                </a>
                <button type="button" data-fc-type="modal" data-fc-target="createProject"
                    class="inline-flex items-center bg-secondary light:bg-[#3e60d5] text-white font-semibold py-1 px-2 rounded group-hover:opacity-100 transition-opacity duration-300 ease-in-out">
                    <i class="ri-add-line"></i>
                </button>
            </li>

            @hasrole('admin')
                <li class="menu-item">
                    {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                    <a href="{{ route('admin.teams.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-team-line"></i>
                        </span>
                        <span class="menu-text">Kelompok</span>
                    </a>
                </li>
            @endhasrole

            <li class="menu-item">
                {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                <a href="{{ route('departements.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-home-office-line"></i>
                    </span>
                    <span class="menu-text">Divisi</span>
                </a>
            </li>

            @hasrole('member')
                <li class="menu-item">
                    {{-- href="javascript:void(0)" data-fc-type="collapse" --}}
                    <a href="{{ route('member.teams.index') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="ri-team-line"></i>
                        </span>
                        <span class="menu-text">Kelompok</span>
                    </a>
                </li>
            @endhasrole


            {{-- <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-flag-2-line"></i>
                    </span>
                    <span class="menu-text"> Badge Items </span>
                    <span class="badge bg-danger rounded-md">Hot</span>
                </a>
            </li>
        </ul> --}}

    </div>
</div>

{{-- modal edit  --}}

<div id="createProject"
    class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto items-center justify-center">
    <div
        class="-translate-y-5 text-black fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl relative">
        <div class="relative flex justify-between p-6">
            <img src="{{ asset('assets/images/elements/wave-right.png') }}" class="absolute top-0 left-0 sm:h-20"
                alt="">
            <h1 class="text-2xl font-bold">Tambah Proyek</h1>
            <button id="closeModal" data-fc-dismiss class="text-black hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex space-x-4 border-b mt-3 mx-6">
            <button id="tab1-btn"
                class="relative py-2 px-4 text-base text-gray-600 hover:text-black transition duration-300 focus:outline-none">
                Pribadi
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
            </button>
            <button id="tab2-btn"
                class="relative py-2 px-4 text-base text-gray-600 hover:text-black transition duration-300 focus:outline-none">
                Berkelompok
                <span
                    class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
            </button>
        </div>

        <!-- Content -->
        <div id="tab1-content" class="">
            <form action="{{ route('projects.store') }}" method="POST" class="px-6 py-6">
                @csrf

                <input type="hidden" name="type" value="individual">
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">

                <div class="flex justify-between gap-3 mb-3">
                    <div class="w-1/2">
                        <label for="name" class="font-semibold text-black ">Judul</label>
                        <br>
                        <input type="text" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="name" name="name" value="{{ old('name') }}"
                            placeholder="Beri judul untuk proyek anda">
                    </div>

                    <div class="w-1/2">
                        <label for="subtitle" class="font-semibold text-black ">Sub Judul</label>
                        <br>
                        <input type="text" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="subtitle" name="subtitle" value="{{ old('subtitle') }}"
                            placeholder="Beri sub judul untuk proyek anda">
                    </div>
                </div>

                <div class="w-full mb-3">
                    <label for="description" class="font-semibold text-black ">Deskripsi (Opsional)</label>
                    <br>
                    <textarea name="description" id="description" style="border: 2px solid #cacaca" class="w-full rounded-lg px-6 py-2"
                        cols="30" rows="5" placeholder="Beri deskripsi untuk proyek anda">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-between gap-3 mb-6">
                    <div class="w-1/2">
                        <label for="start_date" class="font-semibold text-black ">Tanggal Mulai</label>
                        <br>
                        <input type="date" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="start_date" name="start_date" value="{{ old('start_date') }}">
                    </div>

                    <div class="w-1/2">
                        <label for="end_date" class="font-semibold text-black ">Tanggal Berakhir</label>
                        <br>
                        <input type="date" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="end_date" name="end_date" value="{{ old('end_date') }}">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-primary rounded-lg text-white">Konfirmasi</button>
                </div>

            </form>
        </div>

        <div id="tab2-content" class="hidden">
            <form action="{{ route('projects.store') }}" method="POST" class="px-6 py-6">
                @csrf

                <input type="hidden" name="type" value="team">
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">

                <div class="flex justify-between gap-3 mb-3">
                    <div class="w-1/2">
                        <label for="name" class="font-semibold text-black ">Judul</label>
                        <br>
                        <input type="text" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="name" name="name" value="{{ old('name') }}"
                            placeholder="Beri judul untuk proyek anda">
                    </div>

                    <div class="w-1/2">
                        <label for="subtitle" class="font-semibold text-black ">Sub Judul</label>
                        <br>
                        <input type="text" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="subtitle" name="subtitle" value="{{ old('subtitle') }}"
                            placeholder="Beri sub judul untuk proyek anda">
                    </div>
                </div>

                <div class="w-full mb-3">
                    <label for="description" class="font-semibold text-black ">Deskripsi (Opsional)</label>
                    <br>
                    <textarea name="description" id="description" style="border: 2px solid #cacaca" class="w-full rounded-lg px-6 py-2"
                        cols="30" rows="5" placeholder="Beri deskripsi untuk proyek anda">{{ old('description') }}</textarea>
                </div>

                <div class="flex justify-between gap-3 mb-3">
                    <div class="w-1/2">
                        <label for="start_date" class="font-semibold text-black ">Tanggal Mulai</label>
                        <br>
                        <input type="date" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="start_date" name="start_date" value="{{ old('start_date') }}">
                    </div>

                    <div class="w-1/2">
                        <label for="end_date" class="font-semibold text-black ">Tanggal Berakhir</label>
                        <br>
                        <input type="date" style="border: 2px solid #cacaca" class="w-full px-6 py-2 rounded-lg"
                            id="end_date" name="end_date" value="{{ old('end_date') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="searchTeam" class="font-semibold text-black">Tugaskan Untuk</label>
                    <div class="relative mb-3">
                        <i class="ri-search-line absolute" style="left: 10px; top:12px;"></i>
                        <input type="text" value="{{ old('searchTeam') }}" id="searchTeam"
                            placeholder="cari nama tim anda" class="w-full outline-none rounded-lg py-2"
                            style="padding-left: 30px;border: 2px solid #cacaca">
                    </div>

                    <div class="mb-3" id="addedTeam">
                    </div>

                    <div class="overflow-auto w-full" style="max-height: 170px;" id="searchTeamResult">
                    </div>

                </div>

                <style>
                    #submitButton:disabled {
                        background-color: #d3d3d3;
                        cursor: not-allowed;
                    }
                </style>
                <div class="flex justify-end">
                    <button id="submitButton" type="submit"
                        class="px-6 py-2 bg-primary rounded-lg text-white">Konfirmasi</button>
                    {{-- <small class="text-red-500">Tim wajib diisi!</small> --}}
                </div>
                <div class="flex justify-end">
                    <small class="text-red-500" id="teamAlert">Tim wajib diisi!</small>
                </div>

            </form>
        </div>

        <script>
            const tabButtons = document.querySelectorAll('[id$="-btn"]');
            const tabContents = document.querySelectorAll('[id$="-content"]');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {

                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-black', 'font-bold');
                        btn.querySelector('span').classList.remove('bg-black');
                        btn.classList.add('text-gray-600');
                    });
                    tabContents.forEach(content => content.classList.add('hidden'));

                    const tabId = button.id.split('-btn')[0];
                    button.classList.add('text-black', 'font-bold');
                    button.querySelector('span').classList.add('bg-black');
                    document.getElementById(`${tabId}-content`).classList.remove('hidden');
                });
            });

            const firstButton = tabButtons[0];
            if (firstButton) {
                firstButton.click();
            }
        </script>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#createProject')
        });

        searchTeams()
        toggleSubmitButton();
    });

    var selectedTeams = [];

    function toggleSubmitButton() {
        if (selectedTeams.length === 0) {
            $('#submitButton').prop('disabled', true);
            $('#teamAlert').removeClass('hidden');
        } else {
            $('#submitButton').prop('disabled', false);
            $('#teamAlert').addClass('hidden');
        }
    }

    function searchTeams(query = '') {
        $.ajax({
            url: "{{ route('api.project_search_team') }}",
            type: "POST",
            data: {
                search: query,
                id: {{ Auth::user()->id }}
            },
            success: function(data) {
                $('#searchTeamResult').empty();

                var teams = data.data;
                var userLogin = {{ Auth::user()->id }}

                if (teams.length > 0) {
                    $.each(teams, function(index, team) {

                        if (!selectedTeams.includes(team.id.toString())) {
                            var photoUrl = "";

                            if (team.leader[0].photo_profile && team.leader[0].photo_profile
                                .includes(
                                    'profile_images/')) {
                                photoUrl = "{{ asset('storage') }}/" + team.leader[0]
                                    .photo_profile;
                            } else {
                                photoUrl = team.leader[0].photo_profile;
                            }

                            var isChecked = selectedTeams.includes(team.id.toString()) ?
                                'checked' : '';

                            $('#searchTeamResult').append(`
                        <div class="team-item flex justify-between mb-3 p-3 rounded-lg" style="background-color: #F2F2F2"
                        data-team-id="${team.id}">
                        <div class="flex gap-3 items-center">
                            <img src="${photoUrl}"
                                class="w-10 h-10 object-cover rounded-full" alt="">
                            <div class="">
                                <h1 class="text-lg font-semibold">${team.name}</h1>
                                <span style="opacity: 70%">Ketua: <strong>${team.leader[0].id == userLogin ? 'Anda' : team.leader[0].name}</strong></span>
                            </div>
                        </div>
                        <div class="">
                            <input type="checkbox" name="team_id[]" value="${team.id}" class="rounded-full">
                        </div>
                    </div>
                    `);
                        }
                    });
                } else {
                    $('#searchTeamResult').append(
                        '<p class="text-center font-bold" style="line-height:170px;">Tim tidak ditemukan.</p>'
                    );
                }
            }
        });
    }

    $('#searchTeam').on('keyup', function(e) {
        var query = $(this).val();
        searchTeams(query);
    });

    $(document).on('change', 'input[name="team_id[]"]', function() {
        var teamId = $(this).val();
        var teamItem = $(this).closest('.team-item');
        var teamName = $(this).closest('.flex').find('h1').text();
        var teamLeader = $(this).closest('.flex').find('span').text();
        var photoUrl = $(this).closest('.flex').find('img').attr('src');

        if ($(this).is(':checked')) {
            if (!selectedTeams.includes(teamId)) {
                selectedTeams.push(teamId);
                teamItem.remove();

                toggleSubmitButton();
                $('#addedTeam').append(`
                   <div class="team-item flex justify-between mb-3 p-3 rounded-lg" style="background-color: #F2F2F2"
                        data-team-id="${teamId}">
                        <div class="flex gap-3 items-center">
                            <img src="${photoUrl}"
                                class="w-10 h-10 object-cover rounded-full" alt="">
                            <div class="">
                                <h1 class="text-lg font-semibold">${teamName}</h1>
                                <span style="opacity: 70%">${teamLeader }</span>
                            </div>
                        </div>
                        <div class="">
                            <input type="checkbox" name="team_id[]" value="${teamId}" class="rounded-full" checked>
                        </div>
                    </div>
                `);
            }
        } else {
            selectedTeams = selectedTeams.filter(function(id) {
                return id !== teamId;
            });

            toggleSubmitButton();

            $(`#addedTeam div[data-team-id="${teamId}"]`).remove();

            $('#searchTeamResult').append(`
                <div class="team-item flex justify-between mb-3 p-3 rounded-lg" style="background-color: #F2F2F2"
                        data-team-id="${teamId}">
                        <div class="flex gap-3 items-center">
                            <img src="${photoUrl}"
                                class="w-10 h-10 object-cover rounded-full" alt="">
                            <div class="">
                                <h1 class="text-lg font-semibold">${teamName}</h1>
                                <span style="opacity: 70%">${teamLeader}</span>
                            </div>
                        </div>
                        <div class="">
                            <input type="checkbox" name="team_id[]" value="${teamId}" class="rounded-full">
                        </div>
                    </div>
            `);
        }

        $('#addedTeam small').remove();
        if (selectedTeams.length > 0) {
            $('#addedTeam').prepend(`<small>Ditugaskan</small>`);

            $('#addedTeam').css({
                'border-bottom': '2px solid #cacaca'
            });
        } else {
            $('#addedTeam').css({
                'border-bottom': '0'
            });
        }
    });
</script>

<script src="//unpkg.com/alpinejs" defer></script>

<style>
    .modal-footer {
        position: relative;
        justify-content: end;
        display: flex;
        gap: 10px;
    }
</style>







<!-- Sidenav Menu End  -->
