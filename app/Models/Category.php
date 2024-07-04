<?php

namespace App\Models;

use App\Models\Story;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Sesuaikan dengan kolom-kolom lain yang ada pada tabel categories
    ];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}
