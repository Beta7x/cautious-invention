<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'nama', 'nim', 'email', 'jenis_kelamin', 'jurusan', 'semester'
    ];

    public function alternatifKriterias()
    {
        return $this->hasMany(AlternatifKriteria::class);
    }
}
