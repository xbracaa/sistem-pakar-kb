<?php

namespace Database\Seeders;

use App\Models\Kondisi;
use Illuminate\Database\Seeder;

class KondisiSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ["id" => "K01", "nama_kondisi" => "Hipertensi (Umum)"],
            ["id" => "K02", "nama_kondisi" => "Riwayat Penyakit Jantung"],
            ["id" => "K03", "nama_kondisi" => "Sedang menyusui (Umum)"],
            ["id" => "K04", "nama_kondisi" => "Ingin menunda kehamilan"],
            ["id" => "K05", "nama_kondisi" => "Sehat / Fisik normal (tanpa komplikasi penyerta)"],
            ["id" => "K06", "nama_kondisi" => "Siklus haid teratur"],
            ["id" => "K07", "nama_kondisi" => "Tekanan darah normal"],
            ["id" => "K08", "nama_kondisi" => "Obesitas"],
            ["id" => "K09", "nama_kondisi" => "Hipertensi Ringan (Sistolik 140-159 atau Diastolik 90-99 mmHg)"],
            ["id" => "K10", "nama_kondisi" => "Terdapat benjolan payudara jinak (non-kanker)"],
            ["id" => "K11", "nama_kondisi" => "Terdapat kanker payudara aktif"],
            ["id" => "K12", "nama_kondisi" => "Memiliki anak lebih dari 3"],
            ["id" => "K13", "nama_kondisi" => "Ingin jarak kehamilan panjang"],
            ["id" => "K14", "nama_kondisi" => "Baru menikah"],
            ["id" => "K15", "nama_kondisi" => "Ingin jarak kehamilan pendek"],
            ["id" => "K16", "nama_kondisi" => "Menderita Diabetes < 20 tahun"],
            ["id" => "K17", "nama_kondisi" => "Tanpa komplikasi (ginjal/mata/saraf)"],
            ["id" => "K18", "nama_kondisi" => "Butuh perlindungan jangka panjang (5-10 tahun)"],
            ["id" => "K19", "nama_kondisi" => "Tidak memiliki riwayat tumor"],
            ["id" => "K20", "nama_kondisi" => "Butuh perlindungan menengah (3 tahun)"],
            ["id" => "K21", "nama_kondisi" => "Takut pada efek samping hormonal"],
            ["id" => "K22", "nama_kondisi" => "Butuh efektivitas perlindungan tinggi"],
            ["id" => "K23", "nama_kondisi" => "Memiliki kedisiplinan tinggi (rutin minum obat)"],
            ["id" => "K24", "nama_kondisi" => "Ingin metode yang mudah dihentikan"],
            ["id" => "K25", "nama_kondisi" => "Data anamnesa medis pasien tidak lengkap"],
            ["id" => "K26", "nama_kondisi" => "Punya komorbiditas/penyakit kronis berat"],
            ["id" => "K27", "nama_kondisi" => "Pasca persalinan < 21 hari"],
            ["id" => "K28", "nama_kondisi" => "Menyusui secara eksklusif"],
            ["id" => "K29", "nama_kondisi" => "Pasca persalinan >= 4 minggu"],
            ["id" => "K30", "nama_kondisi" => "Usia >= 35 tahun"],
            ["id" => "K31", "nama_kondisi" => "Merokok >= 15 batang/hari"],
            ["id" => "K32", "nama_kondisi" => "Hipertensi berat (Sistolik >= 160 atau Diastolik >= 100 mmHg)"],
            ["id" => "K33", "nama_kondisi" => "Riwayat Penyakit Jantung Iskemik"],
            ["id" => "K34", "nama_kondisi" => "Riwayat Stroke"],
            ["id" => "K35", "nama_kondisi" => "Migrain dengan aura (gangguan saraf tepi/visual)"],
            ["id" => "K36", "nama_kondisi" => "Migrain tanpa aura"],
            ["id" => "K37", "nama_kondisi" => "Pendarahan vagina tidak wajar (belum dievaluasi)"],
            ["id" => "K38", "nama_kondisi" => "Kanker Serviks (menunggu pengobatan bedah/radiasi)"],
            ["id" => "K39", "nama_kondisi" => "Anemia (Defisiensi Besi) / Riwayat Anemia"],
            ["id" => "K40", "nama_kondisi" => "Sedang menderita / Riwayat Trombosis Vena Dalam (DVT) / Emboli Paru"],
            ["id" => "K41", "nama_kondisi" => "Menderita Diabetes > 20 tahun"],
            ["id" => "K42", "nama_kondisi" => "Terdapat komplikasi diabetes (Nefropati/Retinopati/Neuropati)"],
            ["id" => "K43", "nama_kondisi" => "Sirosis Hati Dekompensata (Berat)"],
            ["id" => "K44", "nama_kondisi" => "Tumor / Kanker Hati"],
            ["id" => "K45", "nama_kondisi" => "Lupus (SLE) dengan antibodi antifosfolipid positif"],
            ["id" => "K46", "nama_kondisi" => "Penyakit Radang Panggul (PID) aktif / Servisitis"],
            ["id" => "K47", "nama_kondisi" => "Konsumsi rutin obat Anti-kejang / Epilepsi (Karbamazepin, dll)"],
            ["id" => "K48", "nama_kondisi" => "Multi-risiko Kardiovaskular (Tua + Merokok + Hipertensi)"],
            ["id" => "K49", "nama_kondisi" => "Pasca Keguguran (Trimester 1 atau 2) tanpa komplikasi infeksi"],
            ["id" => "K50", "nama_kondisi" => "Terinfeksi HIV klinis stabil & terapi ARV rutin"],
            ["id" => "K51", "nama_kondisi" => "Kanker Payudara dengan masa remisi > 5 tahun (tanpa kekambuhan)"],
            ["id" => "K52", "nama_kondisi" => "Sedang mengonsumsi obat TBC (Rifampisin)"],
            ["id" => "K53", "nama_kondisi" => "Memiliki Penyakit Kandung Empedu (aktif diobati)"],
            ["id" => "K54", "nama_kondisi" => "Merokok aktif (Umum)"],
            ["id" => "K55", "nama_kondisi" => "Usia < 35 tahun"],
            ["id" => "K56", "nama_kondisi" => "Baru mengalami keguguran / Aborsi (< 7 hari)"]
        ];
            
        foreach ($data as $item) {
            Kondisi::create($item);
        }
    }
}   