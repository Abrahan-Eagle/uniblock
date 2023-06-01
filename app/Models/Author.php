<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';


    protected $fillable = [
        'name', 'slug', 'content', 'img', 'statusx', 
    ];


    public function post(){
        return $this->belongsTo(Post::class);
    }

    
}
