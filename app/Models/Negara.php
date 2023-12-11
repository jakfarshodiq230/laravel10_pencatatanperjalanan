<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    use HasFactory;
    protected $table = 'negara';


    public function kegiatan()
    {
        return $this->hasOne(kegiatan::class, 'id_negara', 'negara_id');
    }

    public function visa()
    {
        return $this->belongsTo(visa::class, 'id_negara', 'negara_id');
    }

    public function personil()
    {
        return $this->hasMany(personil::class, 'id_negara', 'negara_id');
    }
}


