<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Videohero;
use App\Models\Testimonio;
use App\Models\Historyabout;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $videohero = Videohero::orderBy('id', 'DESC')
         ->limit(1)
         ->get();

         $sermon = Post::join('authors', 'authors.id', '=', 'posts.author_id')
         ->select('posts.*', 'authors.name')
         ->orderBy('posts.id', 'DESC')
         ->where('posts.statusx', 'PUBLISHED')
         ->where('posts.level', 'sermon')
         ->paginate(3);


         $posts = Post::join('authors', 'authors.id', '=', 'posts.author_id')
         ->select('posts.*', 'authors.name')
         ->orderBy('posts.id', 'DESC')
         ->where('posts.statusx', 'PUBLISHED')
         ->where('posts.level', 'blog')
         ->paginate(3);

        $events = Post::join('cities', 'posts.cities_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->join('countries', 'states.countries_id', '=', 'countries.id')
        ->select('posts.*', 'cities.*', 'states.*', 'countries.*', 'cities.name AS cities_name', 'states.name AS states_name', 'countries.name AS countries_name')
        ->orderBy('posts.date_activi', 'DESC')
        ->where('posts.statusx', 'PUBLISHED')
        ->where('posts.level', 'event')
        ->paginate(2);

         $testimonio = Testimonio::orderBy('id','DESC')
         ->limit(6)
         ->get();

         
         return view('front.home', compact('videohero', 'sermon', 'testimonio', 'events', 'posts',));
    }

    public function about(){
        
        $history = Historyabout::orderBy('id', 'DESC')
        ->limit(1)
        ->get();
        
        $testimonio = Testimonio::orderBy('id','DESC')
        ->limit(6)
        ->get();
        
        return view('front.about', compact('history', 'testimonio'));
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
