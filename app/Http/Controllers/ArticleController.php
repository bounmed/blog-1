<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;

class ArticleController extends Controller
{
    public function article(Article $article) 
    {
        return view('article', ['article' => $article]);
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function search(Request $request)
    {
        $searchResult = \App\Article::where('title', 'LIKE', "%$request->searchString%")
                            ->orWhere('description', 'LIKE', "%$request->searchString%")
                            ->orWhere('body', 'LIKE', "%$request->searchString%")
                            ->get();

        return view('search', ['searchResult' => $searchResult]);
    }
}