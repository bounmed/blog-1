<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Article;
use Session;

class AdminController extends Controller
{
    public function isAdmin()
    {
        $result = false;
        if (Auth::user())
        {
            if (\App\User::find(Auth::user()->id)->admin > 0)
                $result = true;
        }
        return $result;
    }
    public function index(Request $request)
    {
        if ($this->isAdmin() === true)
            return view('admin');
        else
            return view('welcome');
    }

    public function edit(Article $article)
    {
        if ($this->isAdmin() === true)
            return view('edit', ['article' => $article]);
        else
            return view('welcome');
    }

    public function save(Request $request, Article $article)
    {
        $article->update(['title' => $request->title, 'body' => $request->body, 'description' => $request->description, 'image' => $request->image]);

        //Session::flash('success', 'Endringene ble lagret');
        return back();
    }

    public function new(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->user_id = Auth::id();
        $article->save();
        return back();
    }
}