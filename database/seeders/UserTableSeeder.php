<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(1,15) as $index) {
            DB::table('users')->insert([
                'jurusanId'     =>  Jurusan::all()->random()->id,
                'usernameLogin'       =>  $faker->userName(),
                'namaAlumni'    =>  $faker->name(),
                'password'    =>  bcrypt("password"),
                'email'     =>  $faker->email(),
                'jenisKelamin' =>  $faker->randomElement(['L','P']),
                'tahunMasuk'   =>  '2013',
                'tahunLulus'   =>  '2016',
                'tanggalLahir'   =>  $faker->dateTimeThisCentury->format('Y-m-d'),
                'tempatLahir'   =>  $faker->city,
                'telephone'     =>  $faker->phoneNumber,
                'alamat'    =>  $faker->streetAddress,
                'isPengangguran'    =>  $faker->randomElement(['iya','tidak']),
                'isAktif'    =>  $faker->randomElement(['aktif','nonaktif']),
                // 'hakAkses' =>  $faker->randomElement(['operator','alumni','mitra']),
            ]);
        }
    }
}
