<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $jurusan = [
            [
                'namaJurusan' => "Multimedia",
            ],
            [
                'namaJurusan' => 'Rekayasa Perangkat Lunak',
            ],
            [
                'namaJurusan' => "Teknik Komputer dan Jaringan",
            ],
            [
                'namaJurusan' => "Akuntansi",
            ],
            [
                'namaJurusan' => "Administrasi dan Perkantoran",
            ],
            [
                'namaJurusan' => "Desain Komunikasi Visual",
            ],
            
        ];

        Jurusan::insert($jurusan);
    }
}
