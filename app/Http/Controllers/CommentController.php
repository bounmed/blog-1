<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Comment;
use App\Article;


class CommentController extends Controller
{
    public function new(Request $request, Article $article)
    {
        $result = Comment::create([
            'body' => $request->body,
            'article_id' => $article->id,
            'user_id' => Auth::id()
        ]);
        return back();
    }
}
