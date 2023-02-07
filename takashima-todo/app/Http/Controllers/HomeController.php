<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = \Auth::user()->articles()->orderBy('created_at', 'desc')->paginate(5);
        $data = [
            'articles' => $articles,
        ];

        return view('home', $data);
    }
}
