<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visa extends Model
{
    use HasFactory;
    protected $table = 'visa';
    // protected $primarykey = 'id';
    // public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        // 'id',
        'negara_id',
        'passport_id',
        'scan_exitpermit',
        'scan_vaksin',
        'scan_visa',
        'id_kegiatan',
        'tim_kegiatan_visa',
    ];

    public function passport()
    {
        return $this->hasOne(passport::class, 'passport_id', 'no_passport');
    }

    public function personil()
    {
        return $this->hasOne(personil::class, 'passport_id', 'no_passport');
    }

    public function negara()
    {
        return $this->hasOne(negara::class, 'negara_id', 'id_negara');
    }

    public function maingroup()
    {
        return $this->hasOne(visa::class, 'passport_id', 'passport_id');
    }
}
