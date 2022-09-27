<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::when(request('search', ''), function ($query, $search) {
            $query->where('title', 'like', '%' .  $search . '%');
        })
            ->whereHas('category', function ($query) {
                $query->where('name', 'like', '%' . request('category') . '%');
            })
            ->with('category')
            ->latest()->paginate(5)
            ->withQueryString();
        $articles->appends(['category' => request('category') ]);
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article  =  Article::findOrFail($id);
        return view('articles.detail', [
            'article' => $article,
        ]);
    }
    public function create()
    {
        return view('articles.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(CreateArticleRequest $request)
    {
        $data = $request->validated();
        Article::create($data);
        return redirect('/')->with('success', 'Create Article Successfully');
    }

    public function delete($id)
    {
        $delete = Article::findOrfail($id)->delete();
        return redirect('/')->with('delete', 'Article Deleted Successfully');
    }
}