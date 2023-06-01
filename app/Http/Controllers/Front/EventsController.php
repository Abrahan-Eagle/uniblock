<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Events;

use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\IpLikes;
use App\Models\Likes;
use App\Models\Tag;
use App\Models\Reply;
use App\Models\Newsletter;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(Request $request)
    {
        $searchs = $request->search;
        /*
        $posts = Post::orderBy('id', 'DESC')
        ->where('title', 'LIKE', "%$searchs%")
        ->where('level', 'event')    
        ->where('statusx', 'PUBLISHED')
        ->paginate(6);
*/

        $posts = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->join('countries', 'states.countries_id', '=', 'countries.id')
        ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
        ->orderBy('posts.date_activi', 'DESC')
        ->where('posts.title', 'LIKE', "%$searchs%")
        ->where('posts.statusx', 'PUBLISHED')
        ->where('posts.level', 'event')
        ->paginate(6);

        
        return view('front.event', compact('posts'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories($slug){
        
        $category = Category::where('slug',$slug)->where('level', 'event')->pluck('id')->first();
      /*  

        $posts = Post::orderBy('id', 'DESC')
                ->where('category_id', $category)
                ->where('level', 'event')
                ->where('statusx', 'PUBLISHED')
                ->paginate(6);
        */
                $posts = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
                ->join('states', 'cities.state_id', '=', 'states.id')
                ->join('countries', 'states.countries_id', '=', 'countries.id')
                ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
                ->orderBy('posts.date_activi', 'DESC')
                ->where('posts.category_id', $category)
                ->where('posts.statusx', 'PUBLISHED')
                ->where('posts.level', 'event')
                ->paginate(6);
        
            
        return view('front.event', compact('posts'));
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug){
        
        //$post = Post::where('slug', $slug)->where('level', 'event')->first();
        $post = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->join('countries', 'states.countries_id', '=', 'countries.id')
        ->select('posts.*','posts.id AS ids', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
        ->where('posts.slug', $slug)
        ->where('posts.statusx', 'PUBLISHED')
        ->where('posts.level', 'event')
        ->first();
        
        
        //$recentpost = Post::orderBy('id', 'DESC')->limit(4)->where('level', 'event')->get();
        $recentpost = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->join('countries', 'states.countries_id', '=', 'countries.id')
        ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
        ->orderBy('posts.date_activi', 'DESC')
        ->where('posts.statusx', 'PUBLISHED')
        ->where('posts.level', 'event')
        ->paginate(4);

        $categories = Category::orderBy('id', 'DESC')->where('level', 'event')->get();
        $tags = Tag::orderBy('id', 'DESC')->where('level', 'event')->get();

        if (!Cookie::has($post->ids) && !Auth::check()) {
            Cookie::queue($post->ids, 'counter-views', 24 * 60);
            $post->views += 1;
            $post->save();
        }

        $sponsor = Sponsor::where('id', $post->sponsor_id)->where('statusx', 1)
                          ->orderBy('id', 'DESC')->get();

                          
        $comment = Comment::where('post_id', $post->ids)->where('statusx', 'PUBLISHED')->orderBy('id', 'DESC')
                          ->with(['reply' => function ($q) {
                              $q->orderBy('created_at', 'desc');
                            }])->get();


        $like = Likes::where('post_id', $post->ids)->get();

        $iplike = Iplikes::where('like_id', 2)->get();

        return view('front.event-details', compact('post', 'recentpost', 'categories', 'tags', 'comment', 'sponsor', 'like' , 'iplike'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($slug){
        
        $category = Category::where('slug',$slug)->where('level', 'event')->pluck('id')->first();

        /*
        $posts    = Post::where('category_id', $category)
                        ->orderBy('id', 'DESC')
                        ->where('statusx', 'PUBLISHED')
                        ->where('level', 'event')
                        ->paginate(6);
                        */

                        $posts = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
                        ->join('states', 'cities.state_id', '=', 'states.id')
                        ->join('countries', 'states.countries_id', '=', 'countries.id')
                        ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
                        ->orderBy('posts.date_activi', 'DESC')
                        ->where('posts.category_id', $category)
                        ->where('posts.statusx', 'PUBLISHED')
                        ->where('posts.level', 'event')
                        ->paginate(6);
            
        return view('front.event', compact('posts'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tag($slug){
        /*
        $posts = Post::where('level', 'event')->whereHas('tags', function($query) use($slug){
            $query->where('slug', $slug);
        })
            ->orderBy('id', 'DESC')
            ->where('statusx', 'PUBLISHED')
            ->where('level', 'event')
            ->paginate(6);
            */

            $posts = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->join('countries', 'states.countries_id', '=', 'countries.id')->whereHas('tags', function($query) use($slug){
                $query->where('slug', $slug);
            })

            ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
            ->orderBy('posts.date_activi', 'DESC')
            ->where('posts.statusx', 'PUBLISHED')
            ->where('posts.level', 'event')
            ->paginate(6);
            
        return view('front.event', compact('posts'));
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












      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request, $post_id){

        
        $post = Post::find($post_id);
        
        $comment = new Comment;
        $comment -> user_id  = $request -> user_id;
        $comment -> name  = $request -> name;
        $comment -> comment = $request -> comment;
        $comment -> statusx = 'PUBLISHED';  
        $comment -> post()->associate($post);
        $comment -> save();
        

        $newsletter = Newsletter::where('email', $request->email)->get();

        if ($newsletter->isEmpty()) {
            
            $newsletter = new Newsletter;
            $newsletter -> name  = $request -> name;
            $newsletter -> email = $request -> email;
            $newsletter -> cell  = $request -> cell;
            $newsletter -> website  = $request -> website;
            $newsletter -> statusx = 1;
            $newsletter -> save();

        }

        toastr()->success('Mensaje enviado con exito');
        return back()->with('info', 'Mensaje enviado con exito');

    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request){
        
        $comment = Comment::find($request->comment_id);

        $reply = new Reply;
        $reply -> name  = $request -> name;
        $reply -> comment = $request -> comment;
        $reply -> statusx = 'PUBLISHED';  
        $reply -> comment()->associate($comment);
        $reply -> save();



        $newsletter = Newsletter::where('email', $request->email)->get();

        if ($newsletter->isEmpty()) {
            
            $newsletter = new Newsletter;
            $newsletter -> name  = $request -> name;
            $newsletter -> email = $request -> email;
            $newsletter -> cell  = $request -> cell;
            $newsletter -> website  = $request -> website;
            $newsletter -> statusx = 1;
            $newsletter -> save();

        }

        toastr()->success('Mensaje enviado con exito');
        return back()->with('info', 'Mensaje enviado con exito');

    }


}
