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
    @empty
        <h1 class="text-red-500 font-bold">kosong</h1>
    @endforelse
@endsection
