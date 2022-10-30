<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Articles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SearchComponent extends Component
{
    public $search;

    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {

        $len = Str::length($this->search);

        if($len > 2)
        {
        $search1 = Articles::where('published', 1)
                            ->where('approved', 1)
                            ->where('public',1)
                            ->where(function ($q){
                            $q->where('title', 'like', '%'.$this->search.'%')
                            ->orWhere('tags','like','%'.$this->search,'%');
                            })->get();




        foreach($search1 as $record)
            {
                $row[] = $record->id;
            }


        if (isset($row))
            {
            $sql = "SELECT articles.id,articles.title,articles.views, articles.author_name as author_name, articles.kb as kb, articles.created_at as created_at, articles.rating as rating
                            FROM articles
                            join article_bodies ON articles.id = article_bodies.id
                            WHERE MATCH(article_bodies.body) AGAINST(? IN boolean mode) AND articles.published = 1 AND articles.approved = 1 AND article_bodies.id AND articles.public = 1 NOT IN (". implode(',', $row) .")";
            } else
            {
                $sql = "SELECT articles.id,articles.title,articles.views, articles.author_name as author_name, articles.kb as kb, articles.created_at as created_at, articles.rating as rating
                            FROM articles
                            join article_bodies ON articles.id = article_bodies.id
                            WHERE MATCH(article_bodies.body) AGAINST(? IN boolean mode) AND articles.published = 1 AND articles.approved = 1 AND articles.public = 1";

            }
            $body = DB::select($sql,[$this->search]);



            $allRows = collect($search1)->merge($body)->unique('id');

        }

        if(!isset($allRows))
        {
            $articles = [];
        }
        else
        {
            $articles = $allRows;
        }


        return view('livewire.search-component',compact('articles'));
    }
}
