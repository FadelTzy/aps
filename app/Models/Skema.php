<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skema extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function unit()
    {
        return $this->hasOne(UnitKompetensi::class, 'id_skema', 'id');
    }
}
