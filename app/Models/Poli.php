<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'polis';

    protected $fillable = [
        'nama_poli',
        'keterangan'
    ];

    /**
     * Relationship with Dokter
     * One Poli has many Dokters
     */
    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_poli');
    }

    /**
     * Relationship with Periksa (through Dokter)
     * Get all examinations in this poli
     */
    public function periksas()
    {
        return $this->hasManyThrough(Periksa::class, Dokter::class, 'id_poli', 'id_dokter');
    }

    /**
     * Scope for active polis (if you have status field)
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Accessor for formatted poli name
     */
    public function getFormattedNameAttribute()
    {
        return 'Poli ' . $this->nama_poli;
    }
}