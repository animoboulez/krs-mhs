<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenawaranKrs extends Model
{
    protected $table = 'penawaran_krs';

    protected $fillable = [
        'hari','jam','ruang_kelas','kode_mk','nama_mk','sks'
    ];
}
