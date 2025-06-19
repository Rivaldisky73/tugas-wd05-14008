<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'tanggal_lahir',
    'pasien_id', 'dokter_id', 'tanggal_periksa', 'jam_periksa',
    'keluhan', 'diagnosa', 'biaya_periksa'
    ];

    public function detailPeriksas()
    {
        return $this->hasMany(DetailPeriksa::class);
    }


    /**
     * Get all examinations for this patient
     */
    public function periksas()
    {
        return $this->hasMany(Periksa::class);
    }
    public function dokter()
{
    return $this->belongsTo(Dokter::class);
}


    /**
     * Get the patient's age
     */
    public function getUmurAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_lahir)->age;
    }
}
