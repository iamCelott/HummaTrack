<x-app-layout>
    <form action="{{ route('projects.index') }}" method="GET">
        @csrf
        <input type="text" name="search">
    </form>

    @forelse ($projects as $project)
        <h1 class="text-red-500 font-bold">{{ $project->name }}</h1>
    @empty
        <h1 class="text-red-500 font-bold">kosong</h1>
    @endforelse
</x-app-layout>
