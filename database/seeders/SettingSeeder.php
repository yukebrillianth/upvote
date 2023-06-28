<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'name' => 'organization_name',
                'label' => 'Nama Organisasi/Instansi',
                'rules' => 'required|max:255|min:4',
                'placeholder' => 'SMA Negeri 1 Indonesia',
                'value' => 'SMA NEGERI 1 INDONESIA'
            ],
            [
                'name' => 'organization_slogan',
                'label' => 'Slogan/Motto',
                'rules' => 'required|max:255|min:4',
                'placeholder' => 'Berkarya, berakhlak, berprestasi',
                'value' => 'Berkarya, berakhlak, berprestasi'
            ],
            [
                'name' => 'logo',
                'label' => 'Logo Kegiatan/Organisasi/Instansi',
                'rules' => 'required|image',
                'placeholder' => '',
                'value' => 'https://disdikbud.banyuasinkab.go.id/wp-content/uploads/sites/269/2022/11/Logo-Tut-Wuri-Handayani-PNG-Warna.png'
            ],
            [
                'name' => 'voting_title',
                'label' => 'Nama Kegiatan/Voting',
                'rules' => 'required|max:255|min:4',
                'placeholder' => 'Pemilihan Ketua Osis',
                'value' => 'Pemilihan Ketua Osis'
            ],
            // [
            //     'name' => 'voting_description',
            //     'label' => 'Deskripsi Organisasi/Instansi',
            //     'rules' => 'string',
            //     'placeholder' => 'Pemilihan organisasi',
            //     'value' => 'Ga tau nulis apa'
            // ],
            [
                'name' => 'voting_period',
                'label' => 'Periode Jabatan',
                'rules' => 'string|max:255',
                'placeholder' => '',
                'value' => '2023-2024'
            ],
            [
                'name' => 'is_active',
                'label' => 'Status Kegiatan/Voting',
                'rules' => 'boolean',
                'placeholder' => '',
                'value' => 'true'
            ],
            [
                'name' => 'auto_attend',
                'label' => 'Otomatis Absen Hadir',
                'rules' => 'boolean',
                'placeholder' => '',
                'value' => 'false'
            ],
            [
                'name' => 'voting_start',
                'label' => 'Waktu mulai',
                'rules' => 'date_format:Y-m-d H:i:s|before:voting_end',
                'placeholder' => '',
                'value' => ''
            ],
            [
                'name' => 'voting_end',
                'label' => 'Otomatis Absen Hadir',
                'rules' => 'date_format:Y-m-d H:i:s|after:voting_start',
                'placeholder' => '',
                'value' => ''
            ]
        ]);
    }
}
