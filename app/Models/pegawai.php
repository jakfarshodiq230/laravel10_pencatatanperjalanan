<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primarykey = 'nip';
    // public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'nip',
        'nama',
        'nik',
        'scan_kk',
        'scan_ktp',
        'foto',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'alamat',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'no_hp',
        'kewarganegaraan'
    ];

    public function passport()
    {
        return $this->hasOne(passport::class, 'nip', 'pegawai_nip');
    }
}
