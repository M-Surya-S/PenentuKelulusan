<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaBobot extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bobot';
    protected $guarded = ['id'];

    public function sub_kriteria()
    {
        return $this->hasMany(SubKriteria::class, 'id_kriteria', 'id');
    }

    public function skor_alternatif()
    {
        return $this->hasMany(SkorAlternatif::class, 'id_kriteria', 'id');
    }
}
