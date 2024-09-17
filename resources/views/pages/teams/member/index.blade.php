@php
    use App\Helpers\UserHelper;
@endphp
@extends('layouts.app')

@section('content')

    <div id="createTeam"
        class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden overflow-y-auto rounded-lg">
        <div class="overflow-hidden text-black -translate-y-5 fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0 duration-300 ease-in-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto flex flex-col shadow-sm dark:bg-gray-800 relative rounded-lg"
            style="background-color: white">

            <form action="{{ route('member.teams.store') }}" method="POST" class="p-6">
                @csrf
                <div class="flex gap-2 items-center mb-3">
                    <img src="{{ asset('assets/images/svg/create-team-logo.svg') }}" alt="">
                    <div class="">
                        <h1 class="text-2xl font-bold">Buat Tim Baru</h1>
                        <span>Berkolaborasi dan berkreasi dengan imajinasi</span>
                    </div>
                </div>

                <div class="">
                    <div class="mb-3">
                        <label for="name" class="text-lg font-bold text-black">Nama Tim</label>
                        <input type="text" name="name" id="name" placeholder="beri nama untuk tim anda"
                            class="text-sm w-full outline-none rounded-lg">

                        <input type="hidden" name="created_by" id="created_by" value="{{ UserHelper::getUserId() }}">
                    </div>

                    <div class="mb-3">
                        <label for="searchUser" class="text-lg font-bold text-black">Anggota Tim</label>
                        <div class="relative mb-3">
                            <i class="ri-search-line absolute" style="left: 10px; top:9px;"></i>
                            <input type="text" name="user_id" id="searchUser" placeholder="cari nama anggota tim anda"
                                class="text-sm w-full outline-none rounded-lg" style="padding-left: 30px">
                        </div>

                        <div id="invitedUser"></div>

                        {{-- <small>Hasil yang ditampilkan</small> --}}
                        <div class="overflow-auto w-full" style="max-height: 170px;" id="searchResult">
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary px-6 py-1.5 rounded-lg text-white">Buat
                            Tim</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @php
        $userId = Auth::id();
        $hasCreatedTeam = \App\Models\Team::where('created_by', $userId)->exists();
    @endphp

    @if ($hasCreatedTeam)
        <div class="flex mb-6 w-full justify-between items-center">
            <div class="relative w-1/2">
                <i class="ri-search-line absolute top-3" style="left: 0.75rem"></i>
                <form action="{{ route('member.teams.index') }}" method="GET">
                    @csrf
                    <input type="text" name="search" id="" class="w-full outline-none rounded-xl"
                        value="{{ request('search') }}" style="border: 2px solid #cacaca;padding-left: 2.25rem"
                        placeholder="cari nama tim anda">
                </form>
            </div>

            <div class="">
                <button data-fc-type="modal" data-fc-target="createTeam"
                    class="px-6 py-1.5 bg-primary rounded-lg text-white"><i class="ri-add-fill"></i> Buat
                    Tim</button>
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse ($teams as $team)
                <div class="w-full pb-6 px-6 rounded-lg text-black" style="background-color: white">
                    <div class="flex py-3 justify-between">
                        <h1 style="padding-bottom: 20px" class="font-bold text-2xl">{{ $team->name }}</h1>
                    </div>

                    <div class="flex py-3 gap-3 justify-between"
                        style="border-top: 2px solid #CACACA; border-bottom: 2px solid #CACACA;">
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.625 10.5V8.75C0.625 8.39583 0.716146 8.07031 0.898438 7.77344C1.08073 7.47656 1.32292 7.25 1.625 7.09375C2.27083 6.77083 2.92708 6.52865 3.59375 6.36719C4.26042 6.20573 4.9375 6.125 5.625 6.125C6.3125 6.125 6.98958 6.20573 7.65625 6.36719C8.32292 6.52865 8.97917 6.77083 9.625 7.09375C9.92708 7.25 10.1693 7.47656 10.3516 7.77344C10.5339 8.07031 10.625 8.39583 10.625 8.75V10.5H0.625ZM11.875 10.5V8.625C11.875 8.16667 11.7474 7.72656 11.4922 7.30469C11.237 6.88281 10.875 6.52083 10.4062 6.21875C10.9375 6.28125 11.4375 6.38802 11.9063 6.53906C12.375 6.6901 12.8125 6.875 13.2188 7.09375C13.5938 7.30208 13.8802 7.53385 14.0781 7.78906C14.276 8.04427 14.375 8.32292 14.375 8.625V10.5H11.875ZM5.625 5.5C4.9375 5.5 4.34896 5.25521 3.85938 4.76562C3.36979 4.27604 3.125 3.6875 3.125 3C3.125 2.3125 3.36979 1.72396 3.85938 1.23438C4.34896 0.744792 4.9375 0.5 5.625 0.5C6.3125 0.5 6.90104 0.744792 7.39062 1.23438C7.88021 1.72396 8.125 2.3125 8.125 3C8.125 3.6875 7.88021 4.27604 7.39062 4.76562C6.90104 5.25521 6.3125 5.5 5.625 5.5ZM11.875 3C11.875 3.6875 11.6302 4.27604 11.1406 4.76562C10.651 5.25521 10.0625 5.5 9.375 5.5C9.26042 5.5 9.11458 5.48698 8.9375 5.46094C8.76042 5.4349 8.61458 5.40625 8.5 5.375C8.78125 5.04167 8.9974 4.67188 9.14844 4.26562C9.29948 3.85938 9.375 3.4375 9.375 3C9.375 2.5625 9.29948 2.14062 9.14844 1.73438C8.9974 1.32812 8.78125 0.958333 8.5 0.625C8.64583 0.572917 8.79167 0.539062 8.9375 0.523438C9.08333 0.507813 9.22917 0.5 9.375 0.5C10.0625 0.5 10.651 0.744792 11.1406 1.23438C11.6302 1.72396 11.875 2.3125 11.875 3ZM1.875 9.25H9.375V8.75C9.375 8.63542 9.34635 8.53125 9.28906 8.4375C9.23177 8.34375 9.15625 8.27083 9.0625 8.21875C8.5 7.9375 7.93229 7.72656 7.35938 7.58594C6.78646 7.44531 6.20833 7.375 5.625 7.375C5.04167 7.375 4.46354 7.44531 3.89062 7.58594C3.31771 7.72656 2.75 7.9375 2.1875 8.21875C2.09375 8.27083 2.01823 8.34375 1.96094 8.4375C1.90365 8.53125 1.875 8.63542 1.875 8.75V9.25ZM5.625 4.25C5.96875 4.25 6.26302 4.1276 6.50781 3.88281C6.7526 3.63802 6.875 3.34375 6.875 3C6.875 2.65625 6.7526 2.36198 6.50781 2.11719C6.26302 1.8724 5.96875 1.75 5.625 1.75C5.28125 1.75 4.98698 1.8724 4.74219 2.11719C4.4974 2.36198 4.375 2.65625 4.375 3C4.375 3.34375 4.4974 3.63802 4.74219 3.88281C4.98698 4.1276 5.28125 4.25 5.625 4.25Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <span>
                                <span class="text-xs">Anggota</span>
                                <br>
                                <span class="font-bold text-xs">{{ $team->users->count() }}</span>
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 12.125C1.15625 12.125 0.861979 12.0026 0.617188 11.7578C0.372396 11.513 0.25 11.2188 0.25 10.875V4C0.25 3.65625 0.372396 3.36198 0.617188 3.11719C0.861979 2.8724 1.15625 2.75 1.5 2.75H4V1.5C4 1.15625 4.1224 0.861979 4.36719 0.617188C4.61198 0.372396 4.90625 0.25 5.25 0.25H7.75C8.09375 0.25 8.38802 0.372396 8.63281 0.617188C8.8776 0.861979 9 1.15625 9 1.5V2.75H11.5C11.8438 2.75 12.138 2.8724 12.3828 3.11719C12.6276 3.36198 12.75 3.65625 12.75 4V10.875C12.75 11.2188 12.6276 11.513 12.3828 11.7578C12.138 12.0026 11.8438 12.125 11.5 12.125H1.5ZM1.5 10.875H11.5V4H1.5V10.875ZM5.25 2.75H7.75V1.5H5.25V2.75Z"
                                        fill="#29B6F6" />
                                </svg>

                            </div>
                            <span>
                                <span class="text-xs">Total Proyek</span>
                                <br>
                                <span class="font-bold text-xs">13</span>
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div style="background-color: #AEE6FF"
                                class="w-8 h-8 flex justify-center items-center rounded-full">
                                <svg width="11" height="13" viewBox="0 0 11 13" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.84375 10.25L8.375 6.71875L7.46875 5.8125L4.82812 8.45312L3.51563 7.14063L2.625 8.03125L4.84375 10.25ZM1.75 12.75C1.40625 12.75 1.11198 12.6276 0.867188 12.3828C0.622396 12.138 0.5 11.8438 0.5 11.5V1.5C0.5 1.15625 0.622396 0.861979 0.867188 0.617188C1.11198 0.372396 1.40625 0.25 1.75 0.25H6.75L10.5 4V11.5C10.5 11.8438 10.3776 12.138 10.1328 12.3828C9.88802 12.6276 9.59375 12.75 9.25 12.75H1.75ZM6.125 4.625V1.5H1.75V11.5H9.25V4.625H6.125Z"
                                        fill="#29B6F6" />
                                </svg>
                            </div>
                            <span>
                                <span class="text-xs">Proyek Selesai</span>
                                <br>
                                <span class="font-bold text-xs">13</span>
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between pt-3">
                        <div class="flex items-center gap-2">

                            @if (!empty($team->create_by->photo_profile) && Str::contains($team->create_by->photo_profile, 'profile_images/'))
                                <img src="{{ asset('storage/' . $team->create_by->photo_profile) }}"
                                    alt="{{ $team->create_by->name }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <img src="{{ $team->create_by->photo_profile }}" alt="{{ $team->create_by->name }}"
                                    class="w-12 h-12 rounded-full object-cover">
                            @endif

                            <span>
                                <span class="font-bold" style="font-size: 1.1rem">Ketua</span>
                                <br>
                                <span style="font-size: 1.1rem">{{ $team->create_by->name }}</span>
                            </span>
                        </div>

                        <div class="flex items-end">
                            <a href="{{ route('member.teams.show', $team->id) }}"
                                class="rounded-lg py-1 text-white font-semibold"
                                style="background-color: #0496FF;padding-left: 1.8rem; padding-right: 1.8rem"><i
                                    class="ri-information-line"></i> Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="font-bold text-lg">Tim {{ request('search') }} tidak ditemukan.</h1>
            @endforelse
        </div>
    @else
        <div class="flex justify-center items-center text-black">
            <div class="flex flex-col" style="max-width: 18rem; margin-top: 10rem; margin-right: 3rem;">
                <div class="flex justify-center ">
                    <img src="{{ asset('assets/images/svg/no-team-logo.svg') }}" alt="">
                </div>
                <h1 class="py-3 text-center text-lg dark:text-white">Anda Belum Memiliki Tim</h1>

                <div class="mb-3">
                    <div class="flex gap-2 items-center mb-3">
                        <div class="flex justify-center items-center rounded-full"
                            style="background-color: #AEE6FF; width: 50px; height: 30px;">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.00065 17.3333C6.63954 17.3333 6.31315 17.2465 6.02148 17.0729C5.72982 16.8993 5.50065 16.6666 5.33398 16.375C4.87565 16.375 4.48329 16.2118 4.1569 15.8854C3.83051 15.559 3.66732 15.1666 3.66732 14.7083V11.75C2.84787 11.2083 2.19162 10.493 1.69857 9.60413C1.20551 8.71524 0.958984 7.74996 0.958984 6.70829C0.958984 5.02774 1.54579 3.60065 2.7194 2.42704C3.89301 1.25343 5.3201 0.666626 7.00065 0.666626C8.68121 0.666626 10.1083 1.25343 11.2819 2.42704C12.4555 3.60065 13.0423 5.02774 13.0423 6.70829C13.0423 7.77774 12.7958 8.74996 12.3027 9.62496C11.8097 10.5 11.1534 11.2083 10.334 11.75V14.7083C10.334 15.1666 10.1708 15.559 9.8444 15.8854C9.51801 16.2118 9.12565 16.375 8.66732 16.375C8.50065 16.6666 8.27148 16.8993 7.97982 17.0729C7.68815 17.2465 7.36176 17.3333 7.00065 17.3333ZM5.33398 14.7083H8.66732V13.9583H5.33398V14.7083ZM5.33398 13.125H8.66732V12.3333H5.33398V13.125ZM5.16732 10.6666H6.37565V8.41663L4.54232 6.58329L5.41732 5.70829L7.00065 7.29163L8.58398 5.70829L9.45898 6.58329L7.62565 8.41663V10.6666H8.83398C9.58398 10.3055 10.1951 9.77427 10.6673 9.07288C11.1395 8.37149 11.3757 7.58329 11.3757 6.70829C11.3757 5.48607 10.952 4.45135 10.1048 3.60413C9.2576 2.7569 8.22287 2.33329 7.00065 2.33329C5.77843 2.33329 4.74371 2.7569 3.89648 3.60413C3.04926 4.45135 2.62565 5.48607 2.62565 6.70829C2.62565 7.58329 2.86176 8.37149 3.33398 9.07288C3.80621 9.77427 4.41732 10.3055 5.16732 10.6666Z"
                                    fill="#29B6F6" />
                            </svg>
                        </div>
                        <p class="text-xs dark:text-white">Dengan membuat tim, Anda bisa berbagi ide dan masukan
                            dari
                            berbagai
                            pengguna.</p>
                    </div>

                    <div class="flex gap-2">
                        <div class="flex justify-center items-center rounded-full"
                            style="background-color: #AEE6FF; width: 65px; height: 30px;">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.79232 14.1667L10.1048 9.00008H6.77148L7.37565 4.27091L3.52148 9.83341H6.41732L5.79232 14.1667ZM3.66732 17.3334L4.50065 11.5001H0.333984L7.83398 0.666748H9.50065L8.66732 7.33341H13.6673L5.33398 17.3334H3.66732Z"
                                    fill="#29B6F6" />
                            </svg>
                        </div>
                        <p class="text-xs dark:text-white">Dengan membuat tim, Anda dapat berkolaborasi dengan tim
                            untuk
                            menyelesaikan proyek lebih efisien.</p>
                    </div>
                </div>

                <button data-fc-type="modal" data-fc-target="createTeam"
                    class="rounded-xl text-white py-2 mt-3 text-lg font-semibold outline-none"
                    style="background-color: #0288D1">
                    Buat Tim
                </button>
            </div>
    @endif

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                dropdownParent: $('#createTeam')
            });

            var selectedUsers = [];

            function searchUsers(query = '') {
                $.ajax({
                    url: "{{ route('api.team_search_user') }}",
                    type: "POST",
                    data: {
                        search: query,
                        id: {{ Auth::user()->id }}
                    },
                    success: function(data) {
                        $('#searchResult').empty();

                        var users = data.data;

                        if (users.length > 0) {
                            $.each(users, function(index, user) {

                                if (!selectedUsers.includes(user.id.toString())) {
                                    var photoUrl = "";

                                    if (user.photo_profile && user.photo_profile.includes(
                                            'profile_images/')) {
                                        photoUrl = "{{ asset('storage') }}/" + user
                                            .photo_profile;
                                    } else {
                                        photoUrl = user.photo_profile;
                                    }

                                    var isChecked = selectedUsers.includes(user.id.toString()) ?
                                        'checked' : '';

                                    $('#searchResult').append(`
                            <div class="user-item flex justify-between mb-3 p-3 rounded-lg" style="background-color: #F2F2F2" data-user-id="${user.id}">
                                <div class="flex gap-3 items-center">
                                    <img src="${photoUrl}" class="w-12 h-12 object-cover rounded-full" alt="">
                                    <div class="">
                                        <h1 class="text-lg font-bold">${user.name}</h1>
                                        <span>${user.email}</span>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="checkbox" name="user_id[]" value="${user.id}" class="rounded-full" ${isChecked}>
                                </div>
                            </div>
                        `);
                                }
                            });
                        } else {
                            $('#searchResult').append(
                                '<p class="text-center font-bold" style="line-height:170px;">Pengguna tidak ditemukan.</p>'
                            );
                        }
                    }
                });
            }

            searchUsers();

            $('#searchUser').on('keyup', function(e) {
                var query = $(this).val();
                searchUsers(query);
            });

            $(document).on('change', 'input[name="user_id[]"]', function() {
                var userId = $(this).val();
                var userItem = $(this).closest('.user-item');
                var userName = $(this).closest('.flex').find('h1').text();
                var userEmail = $(this).closest('.flex').find('span').text();
                var photoUrl = $(this).closest('.flex').find('img').attr('src');

                if ($(this).is(':checked')) {
                    if (!selectedUsers.includes(userId)) {
                        selectedUsers.push(userId);

                        // Remove the user from the search result if it exists
                        userItem.remove();

                        // Append the user to the invitedUser section
                        $('#invitedUser').append(`
                    <div class="user-item flex justify-between ml-3 mb-3 p-3 rounded-lg" style="background-color: #F2F2F2" data-user-id="${userId}">
                        <div class="flex gap-3 items-center">
                            <img src="${photoUrl}" class="w-12 h-12 object-cover rounded-full" alt="User Photo">
                            <div class="">
                                <h1 class="text-lg font-bold">${userName}</h1>
                                <span>${userEmail}</span>
                            </div>
                        </div>
                        <div class="">
                            <input type="checkbox" name="user_id[]" value="${userId}" class="rounded-full" checked>
                        </div>
                    </div>
                `);
                    }
                } else {
                    selectedUsers = selectedUsers.filter(function(id) {
                        return id !== userId;
                    });

                    $(`#invitedUser div[data-user-id="${userId}"]`).remove();

                    $('#searchResult').append(`
                <div class="user-item flex justify-between mb-3 p-3 rounded-lg" style="background-color: #F2F2F2" data-user-id="${userId}">
                    <div class="flex gap-3 items-center">
                        <img src="${photoUrl}" class="w-12 h-12 object-cover rounded-full" alt="">
                        <div class="">
                            <h1 class="text-lg font-bold">${userName}</h1>
                            <span>${userEmail}</span>
                        </div>
                    </div>
                    <div class="">
                        <input type="checkbox" name="user_id[]" value="${userId}" class="rounded-full">
                    </div>
                </div>
            `);
                }

                $('#invitedUser small').remove();
                if (selectedUsers.length > 0) {
                    $('#invitedUser').prepend(`<small>Diundang</small>`);

                    $('#invitedUser').css({
                        'border-bottom': '2px solid #cacaca'
                    });
                } else {
                    $('#invitedUser').css({
                        'border-bottom': '0'
                    });
                }
            });

        });
    </script>

@endsection
