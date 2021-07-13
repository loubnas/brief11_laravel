<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Film;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films=Film::all();
    
        return view('gallery',['films'=>$films]);  
        
        // $comments=Commentaire::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commentaire=new Commentaire();
        $commentaire->text=$request->message;
        $commentaire->user_id=$request->user_id;
        $commentaire->film_id=$request->id;
        $commentaire->save();
        return redirect(route("commentaire.show",$request->id));
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film=Film::find($id);
        return view('contenu',['film'=>$film]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentaire =Commentaire::find($id);
        return view('updatecoments',['commentaire'=>$commentaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $commentaire=Commentaire::find($id);
        $commentaire->text=$request->text;
        $commentaire->save();
        return redirect("commentaire");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Commentaire::destroy($id);
        return redirect()->back();
     

    }
}
