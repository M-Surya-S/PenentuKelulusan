<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $guarded = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(KriteriaBobot::class, 'id_kriteria', 'id');
    }

    public function skor_alternatif()
    {
        return $this->hasMany(SkorAlternatif::class, 'id_sub_kriteria', 'id');
    }
}
