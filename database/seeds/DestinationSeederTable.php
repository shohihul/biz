<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DestinationSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destination = [];
        $destination[] = [
            'name' => 'Gunung Bromo',
            'description' => 'Destinasi ini ada di Provinsi Jawa Timur',
            'thumbnail' => 'bromo.jpg',
        ];
        $destination[] = [
            'name' => 'Candi Borobudur',
            'description' => 'Destinasi ini ada di Provinsi DIY Yogyakarta',
            'thumbnail' => 'borobudur.jpg',
        ];
        $destination[] = [
            'name' => 'Pantai Papuma',
            'description' => 'Destinasi ini ada di Kabupaten Jember',
            'thumbnail' => 'papuma.jpg',
        ];

        foreach ($destination as $row) {
            DB::table('destinations')->insert([
                'name' => $row['name'],
                'description' => $row['description'],
                'thumbnail' => $row['thumbnail']
            ]);
        }
    }
}
