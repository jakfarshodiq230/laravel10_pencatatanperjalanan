<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maingroup extends Model
{
    use HasFactory;
    protected $table = 'maingroup';
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
}
