<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorAlternatif extends Model
{
    use HasFactory;

    protected $table = 'skor_alternatif';
    protected $guarded = ['id'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaBobot::class, 'id_kriteria', 'id');
    }

    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria', 'id');
    }
}
