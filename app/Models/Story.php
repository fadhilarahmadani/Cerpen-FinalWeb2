<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category_id', 'description', 'content','image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}