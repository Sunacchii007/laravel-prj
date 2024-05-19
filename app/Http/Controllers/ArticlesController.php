<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation'=>'required|string',
            'prix'=>'required|numeric',
            'quantite'=>'required|numeric',
            'image'=>'required|file',
    
           ],
        [
            'designation.required'=>'la designation est obligatoire',
            'prix.required'=>'le prix est obligatoire',
            'quantite.required'=>'la quantite est obligatoire',
            'image.required'=>'l image est obligatoire',
            'designation.string'=>'la designation doit etre un string',
            'prix.numeric'=>'le prix doit etre un nombre',
            'quantite.numeric'=>'la quantite doit etre un nombre',
            'image.file'=>'l image doit etre un fichier ',
        ]);
        $newImageName = time() . '_' . $request->name . '.'.
        $request->image->extension();  
        $request->image->move(public_path('images'),$newImageName);

        Article::create([
            "designation"=> $request->input("designation"),
            "prix"=> $request->input("prix"),
            "quantite"=> $request->input("quantite"),
            "image"=> $newImageName
        ]);
        
        return redirect()->route("articles.index")->with("success","Article bien ajoute");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
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
    $request->validate([
        'designation'=>'required|string',
        'prix'=>'required|numeric',
        'quantite'=>'required|numeric',
        'image'=>'nullable|file', // Make image field nullable as it's not required for update
    ],
    [
        'designation.required'=>'la designation est obligatoire',
        'prix.required'=>'le prix est obligatoire',
        'quantite.required'=>'la quantite est obligatoire',
        'designation.string'=>'la designation doit etre un string',
        'prix.numeric'=>'le prix doit etre un nombre',
        'quantite.numeric'=>'la quantite doit etre un nombre',
        'image.file'=>'l image doit etre un fichier ',
    ]);

    $article = Article::find($id);
    $article->designation= $request->input('designation');
    $article->prix= $request->input('prix');
    $article->quantite= $request->input('quantite');

    // Check if a new image is provided
    if ($request->hasFile('image')) {
        $newImageName = time() . '_' . $request->name . '.'. $request->image->extension();  
        $request->image->move(public_path('images'),$newImageName);
        $article->image = $newImageName;
    }

    $article->save();

    return redirect()->route('articles.show', $id)->with('success', 'Article bien modifie');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article bien supprime');
    }

    public function search() {
        return view('articles.search');
    }
    public function result(Request $request)
{
    $article = Article::find($request->input('id'));
    if ($article == null)
        return redirect()->route('articles.search')->with('fail', 'Article not found');
    return view('articles.search', compact('article'));
}

    public function find(Request $request) {
        $article = Article::find($request->input('id'));
        if($article == null)
            return redirect()->route('articles.search')->with('fail', 'Article not found');
        return view('articles.search', compact('article'));
       
    }
}













