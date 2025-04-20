<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;

class Periksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 'dokter_id', 'tanggal_periksa',
        'jam_periksa', 'keluhan', 'diagnosa', 'biaya_periksa'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }


    public function detailPeriksas()
    {
        return $this->hasMany(DetailPeriksa::class);
    }

    public function obats()
    {
        return $this->belongsToMany(Obat::class, 'detail_periksas')
            ->withPivot('jumlah')
            ->withTimestamps();
    }
}
