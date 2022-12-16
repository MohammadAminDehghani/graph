<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'body'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
