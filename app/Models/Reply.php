<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'reply';


    protected $fillable = [
      'comment_id', 'name', 'cell', 'email', 'website',  'comment', 'img', 'statusx',
    ];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }


}
