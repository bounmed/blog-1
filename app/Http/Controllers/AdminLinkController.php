<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Link;

class AdminLinkController extends Controller
{
    public function new (Request $request) 
    {
        $article = new \App\Link;
        $article->url = $request->url;
        $article->description = $request->description;
        $article->save();
        return back();

        //Session::flash('success', 'Linken ble lagret');

    }
}
