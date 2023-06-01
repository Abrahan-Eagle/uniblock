<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';


    protected $fillable = [
        'user_id', 'level', 'category_id', 'author_id', 'sponsor_id', 'title', 'slug', 'excerpt', 'content', 'statusx', 'img', 'url_video', 'cities_id', 'direccion', 'date_activi', 'last_activity', 'activity', 
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
       return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Likes::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function sponsors(){
        return $this->belongsToMany(Sponsor::class);
    }

    
}
