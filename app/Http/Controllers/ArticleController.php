<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleBody;
use App\Models\Articles;

class ArticleController extends Controller
{
    public function show(Request $request)
    {

        $article = Articles::find($request->id);
        $body = ArticleBody::findOrFail($request->id);

        return view('show-article', compact('article', 'body'));
    }
}
