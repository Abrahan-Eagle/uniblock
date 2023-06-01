<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'DESC')->where('level', $level)->paginate(5);

        if ($level == "sermon") {
           $view = 'dashboard.sermon.categories.index';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.categories.index';
        }
        if ($level == "event") {
            $view = 'dashboard.event.categories.index';
        }

        return view($view, compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($level)
    {
        if ($level == "sermon") {
            $view = 'dashboard.sermon.categories.create';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.categories.create';
        }
        if ($level == "event") {
            $view = 'dashboard.event.categories.create';
        }
        return view($view);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());

        $level = $request->level;

        if ($level == "sermon") {
            $view = 'categories-sermon.index';
        }
        if ($level == "blog") {
            $view = 'categories.index';
        }
        if ($level == "event") {
            $view = 'categories.index';
        }


        toastr()->info('Categoria creada con exito');
        return redirect()->route($view, ['level' => $level, $category->id]);//->with('info', 'Etiqueta creada con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($level, $id)
    {

        $category = Category::where('level', $level)->find($id);

        if ($level == "sermon") {
            $view = 'dashboard.sermon.categories.show';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.categories.show';
        }
        if ($level == "event") {
            $view = 'dashboard.event.categories.show';
        }

         
        return view($view, compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($level, $id)
    {
        $category = Category::where('level', $level)->find($id);

        if ($level == "sermon") {
            $view = 'dashboard.sermon.categories.edit';
        }
        if ($level == "blog") {
            $view = 'dashboard.blog.categories.edit';
        }
        if ($level == "event") {
            $view = 'dashboard.event.categories.edit';
        }
       
        return view($view, compact('category', 'level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $level = $request->level;

        $category = Category::where('level', $level)->find($id);
        $category->fill($request->all())->save();
        
        
        if ($level == "sermon") {
            $view = 'categories-sermon.index';
        }
        if ($level == "blog") {
            $view = 'categories.index';
        }
        if ($level == "event") {
            $view = 'categories.index';
        }

        //return redirect()->route('categories.edit', $category->id)->with('info', 'Categoria Actualizada con exito');
        toastr()->success('Etiqueta Actualizada con exito');
        return redirect()->route($view, ['level' => $level, $category->id]  )->with('info', 'Categoria Actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($level, $id)
    {
        $category = Category::where('level', $level)->find($id)->delete();
        
        DB::statement("ALTER TABLE `categories` AUTO_INCREMENT = 1;");
        return back()->with('info', 'Eliminado correctamente');
    }
}
