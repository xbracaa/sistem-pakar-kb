<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if (!Schema::hasColumn('metode_kbs', 'kelebihan')) {
    Schema::table('metode_kbs', function (Blueprint $table) {
        $table->text('kelebihan')->nullable();
        $table->text('kekurangan')->nullable();
    });
    echo "Columns added.\n";
}

$data = [
    ['id' => 'M01', 'kelebihan' => 'Sangat efektif untuk jangka panjang (hingga 10 tahun), tidak mengandung hormon, tidak mengganggu ASI.', 'kekurangan' => 'Memerlukan pemeriksaan panggul, dapat meningkatkan volume darah haid atau kram pada bulan-bulan pertama.'],
    ['id' => 'M02', 'kelebihan' => 'Efektif jangka panjang, mengurangi volume darah haid dan dismenore (nyeri haid).', 'kekurangan' => 'Pemasangan perlu tenaga terlatih, biayanya lebih mahal, efek samping hormonal lokal seperti bercak darah (spotting).'],
    ['id' => 'M03', 'kelebihan' => 'Suntikan cukup 3 bulan sekali, aman untuk ibu menyusui, mengurangi nyeri haid dan risiko kanker endometrium.', 'kekurangan' => 'Klien bergantung pada klinik untuk suntik ulang, terlambatnya kembali kesuburan (rata-rata 4 bulan), perubahan pola haid.'],
    ['id' => 'M04', 'kelebihan' => 'Mengurangi jumlah perdarahan, mencegah anemia, haid lebih teratur dibandingkan suntik 3 bulan.', 'kekurangan' => 'Harus disuntik setiap bulan, mual, pusing, sakit kepala ringan pada awal pemakaian, mengurangi produksi ASI.'],
    ['id' => 'M05', 'kelebihan' => 'Efektivitas tinggi jika diminum teratur, mengurangi risiko kista ovarium dan penyakit radang panggul.', 'kekurangan' => 'Membosankan karena harus diminum setiap hari, jika lupa risiko gagal tinggi, mengurangi ASI, tidak mencegah IMS.'],
    ['id' => 'M06', 'kelebihan' => 'Sangat aman untuk ibu menyusui (tidak menurunkan produksi ASI), kesuburan cepat kembali.', 'kekurangan' => 'Harus diminum pada jam yang persis sama setiap hari, rentan pendarahan tidak teratur.'],
    ['id' => 'M07', 'kelebihan' => 'Perlindungan jangka panjang (3-5 tahun), nyaman, kesuburan segera kembali setelah dicabut, aman masa laktasi.', 'kekurangan' => 'Memerlukan prosedur bedah minor oleh petugas terlatih untuk pasang/cabut, mahal, sering timbul perubahan pola haid (spotting).'],
    ['id' => 'M08', 'kelebihan' => 'Murah, dibeli bebas tanpa resep, memberikan proteksi ganda (mencegah kehamilan sekaligus mencegah penularan IMS/HIV).', 'kekurangan' => 'Efektivitas sangat bergantung pada cara pemakaian yang benar, dapat mengurangi sensasi sentuhan, risiko bocor/robek.'],
    ['id' => 'M09', 'kelebihan' => 'Mudah digunakan sendiri tanpa bantuan tenaga medis, siklus haid menjadi lebih teratur.', 'kekurangan' => 'Bisa menyebabkan iritasi kulit pada area tempelan, harus diganti tepat waktu secara berkala.'],
    ['id' => 'M10', 'kelebihan' => 'Digunakan secara mandiri setiap bulan, dosis hormon lebih rendah dibandingkan pil.', 'kekurangan' => 'Pasien harus merasa nyaman dan berani memasukkan serta melepas cincin sendiri ke dalam vagina.'],
    ['id' => 'M11', 'kelebihan' => 'Cepat, murah, dan akurat untuk mendeteksi status kehamilan sebelum metode KB diberikan.', 'kekurangan' => 'Bukan merupakan alat kontrasepsi, hanya sebagai alat penapisan (screening) wajib untuk keselamatan pasien.']
];

foreach ($data as $item) {
    \App\Models\MetodeKb::where('id', $item['id'])->update([
        'kelebihan' => $item['kelebihan'],
        'kekurangan' => $item['kekurangan']
    ]);
}
echo "Data updated.\n";
