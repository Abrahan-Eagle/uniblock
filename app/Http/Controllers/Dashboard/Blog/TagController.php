<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

//use App\Tag;


class TagController extends Controller
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
        $tags = Tag::orderBy('id', 'DESC')->where('level', $level)->paginate(5);

        if ($level == "sermon") {
           $view = 'dashboard.sermon.tags.index';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.tags.index';
        }
        if ($level == "event") {
            $view = 'dashboard.event.tags.index';
        }

        return view($view, compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($level)
    {
        if ($level == "sermon") {
            $view = 'dashboard.sermon.tags.create';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.tags.create';
        }
        if ($level == "event") {
            $view = 'dashboard.event.tags.create';
        }
        return view($view);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->all());

        $level = $request->level;

        if ($level == "sermon") {
            $view = 'tags-sermon.index';
        }
        if ($level == "blog") {
            $view = 'tags.index';
        }
        if ($level == "event") {
            $view = 'tags.index';
        }

        toastr()->info('Etiqueta creada con exito');
        return redirect()->route($view, ['level' => $level, $tag->id])->with('info', 'Etiqueta creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($level, $id)
    {
        $tag = Tag::where('level', $level)->find($id);

        if ($level == "sermon") {
            $view = 'dashboard.sermon.tags.show';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.tags.show';
        }
        if ($level == "event") {
            $view = 'dashboard.event.tags.show';
        }

        return view($view, compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($level, $id)
    {
        $tag = Tag::where('level', $level)->find($id);

        if ($level == "sermon") {
            $view = 'dashboard.sermon.tags.edit';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.tags.edit';
        }
        if ($level == "event") {
            $view = 'dashboard.event.tags.edit';
        }
       
        return view($view, compact('tag', 'level'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $level = $request->level;
        $tag = Tag::where('level', $level)->find($id);
        $tag->fill($request->all())->save();

        if ($level == "sermon") {
            $view = 'tags-sermon.index';
        }
        if ($level == "blog") {
            $view = 'tags.index';
        }
        if ($level == "event") {
            $view = 'tags.index';
        }


        toastr()->success('Etiqueta Actualizada con exito');
        return redirect()->route($view, ['level' => $level, $tag->id]  )->with('info', 'Etiqueta Actualizada con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($level, $id)
    {
        $tag = Tag::where('level', $level)->find($id)->delete();
        DB::statement("ALTER TABLE `tags` AUTO_INCREMENT = 1;");

        toastr()->success('Eliminado correctamente');
        return back()->with('info', 'Eliminado correctamente');
    }
}
