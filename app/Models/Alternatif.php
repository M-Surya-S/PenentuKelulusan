<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $guarded = ['id'];

    public function skor_alternatif()
    {
        return $this->hasMany(SkorAlternatif::class, 'id_alternatif', 'id');
    }
}
