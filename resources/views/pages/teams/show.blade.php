@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between ">
        <div class="py-1.5 px-3 text-lg font-semibold rounded-lg whitespace-nowrap flex items-center gap-2"
            style="background-color: #aee6ff; color:#28b6f6;">
            <svg width="30" height="15" viewBox="0 0 40 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 20V17.375C0 16.1806 0.611111 15.2083 1.83333 14.4583C3.05556 13.7083 4.66667 13.3333 6.66667 13.3333C7.02778 13.3333 7.375 13.3403 7.70833 13.3542C8.04167 13.3681 8.36111 13.4028 8.66667 13.4583C8.27778 14.0417 7.98611 14.6528 7.79167 15.2917C7.59722 15.9306 7.5 16.5972 7.5 17.2917V20H0ZM10 20V17.2917C10 16.4028 10.2431 15.5903 10.7292 14.8542C11.2153 14.1181 11.9028 13.4722 12.7917 12.9167C13.6806 12.3611 14.7431 11.9444 15.9792 11.6667C17.2153 11.3889 18.5556 11.25 20 11.25C21.4722 11.25 22.8264 11.3889 24.0625 11.6667C25.2986 11.9444 26.3611 12.3611 27.25 12.9167C28.1389 13.4722 28.8194 14.1181 29.2917 14.8542C29.7639 15.5903 30 16.4028 30 17.2917V20H10ZM32.5 20V17.2917C32.5 16.5694 32.4097 15.8889 32.2292 15.25C32.0486 14.6111 31.7778 14.0139 31.4167 13.4583C31.7222 13.4028 32.0347 13.3681 32.3542 13.3542C32.6736 13.3403 33 13.3333 33.3333 13.3333C35.3333 13.3333 36.9444 13.7014 38.1667 14.4375C39.3889 15.1736 40 16.1528 40 17.375V20H32.5ZM13.5417 16.6667H26.5C26.2222 16.1111 25.4514 15.625 24.1875 15.2083C22.9236 14.7917 21.5278 14.5833 20 14.5833C18.4722 14.5833 17.0764 14.7917 15.8125 15.2083C14.5486 15.625 13.7917 16.1111 13.5417 16.6667ZM6.66667 11.6667C5.75 11.6667 4.96528 11.3403 4.3125 10.6875C3.65972 10.0347 3.33333 9.25 3.33333 8.33333C3.33333 7.38889 3.65972 6.59722 4.3125 5.95833C4.96528 5.31944 5.75 5 6.66667 5C7.61111 5 8.40278 5.31944 9.04167 5.95833C9.68056 6.59722 10 7.38889 10 8.33333C10 9.25 9.68056 10.0347 9.04167 10.6875C8.40278 11.3403 7.61111 11.6667 6.66667 11.6667ZM33.3333 11.6667C32.4167 11.6667 31.6319 11.3403 30.9792 10.6875C30.3264 10.0347 30 9.25 30 8.33333C30 7.38889 30.3264 6.59722 30.9792 5.95833C31.6319 5.31944 32.4167 5 33.3333 5C34.2778 5 35.0694 5.31944 35.7083 5.95833C36.3472 6.59722 36.6667 7.38889 36.6667 8.33333C36.6667 9.25 36.3472 10.0347 35.7083 10.6875C35.0694 11.3403 34.2778 11.6667 33.3333 11.6667ZM20 10C18.6111 10 17.4306 9.51389 16.4583 8.54167C15.4861 7.56944 15 6.38889 15 5C15 3.58333 15.4861 2.39583 16.4583 1.4375C17.4306 0.479167 18.6111 0 20 0C21.4167 0 22.6042 0.479167 23.5625 1.4375C24.5208 2.39583 25 3.58333 25 5C25 6.38889 24.5208 7.56944 23.5625 8.54167C22.6042 9.51389 21.4167 10 20 10ZM20 6.66667C20.4722 6.66667 20.8681 6.50694 21.1875 6.1875C21.5069 5.86806 21.6667 5.47222 21.6667 5C21.6667 4.52778 21.5069 4.13194 21.1875 3.8125C20.8681 3.49306 20.4722 3.33333 20 3.33333C19.5278 3.33333 19.1319 3.49306 18.8125 3.8125C18.4931 4.13194 18.3333 4.52778 18.3333 5C18.3333 5.47222 18.4931 5.86806 18.8125 6.1875C19.1319 6.50694 19.5278 6.66667 20 6.66667Z"
                    fill="#29B6F6" />
            </svg>
            <span>Tim Anda</span>
        </div>

        <form>
            @csrf
            <button type="submit" class="text-lg font-semibold py-1.5 px-6 bg-danger text-white rounded-lg"><i
                    class="ri-door-open-line"></i> Keluar dari tim</button>
        </form>
    </div>

    <div class="mt-6 mb-3">
        <h1 class="text-3xl text-black font-bold mb-6">{{ $team->name }}</h1>

        <div class="flex py-3 gap-12" style="border-top: 2px solid #CACACA; border-bottom: 2px solid #CACACA;">
            <div class="flex items-center gap-2">
                <div style="background-color: #AEE6FF" class="w-10 h-10 flex justify-center items-center rounded-full">
                    <svg width="25" height="21" viewBox="0 0 15 11" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.625 10.5V8.75C0.625 8.39583 0.716146 8.07031 0.898438 7.77344C1.08073 7.47656 1.32292 7.25 1.625 7.09375C2.27083 6.77083 2.92708 6.52865 3.59375 6.36719C4.26042 6.20573 4.9375 6.125 5.625 6.125C6.3125 6.125 6.98958 6.20573 7.65625 6.36719C8.32292 6.52865 8.97917 6.77083 9.625 7.09375C9.92708 7.25 10.1693 7.47656 10.3516 7.77344C10.5339 8.07031 10.625 8.39583 10.625 8.75V10.5H0.625ZM11.875 10.5V8.625C11.875 8.16667 11.7474 7.72656 11.4922 7.30469C11.237 6.88281 10.875 6.52083 10.4062 6.21875C10.9375 6.28125 11.4375 6.38802 11.9063 6.53906C12.375 6.6901 12.8125 6.875 13.2188 7.09375C13.5938 7.30208 13.8802 7.53385 14.0781 7.78906C14.276 8.04427 14.375 8.32292 14.375 8.625V10.5H11.875ZM5.625 5.5C4.9375 5.5 4.34896 5.25521 3.85938 4.76562C3.36979 4.27604 3.125 3.6875 3.125 3C3.125 2.3125 3.36979 1.72396 3.85938 1.23438C4.34896 0.744792 4.9375 0.5 5.625 0.5C6.3125 0.5 6.90104 0.744792 7.39062 1.23438C7.88021 1.72396 8.125 2.3125 8.125 3C8.125 3.6875 7.88021 4.27604 7.39062 4.76562C6.90104 5.25521 6.3125 5.5 5.625 5.5ZM11.875 3C11.875 3.6875 11.6302 4.27604 11.1406 4.76562C10.651 5.25521 10.0625 5.5 9.375 5.5C9.26042 5.5 9.11458 5.48698 8.9375 5.46094C8.76042 5.4349 8.61458 5.40625 8.5 5.375C8.78125 5.04167 8.9974 4.67188 9.14844 4.26562C9.29948 3.85938 9.375 3.4375 9.375 3C9.375 2.5625 9.29948 2.14062 9.14844 1.73438C8.9974 1.32812 8.78125 0.958333 8.5 0.625C8.64583 0.572917 8.79167 0.539062 8.9375 0.523438C9.08333 0.507813 9.22917 0.5 9.375 0.5C10.0625 0.5 10.651 0.744792 11.1406 1.23438C11.6302 1.72396 11.875 2.3125 11.875 3ZM1.875 9.25H9.375V8.75C9.375 8.63542 9.34635 8.53125 9.28906 8.4375C9.23177 8.34375 9.15625 8.27083 9.0625 8.21875C8.5 7.9375 7.93229 7.72656 7.35938 7.58594C6.78646 7.44531 6.20833 7.375 5.625 7.375C5.04167 7.375 4.46354 7.44531 3.89062 7.58594C3.31771 7.72656 2.75 7.9375 2.1875 8.21875C2.09375 8.27083 2.01823 8.34375 1.96094 8.4375C1.90365 8.53125 1.875 8.63542 1.875 8.75V9.25ZM5.625 4.25C5.96875 4.25 6.26302 4.1276 6.50781 3.88281C6.7526 3.63802 6.875 3.34375 6.875 3C6.875 2.65625 6.7526 2.36198 6.50781 2.11719C6.26302 1.8724 5.96875 1.75 5.625 1.75C5.28125 1.75 4.98698 1.8724 4.74219 2.11719C4.4974 2.36198 4.375 2.65625 4.375 3C4.375 3.34375 4.4974 3.63802 4.74219 3.88281C4.98698 4.1276 5.28125 4.25 5.625 4.25Z"
                            fill="#29B6F6" />
                    </svg>
                </div>
                <span>
                    <span class="text-sm">Anggota</span>
                    <br>
                    <span class="font-bold text-xl text-black">{{ $team->users->count() }}</span>
                </span>
            </div>
            <div class="flex items-center gap-2">
                <div style="background-color: #AEE6FF" class="w-10 h-10 flex justify-center items-center rounded-full">
                    <svg width="25" height="21" viewBox="0 0 13 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.5 12.125C1.15625 12.125 0.861979 12.0026 0.617188 11.7578C0.372396 11.513 0.25 11.2188 0.25 10.875V4C0.25 3.65625 0.372396 3.36198 0.617188 3.11719C0.861979 2.8724 1.15625 2.75 1.5 2.75H4V1.5C4 1.15625 4.1224 0.861979 4.36719 0.617188C4.61198 0.372396 4.90625 0.25 5.25 0.25H7.75C8.09375 0.25 8.38802 0.372396 8.63281 0.617188C8.8776 0.861979 9 1.15625 9 1.5V2.75H11.5C11.8438 2.75 12.138 2.8724 12.3828 3.11719C12.6276 3.36198 12.75 3.65625 12.75 4V10.875C12.75 11.2188 12.6276 11.513 12.3828 11.7578C12.138 12.0026 11.8438 12.125 11.5 12.125H1.5ZM1.5 10.875H11.5V4H1.5V10.875ZM5.25 2.75H7.75V1.5H5.25V2.75Z"
                            fill="#29B6F6" />
                    </svg>

                </div>
                <span>
                    <span class="text-sm">Total Proyek</span>
                    <br>
                    <span class="font-bold text-xl text-black">13</span>
                </span>
            </div>
            <div class="flex items-center gap-2">
                <div style="background-color: #AEE6FF" class="w-10 h-10 flex justify-center items-center rounded-full">
                    <svg width="25" height="21" viewBox="0 0 11 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.84375 10.25L8.375 6.71875L7.46875 5.8125L4.82812 8.45312L3.51563 7.14063L2.625 8.03125L4.84375 10.25ZM1.75 12.75C1.40625 12.75 1.11198 12.6276 0.867188 12.3828C0.622396 12.138 0.5 11.8438 0.5 11.5V1.5C0.5 1.15625 0.622396 0.861979 0.867188 0.617188C1.11198 0.372396 1.40625 0.25 1.75 0.25H6.75L10.5 4V11.5C10.5 11.8438 10.3776 12.138 10.1328 12.3828C9.88802 12.6276 9.59375 12.75 9.25 12.75H1.75ZM6.125 4.625V1.5H1.75V11.5H9.25V4.625H6.125Z"
                            fill="#29B6F6" />
                    </svg>
                </div>
                <span>
                    <span class="text-sm">Proyek Selesai</span>
                    <br>
                    <span class="font-bold text-xl text-black">13</span>
                </span>
            </div>
        </div>
    </div>



    <div class="flex space-x-4 border-b">
        <button id="tab1-btn"
            class="relative py-2 px-4 text-base text-gray-600 hover:text-black transition duration-300 focus:outline-none">
            Tab 1
            <span
                class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
        </button>
        <button id="tab2-btn"
            class="relative py-2 px-4 text-base text-gray-600 hover:text-black transition duration-300 focus:outline-none">
            Tab 2
            <span
                class="absolute left-0 bottom-0 w-full h-0.5 bg-transparent hover:bg-black transition duration-300"></span>
        </button>
    </div>

    <!-- Content -->
    <div id="tab1-content" class="p-4">
        @forelse ($team->users as $user)
        <span class="inline-block bg-gray-200 rounded-md px-3 py-1 text-sm font-normal py-3 text-gray-700 mr-2 mb-2">
            <i class="ri-user-3-line font-semibold mr-2"></i>
            {{ $user->name }}
        </span>

        @empty

        <span class="inline-block bg-gray-200 rounded-md px-3 py-1 text-sm font-normal py-3 text-gray-700 mr-2 mb-2">
            <i class="ri-user-3-line font-semibold mr-2"></i>
            Kosong
        </span>
        @endforelse

    </div>
    <div id="tab2-content" class="p-4 hidden">
        <p>kosong</p>
    </div>

    <script>
        const tabButtons = document.querySelectorAll('[id$="-btn"]');
        const tabContents = document.querySelectorAll('[id$="-content"]');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-black', 'font-bold');
                    btn.querySelector('span').classList.remove('bg-black');
                    btn.classList.add('text-gray-600');
                });
                tabContents.forEach(content => content.classList.add('hidden'));

                // Add active class to clicked button and show associated content
                const tabId = button.id.split('-btn')[0];
                button.classList.add('text-black', 'font-bold');
                button.querySelector('span').classList.add('bg-black');
                document.getElementById(`${tabId}-content`).classList.remove('hidden');
            });
        });
    </script>

@endsection
