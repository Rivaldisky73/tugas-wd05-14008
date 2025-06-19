<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'spesialis', 
        'no_hp', 
        'alamat', 
        'id_poli',
        'user_id'
    ];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Periksa
     */
    public function periksas()
    {
        return $this->hasMany(Periksa::class, 'id_dokter');
    }

    /**
     * Relationship with Poli
     */
    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli');
    }

    /**
     * Accessor for formatted name with specialization and poli
     */
    public function getFullNameAttribute()
    {
        $poli = $this->poli ? ' - ' . $this->poli->nama_poli : '';
        return $this->nama . ' (' . $this->spesialis . ')' . $poli;
    }
}