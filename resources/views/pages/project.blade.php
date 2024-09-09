@extends('layouts.app')

@section('content')
    <form action="{{ route('projects.index') }}" method="GET">
        @csrf
        <input type="text" name="search">
    </form>

    <h1>TAMBAH</h1>
    <form action="{{ route('projects.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="image" placeholder="gambar">
        <input type="text" name="name" placeholder="nama project">
        <input type="date" name="start_date" placeholder="tgl mulai">
        <input type="date" name="end_date" placeholder="tgl berakhir">
        <textarea name="description" cols="30" rows="10"></textarea>
        <button type="submit">kirim</button>
    </form>

    @forelse ($projects as $project)
        <h1 class="text-red-500 font-bold">{{ $project->name }}</h1>

        <h1>edit</h1>
        <form action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <input type="file" name="image" placeholder="gambar">
            <input type="text" name="name" placeholder="nama project" value="{{ $project->name }}">
            <input type="date" name="start_date" placeholder="tgl mulai" value="{{ $project->start_date }}">
            <input type="date" name="end_date" placeholder="tgl berakhir" value="{{ $project->end_date }}">
            <textarea name="description" cols="30" rows="10">{{ $project->description }}</textarea>
            <button type="submit">kirim</button>
        </form>

        <h1>delete</h1>
        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 px-4 py-1">Hapus</button>
        </form>
    @empty
        <h1 class="text-red-500 font-bold">kosong</h1>
    @endforelse
@endsection
