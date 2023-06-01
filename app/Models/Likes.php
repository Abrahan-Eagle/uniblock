<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;


    protected $table = 'likes';


    protected $fillable = [
      'post_id', 'like', 'dislike',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function iplikes(){
      return $this->hasMany(IpLikes::class);
    }

}



