<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\pegawai;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'dzaky',
            'email' => 'dzaky@gmail.com',
            'password' => bcrypt('dzaky')
        ]);

        pegawai::create([
            'nip' => '1029381203',
            'nama' => 'Luki',
            'foto' => '1',
            'nik' => '14014108742190',
            'scan_kk' => '1',
            'scan_ktp' => '1',
            'foto' => '1',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '1999-09-01',
            'jenis_kelamin' => 'Laki - Laki',
            'golongan_darah' => 'O',
            'alamat' => 'Pekanbaru',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Mahasiswa',
            'no_hp' => '08231298104',
            'kewarganegaraan' => 'WNI'
        ]);
        pegawai::create([
            'nip' => '09123908912',
            'nama' => 'Dzaky',
            'foto' => '2',
            'nik' => '109823012',
            'scan_kk' => '2',
            'scan_ktp' => '2',
            'foto' => '2',
            'tempat_lahir' => 'Pekanbaru',
            'tgl_lahir' => '2000-10-09',
            'jenis_kelamin' => 'Laki - Laki',
            'golongan_darah' => 'O',
            'alamat' => 'Pekanbaru',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Mahasiswa',
            'no_hp' => '0832191023',
            'kewarganegaraan' => 'WNI'
        ]);
        pegawai::create([
            'nip' => '90238102938',
            'nama' => 'Rislan',
            'foto' => '3',
            'nik' => '0192832737',
            'scan_kk' => '3',
            'scan_ktp' => '3',
            'foto' => '3',
            'tempat_lahir' => 'Taluk',
            'tgl_lahir' => '2004-05-08',
            'jenis_kelamin' => 'Laki - Laki',
            'golongan_darah' => 'O',
            'alamat' => 'Pekanbaru',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Mahasiswa',
            'no_hp' => '08128037123',
            'kewarganegaraan' => 'WNI'
        ]);
        pegawai::create([
            'nip' => '09123901273',
            'nama' => 'Andi',
            'foto' => '4',
            'nik' => '140192190238',
            'scan_kk' => '4',
            'scan_ktp' => '4',
            'foto' => '4',
            'tempat_lahir' => 'Jakarta',
            'tgl_lahir' => '1998-07-21',
            'jenis_kelamin' => 'Laki - Laki',
            'golongan_darah' => 'A',
            'alamat' => 'Pekanbaru',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Mahasiswa',
            'no_hp' => '08231298104',
            'kewarganegaraan' => 'WNI'
        ]);
        pegawai::create([
            'nip' => '091239172309',
            'nama' => 'Anto',
            'foto' => '5',
            'nik' => '14011240824',
            'scan_kk' => '5',
            'scan_ktp' => '5',
            'foto' => '5',
            'tempat_lahir' => 'Surabaya',
            'tgl_lahir' => '1999-03-29',
            'jenis_kelamin' => 'Laki - Laki',
            'golongan_darah' => 'O',
            'alamat' => 'Jakarta',
            'agama' => 'Islam',
            'status_perkawinan' => 'Belum Kawin',
            'pekerjaan' => 'Mahasiswa',
            'no_hp' => '08231298104',
            'kewarganegaraan' => 'WNI'
        ]);
    }
}
