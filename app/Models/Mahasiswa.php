<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'npm';   // harus camelCase: primaryKey
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['npm', 'nama', 'prodi', 'angkatan'];
}
