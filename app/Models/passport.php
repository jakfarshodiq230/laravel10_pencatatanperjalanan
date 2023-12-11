<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class passport extends Model
{
    use HasFactory;
    protected $table = 'passport';
    protected $primarykey = 'no_passport';
    // public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'scan_passport',
        'pegawai_nip',
        'no_passport',
        'tgl_pembuatan',
        'tgl_berlaku',
    ];

    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'pegawai_nip', 'nip');
    }

    public function kegiatan()
    {
        return $this->belongsToMany(kegiatan::class, 'pegawai_nip');
    }

    public function visa()
    {
        return $this->belongsTo(visa::class,'no_passport','passport_id');
    }
}
