<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';


    protected $fillable = [
      'user_id', 'post_id', 'reply_id', 'name', 'cell', 'email', 'website',  'comment', 'img', 'statusx',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function reply(){
      return $this->hasMany(Reply::class);
    }


}
