<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id){
    $article = Article::find($id);
    return view('articles.show', ['article'=>$article]);
    }

    public function showAll(){
        $article = Article::all();
        return view('articles', ['articles'=> $article]);
    }
    public function index(){
        $article = Article::latest()->get();
        return view('articles.index', ['articles'=>$article]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(){
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();
        return redirect('/articles');
    }

    public function edit()
    {
    return view('articles.edit');
    }

    public function update()
    {

    }
}
