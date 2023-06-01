<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\IpLikes;
use App\Models\Likes;
use App\Models\Tag;
use App\Models\Reply;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class SermonsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {
        $searchs = $request->search;
        
        $posts = Post::orderBy('id', 'DESC')
        ->where('title', 'LIKE', "%$searchs%")
        ->where('level', 'sermon')    
        ->where('statusx', 'PUBLISHED')
        ->paginate(9);

        
        return view('front.sermon', compact('posts'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($slug){
        
        $category = Category::where('slug',$slug)->where('level', 'sermon')->pluck('id')->first();
        

        $posts = Post::orderBy('id', 'DESC')
                ->where('category_id', $category)
                ->where('level', 'sermon')
                ->where('statusx', 'PUBLISHED')
                ->paginate(9);
                
            
        return view('front.sermon', compact('posts'));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug){
        
        $post = Post::where('slug', $slug)->where('level', 'sermon')->first();
        $recentpost = Post::orderBy('id', 'DESC')->limit(4)->where('level', 'sermon')->get();
        $categories = Category::orderBy('id', 'DESC')->where('level', 'sermon')->get();
        $tags = Tag::orderBy('id', 'DESC')->where('level', 'sermon')->get();

        if (!Cookie::has($post->id) && !Auth::check()) {
            Cookie::queue($post->id, 'counter-views', 24 * 60);
            $post->views += 1;
            $post->save();
        }

        $author = Author::where('id', $post->author_id)->where('statusx', 1)
                          ->orderBy('id', 'DESC')->get();


        $comment = Comment::where('post_id', $post->id)->where('statusx', 'PUBLISHED')->orderBy('id', 'DESC')
                          ->with(['reply' => function ($q) {
                              $q->orderBy('created_at', 'desc');
                            }])->get();


        $like = Likes::where('post_id', $post->id)->get();

        $iplike = Iplikes::where('like_id', 2)->get();

        return view('front.sermon-details', compact('post', 'recentpost', 'categories', 'tags', 'comment', 'author', 'like' , 'iplike'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug){
        
        $category = Category::where('slug',$slug)->where('level', 'sermon')->pluck('id')->first();

        $posts    = Post::where('category_id', $category)
                        ->orderBy('id', 'DESC')
                        ->where('statusx', 'PUBLISHED')
                        ->where('level', 'sermon')
                        ->paginate(6);
            
        return view('front.sermon', compact('posts'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($slug){
        
        $posts = Post::where('level', 'sermon')->whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')
            ->where('statusx', 'PUBLISHED')
            ->where('level', 'sermon')
            ->paginate(6);
            
        return view('front.sermon', compact('posts'));
    }




     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $slug){


        $post = Post::where('slug', $slug)->pluck('id')->first();
        $like = Likes::where('post_id', $post)->first();
        $likex = Likes::where('post_id', $post)->get();
        $likey = Likes::where('post_id', $post)->pluck('id')->first();
        
        $iplike2 = IpLikes::where('like_id', $likey)->get();
        $iplike = IpLikes::where('like_id', $likey)->first();

        
        foreach ($likex as $value) {
           $like1 = $value->like;
           $like2 = $value->dislike;
        }
        foreach ($iplike2 as $value) {
            $ip1 = $value->REMOTE_ADDR_like;
            $ip2 = $value->REMOTE_ADDR_dislike;
        }

        if ($ip1 == 0 && $ip2 == 0) {
            
            if ($like2 >= 0) {
                $like->like +=1;
                $like->save();

                $iplike->REMOTE_ADDR_like = request()->ip();
                $iplike->save();
            }

            return back();
        }

        
        if ($ip2 == request()->ip()) {

            if ($like1 >= 0 || $like2 >= 0) {
                $like->like +=1;
                $like->dislike -=1;
                $like->save();
                
                $iplike->REMOTE_ADDR_dislike = 0;
                $iplike->REMOTE_ADDR_like = request()->ip();
                $iplike->save();
            }
            return back();
        }
        return back();

    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dislike($slug){

        $post = Post::where('slug', $slug)->pluck('id')->first();
        $like = Likes::where('post_id', $post)->first();
        $likex = Likes::where('post_id', $post)->get();
        $likey = Likes::where('post_id', $post)->pluck('id')->first();
        
        $iplike2 = IpLikes::where('like_id', $likey)->get();
        $iplike = IpLikes::where('like_id', $likey)->first();

        
        foreach ($likex as $value) {
           $like1 = $value->like;
           $like2 = $value->dislike;
        }
        foreach ($iplike2 as $value) {
            $ip1 = $value->REMOTE_ADDR_like;
            $ip2 = $value->REMOTE_ADDR_dislike;
        }

        if ($ip1 == 0 && $ip2 == 0) {
            
            if ($like1 >= 0) {
                $like->dislike +=1;
                $like->save();

                $iplike->REMOTE_ADDR_dislike = request()->ip();
                $iplike->save();
            }

            return back();
        }
    

        if ($ip1 == request()->ip()) {
        
            if ($like1 >= 0 || $like2 >= 0) {
                $like->like -=1;
                $like->dislike +=1;
                $like->save();
                
                $iplike->REMOTE_ADDR_like = 0;
                $iplike->REMOTE_ADDR_dislike = request()->ip();
                $iplike->save();
       
            }
            return back();
        }

        return back();

    }

    
}
