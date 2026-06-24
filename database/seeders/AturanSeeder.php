<?php

namespace Database\Seeders;

use App\Models\Aturan;
use Illuminate\Database\Seeder;

class AturanSeeder extends Seeder
{
    /**
     * Seed aturan (rules) pakar berdasarkan panduan WHO MEC.
     * Format premis: "K01 AND K02" atau "K01 OR K02" atau "K01" (single)
     * CF Pakar: 0.0 - 1.0 (positif/rekomendasi), -1.0 (dilarang mutlak / MEC 4)
     */
    public function run(): void
    {
        $data = [
            // =====================================================================
            // REKOMENDASI POSITIF (MEC 1-2) — Aturan yang merekomendasikan metode
            // =====================================================================

            // --- Wanita Sehat / Normal ---
            ["id_aturan" => "R01", "premis" => "K05 AND K07", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R02", "premis" => "K05 AND K07", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R03", "premis" => "K05 AND K06", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.90],
            ["id_aturan" => "R04", "premis" => "K05 AND K06", "konklusi" => "M04", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R05", "premis" => "K05 AND K07 AND K06", "konklusi" => "M09", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R06", "premis" => "K05 AND K07 AND K06", "konklusi" => "M10", "kategori_mec" => "1", "cf_pakar" => 0.80],

            // --- Menyusui & Pasca Persalinan ---
            ["id_aturan" => "R07", "premis" => "K03 AND K29", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.90],
            ["id_aturan" => "R08", "premis" => "K03 AND K29", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R09", "premis" => "K03 AND K29", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R10", "premis" => "K03 AND K29", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.86],
            ["id_aturan" => "R11", "premis" => "K28 AND K29", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R12", "premis" => "K28 AND K29", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.92],

            // --- Jarak Kehamilan Panjang & Perlindungan Jangka Panjang ---
            ["id_aturan" => "R13", "premis" => "K13 AND K18", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.92],
            ["id_aturan" => "R14", "premis" => "K13 AND K18", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.90],
            ["id_aturan" => "R15", "premis" => "K13 AND K18", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R16", "premis" => "K04 AND K20", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R17", "premis" => "K04 AND K20", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.85],

            // --- Anak Banyak & Efektivitas Tinggi ---
            ["id_aturan" => "R18", "premis" => "K12 AND K22", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.92],
            ["id_aturan" => "R19", "premis" => "K12 AND K22", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.90],
            ["id_aturan" => "R20", "premis" => "K12 AND K22", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.88],

            // --- Baru Menikah ---
            ["id_aturan" => "R21", "premis" => "K14 AND K15", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R22", "premis" => "K14 AND K24", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R23", "premis" => "K14 AND K24", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.80],

            // --- Disiplin Tinggi ---
            ["id_aturan" => "R24", "premis" => "K05 AND K23", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.88],
            ["id_aturan" => "R25", "premis" => "K05 AND K23", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.85],

            // --- Takut Hormonal ---
            ["id_aturan" => "R26", "premis" => "K21 AND K22", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.92],
            ["id_aturan" => "R27", "premis" => "K21", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.78],

            // --- Diabetes <20 Tahun Tanpa Komplikasi ---
            ["id_aturan" => "R28", "premis" => "K16 AND K17", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R29", "premis" => "K16 AND K17", "konklusi" => "M06", "kategori_mec" => "2", "cf_pakar" => 0.78],
            ["id_aturan" => "R30", "premis" => "K16 AND K17", "konklusi" => "M03", "kategori_mec" => "2", "cf_pakar" => 0.75],
            ["id_aturan" => "R31", "premis" => "K16 AND K17", "konklusi" => "M07", "kategori_mec" => "2", "cf_pakar" => 0.78],

            // --- Hipertensi Ringan ---
            ["id_aturan" => "R32", "premis" => "K09", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R33", "premis" => "K09", "konklusi" => "M03", "kategori_mec" => "2", "cf_pakar" => 0.72],
            ["id_aturan" => "R34", "premis" => "K09", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.75],
            ["id_aturan" => "R35", "premis" => "K09", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R36", "premis" => "K09", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.70],

            // --- Obesitas ---
            ["id_aturan" => "R37", "premis" => "K08", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R38", "premis" => "K08", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R39", "premis" => "K08", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.78],

            // --- Anemia ---
            ["id_aturan" => "R40", "premis" => "K39", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R41", "premis" => "K39", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R42", "premis" => "K39", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.75],

            // --- Pasca Keguguran ---
            ["id_aturan" => "R43", "premis" => "K49", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R44", "premis" => "K49", "konklusi" => "M05", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R45", "premis" => "K49", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.80],

            // --- HIV Stabil ---
            ["id_aturan" => "R46", "premis" => "K50", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.92],
            ["id_aturan" => "R47", "premis" => "K50", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.80],
            ["id_aturan" => "R48", "premis" => "K50", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.75],

            // --- Migrain Tanpa Aura ---
            ["id_aturan" => "R49", "premis" => "K36", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R50", "premis" => "K36", "konklusi" => "M03", "kategori_mec" => "2", "cf_pakar" => 0.72],
            ["id_aturan" => "R51", "premis" => "K36", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.80],

            // --- Benjolan Payudara Jinak ---
            ["id_aturan" => "R52", "premis" => "K10", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R53", "premis" => "K10", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.75],

            // --- Data Tidak Lengkap ---
            ["id_aturan" => "R54", "premis" => "K25", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R55", "premis" => "K25", "konklusi" => "M11", "kategori_mec" => "1", "cf_pakar" => 0.90],

            // --- Kanker Payudara Remisi >5 Tahun ---
            ["id_aturan" => "R56", "premis" => "K51", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R57", "premis" => "K51", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.78],

            // --- TBC / Rifampisin ---
            ["id_aturan" => "R58", "premis" => "K52", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R59", "premis" => "K52", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.80],
            ["id_aturan" => "R60", "premis" => "K52", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.78],

            // --- Epilepsi (Obat Anti-kejang) ---
            ["id_aturan" => "R61", "premis" => "K47", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R62", "premis" => "K47", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R63", "premis" => "K47", "konklusi" => "M02", "kategori_mec" => "1", "cf_pakar" => 0.82],

            // --- Penyakit Kandung Empedu ---
            ["id_aturan" => "R64", "premis" => "K53", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R65", "premis" => "K53", "konklusi" => "M03", "kategori_mec" => "2", "cf_pakar" => 0.72],

            // --- Merokok <35 tahun ---
            ["id_aturan" => "R66", "premis" => "K55 AND K54", "konklusi" => "M05", "kategori_mec" => "2", "cf_pakar" => 0.65],
            ["id_aturan" => "R67", "premis" => "K55 AND K54", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R68", "premis" => "K55 AND K54", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.82],

            // --- Pasca Persalinan <21 hari ---
            ["id_aturan" => "R69", "premis" => "K27", "konklusi" => "M06", "kategori_mec" => "1", "cf_pakar" => 0.82],
            ["id_aturan" => "R70", "premis" => "K27", "konklusi" => "M03", "kategori_mec" => "1", "cf_pakar" => 0.78],
            ["id_aturan" => "R71", "premis" => "K27", "konklusi" => "M07", "kategori_mec" => "1", "cf_pakar" => 0.80],
            ["id_aturan" => "R72", "premis" => "K27", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.75],

            // --- Keguguran Baru (<7 hari) ---
            ["id_aturan" => "R73", "premis" => "K56", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R74", "premis" => "K56", "konklusi" => "M11", "kategori_mec" => "1", "cf_pakar" => 0.80],

            // --- Komorbiditas Berat (Umum) ---
            ["id_aturan" => "R75", "premis" => "K26", "konklusi" => "M08", "kategori_mec" => "1", "cf_pakar" => 0.85],
            ["id_aturan" => "R76", "premis" => "K26", "konklusi" => "M01", "kategori_mec" => "1", "cf_pakar" => 0.72],


            // =====================================================================
            // LARANGAN MUTLAK (MEC 4) — CF = -1.0 (Dilarang)
            // =====================================================================

            // --- Kanker Payudara Aktif → Semua metode hormonal dilarang ---
            ["id_aturan" => "R77", "premis" => "K11", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R78", "premis" => "K11", "konklusi" => "M06", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R79", "premis" => "K11", "konklusi" => "M02", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R80", "premis" => "K11", "konklusi" => "M03", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R81", "premis" => "K11", "konklusi" => "M07", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R82", "premis" => "K11", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R83", "premis" => "K11", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R84", "premis" => "K11", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Hipertensi Berat → CHC (kombinasi) dilarang ---
            ["id_aturan" => "R85", "premis" => "K32", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R86", "premis" => "K32", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R87", "premis" => "K32", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R88", "premis" => "K32", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Riwayat Penyakit Jantung Iskemik → CHC dilarang ---
            ["id_aturan" => "R89", "premis" => "K33", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R90", "premis" => "K33", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R91", "premis" => "K33", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R92", "premis" => "K33", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Riwayat Stroke → CHC dilarang ---
            ["id_aturan" => "R93", "premis" => "K34", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R94", "premis" => "K34", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R95", "premis" => "K34", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R96", "premis" => "K34", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Migrain dengan Aura → CHC dilarang ---
            ["id_aturan" => "R97", "premis" => "K35", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R98", "premis" => "K35", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "R99", "premis" => "K35", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA0", "premis" => "K35", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- DVT / Emboli Paru → CHC dilarang ---
            ["id_aturan" => "RA1", "premis" => "K40", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA2", "premis" => "K40", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA3", "premis" => "K40", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA4", "premis" => "K40", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Sirosis Hati Berat → CHC dilarang ---
            ["id_aturan" => "RA5", "premis" => "K43", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA6", "premis" => "K43", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Tumor / Kanker Hati → CHC dilarang ---
            ["id_aturan" => "RA7", "premis" => "K44", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RA8", "premis" => "K44", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Lupus dengan Antibodi Antifosfolipid → CHC dilarang ---
            ["id_aturan" => "RA9", "premis" => "K45", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB0", "premis" => "K45", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB1", "premis" => "K45", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB2", "premis" => "K45", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Usia >=35 + Merokok Berat → CHC dilarang ---
            ["id_aturan" => "RB3", "premis" => "K30 AND K31", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB4", "premis" => "K30 AND K31", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB5", "premis" => "K30 AND K31", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB6", "premis" => "K30 AND K31", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Multi-risiko Kardiovaskular → CHC dilarang ---
            ["id_aturan" => "RB7", "premis" => "K48", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB8", "premis" => "K48", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RB9", "premis" => "K48", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC0", "premis" => "K48", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Diabetes >20 tahun + Komplikasi → CHC dilarang ---
            ["id_aturan" => "RC1", "premis" => "K41 AND K42", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC2", "premis" => "K41 AND K42", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Pasca Persalinan <21 hari → CHC dilarang ---
            ["id_aturan" => "RC3", "premis" => "K27", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC4", "premis" => "K27", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC5", "premis" => "K27", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC6", "premis" => "K27", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- PID Aktif → IUD dilarang ---
            ["id_aturan" => "RC7", "premis" => "K46", "konklusi" => "M01", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RC8", "premis" => "K46", "konklusi" => "M02", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Pendarahan Vagina Tidak Wajar → IUD perlu hati-hati ---
            ["id_aturan" => "RC9", "premis" => "K37", "konklusi" => "M01", "kategori_mec" => "3", "cf_pakar" => -0.70],
            ["id_aturan" => "RD0", "premis" => "K37", "konklusi" => "M02", "kategori_mec" => "3", "cf_pakar" => -0.70],

            // --- Kanker Serviks → IUD perlu hati-hati ---
            ["id_aturan" => "RD1", "premis" => "K38", "konklusi" => "M01", "kategori_mec" => "3", "cf_pakar" => -0.60],
            ["id_aturan" => "RD2", "premis" => "K38", "konklusi" => "M02", "kategori_mec" => "3", "cf_pakar" => -0.60],

            // --- Menyusui → CHC dilarang (menekan produksi ASI) ---
            ["id_aturan" => "RD3", "premis" => "K03", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RD4", "premis" => "K03", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RD5", "premis" => "K03", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RD6", "premis" => "K03", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],

            // --- Hipertensi (Umum) → CHC perlu hati-hati ---
            ["id_aturan" => "RD7", "premis" => "K01", "konklusi" => "M05", "kategori_mec" => "3", "cf_pakar" => -0.60],
            ["id_aturan" => "RD8", "premis" => "K01", "konklusi" => "M04", "kategori_mec" => "3", "cf_pakar" => -0.60],

            // --- Riwayat Jantung (Umum) → CHC dilarang ---
            ["id_aturan" => "RD9", "premis" => "K02", "konklusi" => "M05", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RE0", "premis" => "K02", "konklusi" => "M04", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RE1", "premis" => "K02", "konklusi" => "M09", "kategori_mec" => "4", "cf_pakar" => -1.0],
            ["id_aturan" => "RE2", "premis" => "K02", "konklusi" => "M10", "kategori_mec" => "4", "cf_pakar" => -1.0],
        ];

        foreach ($data as $item) {
            Aturan::create($item);
        }
    }
}
