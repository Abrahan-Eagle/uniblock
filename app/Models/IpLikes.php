<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpLikes extends Model
{
    use HasFactory;

    protected $table = 'ip_likes';


    protected $fillable = [
      'like_id', 'REMOTE_ADDR_like', 'REMOTE_ADDR_dislike',
    ];

    public function like(){
        return $this->belongsTo(Likes::class);
    }
}
