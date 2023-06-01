<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Image;

class AuthorController extends Controller
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
    public function index()
    {
        $authors = Author::orderBy('id', 'DESC')->paginate();
        return view('dashboard.blog.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorStoreRequest $request)
    {

        $author = Author::create($request->all());
        
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/user/author/' . $filename , 60);
            Image::make($file)->resize(200, 200)->save($path);
            $author->fill(['img' => $filename ])->save();
        }
        
        toastr()->success('Autor creada con exito');
        return redirect()->route('authors.index', $author->id)->with('info', 'Autor creada con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);
        return view('dashboard.blog.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);
        return view('dashboard.blog.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorUpdateRequest $request, $id)
    {
        $author = Author::find($id);
        $author->fill($request->all())->save();
        
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/user/author/' . $filename , 60);
            Image::make($file)->resize(200, 200)->save($path);
            $author->fill(['img' => $filename ])->save();
        }
        
        toastr()->success('Etiqueta Actualizada con exito');
        return redirect()->route('authors.index', $author->id)->with('info', 'Autor Actualizada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id)->delete();
        
        DB::statement("ALTER TABLE `authors` AUTO_INCREMENT = 1;");
        return back()->with('info', 'Eliminado correctamente');
    }
}
