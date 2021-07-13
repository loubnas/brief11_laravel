<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $films=Film::all();
    if(Auth::user()->role=="admin"){
        return view('listFilm',['films'=>$films]);
    }
    else{
        return redirect("commentaire");
    }

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film=new Film();
        $file = $request->image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $filepath = "storage/images/";
        $file->move($filepath,$filename);
        $film->image = $filepath.$filename;
        $film->titre=$request->titre;
        $film->datepub=$request->datepub;
        $film->save();
        return redirect('film');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film =Film::find($id);
        return view('update',['film'=>$film]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film=Film::find($id);
        $file = $request->image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $filepath = "storage/images/";
        $file->move($filepath,$filename);
        $film->image = $filepath.$filename;
        $film->titre=$request->titre;
        $film->datepub=$request->datepub;
        $film->save();
        return redirect('film');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Film::destroy($id);
        return redirect('film');
        
        // return redirect(route("index"));
    }
}
