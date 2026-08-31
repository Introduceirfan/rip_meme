<?php

namespace App\Imports;

use App\Models\Meme;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class MemesImport implements ToModel, WithHeadingRow
{
    public function model(array $row): Model|null
    {
       return new Meme([
            'category_id' => $row['category_id'],
            'name' => $row['name'],
            'born_at' => Date::excelToDateTimeObject($row['born_at'])->format('Y-m-d'),
            'died_at' => $row['died_at'] ? Date::excelToDateTimeObject($row['died_at'])->format('Y-m-d') : null,
            'cause_of_death' => $row['cause_of_death'],
            'skor_viral' => $row['skor_viral'],
            'image_url' => $row['image_url'],
        ]);
    }
}
