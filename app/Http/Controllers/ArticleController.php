<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleBody;
use App\Models\Articles;

class ArticleController extends Controller
{
    public function show(Articles $article)
    {

        $body = ArticleBody::findOrFail($article->id);

        return view('show-article', compact('article', 'body'));
    }
}
