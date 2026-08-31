<?php

namespace App\Exports;

use App\Models\Meme;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class MemesExport implements FromCollection
{
    public function collection(): Collection
    {
        return Meme::all();
    }
}
