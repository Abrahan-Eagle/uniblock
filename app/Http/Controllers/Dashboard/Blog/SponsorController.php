<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SponsorStoreRequest;
use App\Http\Requests\SponsorUpdateRequest;
use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;
use Image;

class SponsorController extends Controller
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
        $sponsors = Sponsor::orderBy('id', 'DESC')->paginate(5);
        return view('dashboard.blog.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorStoreRequest $request)
    {

        //dd($request->all());
        $sponsor = Sponsor::create($request->all());

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/user/sponsor/' . $filename , 60);
            Image::make($file)->resize(200, 200)->save($path);
            $sponsor->fill(['img' => $filename ])->save();
        }
        
        toastr()->success('Patrocinante creado con exito');
        return redirect()->route('sponsors.index', $sponsor->id)->with('info', 'Patrocinante creado con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('dashboard.blog.sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('dashboard.blog.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorUpdateRequest $request, $id)
    {

        $sponsor = Sponsor::find($id);
        $sponsor->fill($request->all())->save();
        
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('images/user/sponsor/' . $filename , 60);
            Image::make($file)->resize(200, 200)->save($path);
            $sponsor->fill(['img' => $filename ])->save();
        }
        
        toastr()->success('Patrocinante actualizado con exito');
        return redirect()->route('sponsors.index', $sponsor->id)->with('info', 'Patrocinante Actualizado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id)->delete();
        
        DB::statement("ALTER TABLE `sponsor` AUTO_INCREMENT = 1;");
        return back()->with('info', 'Eliminado correctamente');
    }}
