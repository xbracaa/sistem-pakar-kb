<?php

namespace Database\Seeders;

use App\Models\MetodeKb;
use Illuminate\Database\Seeder;

class MetodeKbSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["id" => "M01", "nama_metode" => "IUD Tembaga (Cu-IUD)"],
            ["id" => "M02", "nama_metode" => "IUD Hormonal (LNG-IUD)"],
            ["id" => "M03", "nama_metode" => "Suntik Progestin 3 Bulan (DMPA)"],
            ["id" => "M04", "nama_metode" => "Suntik Kombinasi 1 Bulan"],
            ["id" => "M05", "nama_metode" => "Pil Kombinasi (CHC)"],
            ["id" => "M06", "nama_metode" => "Pil Progestin (POP / Minipil)"],
            ["id" => "M07", "nama_metode" => "Implan (AKBK)"],
            ["id" => "M08", "nama_metode" => "Kondom"],
            ["id" => "M09", "nama_metode" => "Koyo Kontrasepsi (Patch)"],
            ["id" => "M10", "nama_metode" => "Cincin Vagina (Vaginal Ring)"],
            ["id" => "M11", "nama_metode" => "Testpack (Skrining Kehamilan Tunda KB)"]
        ];

        foreach ($data as $item) {
            MetodeKb::create($item);
        }
    }
}