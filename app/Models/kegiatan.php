<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    public $timestamps = false;
    public $fillable = [
        'nama_perjalanan',
        'negara_id',
        'kota_tujuan',
        'tgl_keberangkatan',
        'tgl_pulang'
    ];

    public function personil()
    {
        return $this->hasMany(personil::class);
    }
    
    public function maingroup()
    {
        return $this->hasMany(maingroup::class);
    }

    public function Negara()
    {
        return $this->belongsTo(negara::class, 'negara_id', 'id_negara' );
    }


}
