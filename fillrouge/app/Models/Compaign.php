<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    use HasFactory;
    
    protected $with = ['category', 'user'];




    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function soutiens()
    {
        return $this->hasMany(Soutien::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
