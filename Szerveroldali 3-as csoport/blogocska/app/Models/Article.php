<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
    public function author(){
        return $this -> belongsTo(User::class, 'author_id');
    }

    public function categories(){
        return $this -> belongsToMany(Category::class);
    }
}
