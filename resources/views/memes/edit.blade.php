@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <h1 class="text-3xl font-bold text-red-500 mb-6"> Edit Meme</h1>

    <form action="/memes/{{ $meme->id }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm text-gray-400 mb-1">Nama Meme</label>
            <input type="text" name="name" value="{{ $meme->name }}" required class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-1">Kategori</label>
            <select name="category_id" class="w-full bg-gray-700 border border-gray-700 rounded px-4 py-2 text-white">
                @foreach ($categories as $category )
                    <option value="{{  $category->id }}" {{ $meme->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-1">Tahun Lahir</label>
            <input type="date" name="born_at" value="{{ $meme->born_at }}" required class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-1">Tahun Mati</label>
            <input type="date" name="died_at" id="died_at" value="{{ $meme->died_at }}" class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>
        
        <div>
            <label class="block text-sm text-gray-400 mb-1">Mati gara-gara</label>
            <input type="text" name="cause_of_death" id="cause_of_death" 
                placeholder="Isi tanggal mati dulu..." value="{{ $meme->cause_of_death }}" class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-1">Skor Viral</label>
            <input type="number" min="1" max="10" name="skor_viral" value="{{ $meme->skor_viral }}" required class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>

        <div>
            <label class="block text-sm text-gray-400 mb-1">Image URL</label>
            <input type="text" name="image_url" value="{{ $meme->image_url }}" class="w-full bg-gray-700 border border-gray-400 rounded px-4 py-2 text-white">
        </div>

        <button type="submit" class="bg-red-600 hover:bg-red-700 px-6 py-2 rounded font-bold transtion">Submit</button>
    </form>
</div>

<script>
    const diedAt = document.getElementById('died_at');
    const causeOfDeath = document.getElementById('cause_of_death');

    causeOfDeath.disabled = !diedAt.value;

    diedAt.addEventListener('change', () => {
        causeOfDeath.disabled = !diedAt.value;
        if (!diedAt.value) { 
            causeOfDeath.value = '';
            causeOfDeath.placeholder = 'Isi tanggal mati dulu...';
        } else {
            causeOfDeath.placeholder = 'Kok bisa mati?';
        }
    });
</script>
@endsection