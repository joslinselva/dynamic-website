<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id']; // Add fillable property

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class); // Or User::class
    }
}