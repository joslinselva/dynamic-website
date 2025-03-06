<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Add fillable property

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class); // Or User::class
    }
}