<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class personil extends Model
{
    use HasFactory;
    protected $table = 'personil';
    protected $fillable = [
        'passport_id',
        'kegiatan_id',
        'negara_id',
        'id_kegiatan',
        'tim_kegiatan',
    ];

    public function passport()
    {
        return $this->belongsTo(passport::class, 'passport_id', 'no_passport');
    }

    public function kegiatan()
    {
        return $this->belongsTo(kegiatan::class, 'kegiatan_id');
    }

    public function negara()
    {
        return $this->belongsToMany(negara::class, 'negara_id', 'id_negara');
    }


}
