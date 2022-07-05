<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id', 'id_kategori');
    }
}
