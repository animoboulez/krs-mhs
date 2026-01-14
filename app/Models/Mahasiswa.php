<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['npm','nama','prodi','angkatan'];

    public function krsAmbil()
    {
        return $this->belongsToMany(PenawaranKrs::class, 'krs_mahasiswa', 'npm', 'penawaran_krs_id')
            ->withTimestamps();
    }
}
