<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meme;
use Illuminate\Http\Request;
use App\Exports\MemesExport;
use App\Imports\MemesImport;
use Maatwebsite\Excel\Facades\Excel;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memes = Meme::all();
        return view('memes.index', compact('memes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('memes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:128',
            'skor_viral' => 'required|integer|min:1|max:10',
            'image_url' => 'nullable|string',
            'born_at' => 'required|date',
            'died_at' => 'date|nullable',
            'cause_of_death' => 'string|nullable'
        ]);

        Meme::create([
            'name' => $request->name,
            'skor_viral' => $request->skor_viral,
            'image_url' => $request->image_url,
            'born_at' => $request->born_at,
            'died_at'=> $request->died_at,
            'cause_of_death'=> $request->cause_of_death,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('memes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $meme = Meme::findOrFail($id);
        return view('memes.show', compact('meme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $meme = Meme::findOrFail($id);
        return view('memes.edit', compact('categories', 'meme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meme = Meme::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:128',
            'skor_viral' => 'required|integer|min:1|max:10',
            'image_url' => 'nullable|string',
            'born_at' => 'required|date',
            'died_at' => 'date|nullable',
            'cause_of_death' => 'string|nullable'
        ]);

        $meme->update([
            'name' => $request->name,
            'skor_viral' => $request->skor_viral,
            'image_url' => $request->image_url,
            'born_at' => $request->born_at,
            'died_at'=> $request->died_at,
            'cause_of_death'=> $request->cause_of_death,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('memes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meme = Meme::findOrFail($id);
        $meme ->delete();
        return redirect()->route('memes.index');
    }

    public function export()
    {
        return Excel::download(new MemesExport, 'rip-memes.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new MemesImport, $request->file('file'));
        return redirect()->route('memes.index');
    }
}
