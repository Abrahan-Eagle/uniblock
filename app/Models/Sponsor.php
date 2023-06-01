<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'sponsor';


    protected $fillable = [
        'name', 'slug', 'content', 'img', 'statusx', 
    ];


    public function post(){
        return $this->belongsTo(Post::class);
    }
}
