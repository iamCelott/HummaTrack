<div id="deleteModal"
    class="w-full h-full fixed top-0 px-5 left-0 z-50 transition-all duration-500 hidden overflow-y-auto sm:mt-0 md:mt-[125px] items-center justify-center">
    <div
        class="-translate-y-5 text-black fc-modal-open:translate-y-0 fc-modal-open:opacity-100 opacity-0  duration-300 ease-in-out transition-all sm:max-w-md sm:w-full m-3 sm:mx-auto flex flex-col bg-white shadow-sm rounded-xl relative">
        <div class="relative flex justify-end px-6 py-2 mb-5">
            <button id="closeModal" data-fc-dismiss class="  text-[1.5rem]">
                <i class="ri-close-line text-gray-500 hover:text-gray-700"></i>
            </button>
        </div>
        <form id="deleteForm" action="" method="POST"
            class="px-6 pb-6 flex flex-col items-center">
            @csrf
            @method('DELETE')
            {{-- <img src="{{ asset('assets/images/Throw down-pana.png') }}" class="w-[300px]" alt=""> --}}
            <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah kamu yakin akan menghapus data ini?</h3>
            <div class="flex justify-center mb-3 mt-6 w-full">
                <div class=" flex justify-end w-full gap-x-2 mt-5">
                    <button id="closeModal" data-fc-dismiss
                        class=" px-6 py-2 bg-white text-red-400 border rounded-md border-red-500">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2 bg-danger rounded-md text-white">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
