<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use App\Models\Country;
use App\Models\Tag;
use App\Models\Likes;
use App\Models\IpLikes;
use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($level)
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->where('level', $level)->paginate(5);


        if ($level == "sermon") {
            $view = 'dashboard.sermon.posts.index';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.posts.index';
        }
        if ($level == "event") {
            $view = 'dashboard.event.posts.index';
        }
        
        return view($view, compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($level)
    {
        //$categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $categories = Category::where('level', $level)->orderBy('title', 'ASC')->get();
        $tags = Tag::where('level', $level)->orderBy('title', 'ASC')->get();

        if ($level == "sermon") {
            $view = 'dashboard.sermon.posts.create';
            $value = Author::orderBy('name', 'ASC')->get();
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.posts.create';
            $value = Author::orderBy('name', 'ASC')->get();
        }
        if ($level == "event") {
            $view = 'dashboard.event.posts.create';
            $value = Sponsor::orderBy('name', 'ASC')->get();
            $countries = Country::get(["name","id"]); // SELECT PAIS ESTADOS CIUDADES
        }

        $compact = ['categories', 'tags', 'value', 'level'];
        
        
        if ($level == "event" && $countries->isNotEmpty()) {
            $compact = array_merge($compact, ['countries']);
        }
        
        return view($view, compact($compact));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {

        
        $level = $request->level;

        if ($level == "sermon") {
            $view = 'posts-sermon.index';
            $img_path = 'images/front/sermon/';
        }
        if ($level == "blog") {
            $view = 'posts.index';
            $img_path = 'images/front/blog/';
        }
        if ($level == "event") {
            $view = 'posts.index';
            $img_path = 'images/front/event/';

            $ON_OFF = Post::where('activity', $request->activity)
            ->select('posts.id', 'posts.activity')
            ->get();
            
            foreach ($ON_OFF as $value) {
                if ($value->activity = 'ON' ) {
                    $value->activity = 'OFF';
                    $value->save();
                }
            }
        }

        
        $post = Post::create($request -> all());

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path($img_path . $filename , 60);
            Image::make($file)->resize(800, 600)->save($path);
            $post->fill(['img' => $filename ])->save();
        }
        
        $post->tags()->sync($request->get('tags'));

        

        $like = new Likes;
        $like -> Post()->associate($post);
        $like -> save();

        $iplike = new Iplikes;
        $iplike -> like()->associate($like);
        $iplike -> save();
        
        toastr()->info('El post creada con exito');
        return redirect()->route($view, ['level' => $level, $post->id])->with('info', 'El post creada con exito');
        //return view($view, compact('level'))->with('info', 'El post creada con exito');
//        return back()->with('info', 'El post creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($level, $id)
    {
        $post = Post::where('level', $level)->find($id);
        $this->authorize('pass', $post);
        $category = Category::where('level', $level)->find($post -> category_id);
        
        if ($level == "sermon") {
            $view = 'dashboard.sermon.posts.show';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.posts.show';
        }
        if ($level == "event") {
            $view = 'dashboard.event.posts.show';
        }

        
        return view($view, compact('post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($level, $id)
    {
            $post = Post::where('level', $level)->find($id);
            $this->authorize('pass', $post);
            $categories = Category::where('level', $level)->orderBy('title', 'ASC')->get();
            $tags = Tag::where('level', $level)->orderBy('title', 'ASC')->get();
            $authors = Author::orderBy('name', 'ASC')->get();
            
            if ($level == "sermon") {
                $view = 'dashboard.sermon.posts.edit';
            }
            if ($level == "blog") {
                $view = 'dashboard.blog.posts.edit';
            }
            if ($level == "event") {
                $view = 'dashboard.event.posts.edit';
            }
            
            return view($view, compact('post', 'categories', 'tags', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {

        $level = $request->level;

        if ($level == "sermon") {
            $view = 'posts-sermon.index';
            $img_path = 'images/front/sermon/';
        }
        if ($level == "blog") {
            $view = 'posts.index';
            $img_path = 'images/front/blog/';
        }
        if ($level == "event") {
            $view = 'posts.index';
            $img_path = 'images/front/event/';
        }

        $post = Post::where('level', $level)->find($id);
        $this->authorize('pass', $post);
        $post->fill($request->all())->save();

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path($img_path . $filename , 60);
            Image::make($file)->resize(800, 600)->save($path);
            $post->fill(['img' => $filename ])->save();
        }
        
        $post->tags()->sync($request->get('tags'));

        toastr()->info('Actualizada con exito');
        return redirect()->route($view, ['level' => $level, $post->id])->with('info', 'Actualizada con exito');
        //return view($view, compact('level'))->with('info', 'El post creada con exito');
//        return back()->with('info', 'El post creada con exito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($level, $id)
    {
        $post = Post::where('level', $level)->find($id);
        $this->authorize('pass', $post);
        $post->delete();
        DB::statement("ALTER TABLE `posts` AUTO_INCREMENT = 1;");
        
        toastr()->success('Eliminado correctamente');
        return back()->with('info', 'Eliminado correctamente');
    }

    public function time($level, $activity, $id)
    {
        if ($level == "event") {
            
            $ON_OFF = Post::where('id', $id)
            ->where('activity', $activity)
            ->where('level', $level)
            ->select('posts.id', 'posts.activity')
            ->get();
            
            foreach ($ON_OFF as $value) {
                
                if ($value->activity == 'OFF' ) {
                    
                    $ON_OFF2 = Post::where('activity', 'ON')
                    ->select('posts.id', 'posts.activity')->get();
                    
                    foreach ($ON_OFF2 as $value2) {
                        $value2->activity = 'OFF';
                        $value2->save();
                    }
                    
                    $value->activity = 'ON';
                    $value->save();

                    toastr()->success('Fue activado el temporizador de eventos');
                    return back()->with('info', 'Fue activado el temporizador de eventos');

                }
            }
        }
    }

}
