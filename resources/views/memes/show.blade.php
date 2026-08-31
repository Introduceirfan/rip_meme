@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <h1 class="text-3xl font-bold text-red-400 mb-6">{{ $meme -> name }}</h1>

    <p>Kategori: {{ $meme->category->name }}</p>
    <p>Tahun lahir: {{ $meme->born_at }}</p>
    <p>Tahun mati: {{ $meme->died_at }}</p>
    <p>Alasan mati: {{ $meme->cause_of_death }}</p>
    <p>Skor Viral: {{ $meme->skor_viral }}</p>
    <p>Status: {{ $meme->died_at && $meme->died_at <= now() ? 'Yah Mati' : 'Masih hidup' }}</p>
    @if($meme->image_url)
        <img src="{{ $meme->image_url }}" class="w-full rounded mt-4">
    @else
        <p class="text-red-400">Belum ada gambar atau gambar gabisa dimuat!</p>
    @endif
    <a href="/memes" class="text-gray-400 hover:text-white">← Back</a>
</div>
@endsection