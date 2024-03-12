<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    // $data = [
    //   [
    //     'nama' => 'udin',
    //     'alamat' => 'Jln Abc 123',
    //     'created_at' => Time::now(),
    //     'updated_at' => Time::now()
    //   ],
    //   [
    //     'nama' => 'budi',
    //     'alamat' => 'Jln Bca 231',
    //     'created_at' => Time::now(),
    //     'updated_at' => Time::now()
    //   ],
    //   [
    //     'nama' => 'tono',
    //     'alamat' => 'Jln Cab 312',
    //     'created_at' => Time::now(),
    //     'updated_at' => Time::now()
    //   ],
    // ];

    $faker = \Faker\Factory::create('id_ID');
    for ($i = 0; $i < 100; $i++) {
      $data = [
        'nama' => $faker->name,
        'alamat' =>  $faker->address,
        // diakalin, dengan unixtime yang berisi detik saja
        // dikonversi menjadi tanggal
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];
      $this->db->table('orang')->insert($data);
    }


    // Simple Queries
    // $this->db->query(
    //   "INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
    //   $data
    // );

    // Using Query Builder
    // hanya bisa satu data
    // $this->db->table('orang')->insert($data);
    // bisa lebih dari satu data bersamaan
    // $this->db->table('orang')->insertBatch($data);
  }
}
