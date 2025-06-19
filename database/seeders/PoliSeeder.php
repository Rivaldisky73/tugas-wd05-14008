<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            [
                'nama_poli' => 'Umum',
                'keterangan' => 'Pelayanan kesehatan umum untuk berbagai keluhan'
            ],
            [
                'nama_poli' => 'Anak',
                'keterangan' => 'Pelayanan kesehatan khusus untuk anak-anak'
            ],
            [
                'nama_poli' => 'Kandungan',
                'keterangan' => 'Pelayanan kesehatan untuk ibu hamil dan kandungan'
            ],
            [
                'nama_poli' => 'Mata',
                'keterangan' => 'Pelayanan kesehatan mata dan penglihatan'
            ],
            [
                'nama_poli' => 'Gigi',
                'keterangan' => 'Pelayanan kesehatan gigi dan mulut'
            ],
            [
                'nama_poli' => 'THT',
                'keterangan' => 'Pelayanan kesehatan telinga, hidung, dan tenggorokan'
            ]
        ];

        foreach ($polis as $poli) {
            Poli::create($poli);
        }
    }
}