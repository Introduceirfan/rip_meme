@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-red-500"> RIP MEME </h1>
        <a href="/memes/create" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-sm font-semibold transition">+ Add Memes </a>
    </div>

    <div class="overflow-x-auto rounded-lg border border-gray-500">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-900 text-gray-400 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Nama Meme</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Tahun Lahir</th>
                    <th class="px-6 py-4">Tahun Mati</th>
                    <th class="px-6 py-4">Skor Viral</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-500">
                @foreach($memes as $meme)
                <tr class="bg-gray-900 hover:bg-gray-800 transition">
                    <td class="px-6 py-4 font-medium">{{ $meme->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $meme->category->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $meme->born_at }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $meme->died_at ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="text-yellow-400 font-bold">{{ $meme->skor_viral }}/10</span>
                    </td>
                    <td class="px-6 py-4">
                        @if ($meme->died_at && $meme->died_at <= now())
                            <span class="bg-red-900 text-red-400 px-2 py-1 rounded text-xs font-semibold">Mati nih..</span>
                        @else
                            <span class="bg-green-900 text-green-400 px-2 py-1 rounded text-xs font-semibold">Masih hidupp</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="/memes/{{ $meme->id }}/edit" class="bg-green-400 hover:bg-green-700 px-3 py-1 rounded text-xs transition">Edit</a>
                        <form action="/memes/{{ $meme->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-800 px-3 py-1 rounded text-xs transition">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

