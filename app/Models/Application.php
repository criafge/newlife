<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['title', 'description', 'phone', 'user_id', 'photo', 'category_id', 'district_id', 'status_id'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
