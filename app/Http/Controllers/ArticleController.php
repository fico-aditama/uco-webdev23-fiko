<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
    function list(Request $request)
    {
        // $articles = $request->session()->get('articles') ?? [];
        // return view('article.list', [
        //     'articles' => $articles,
        // ]);
        $articles = Article::get();

        return view('article.list', [
            'articles' => $articles,
        ]);
    }
    function create(Request $request)
    {
        if ($request->isMethod('post')) {
            // Session
            // $request->session()->push('articles',[
            //     'title'=>$request->title,
            //     'content'=>$request->content,
            //     'date' => date('Y-m-d H:i:s')
            // ]);

            $articleCategories = ArticleCategory::orderBy('name')->get();
            if ($request->isMethod('post')) {
                $request->validate([
                    'title' => ['required', 'string', 'max:255', Rule::unique('articles')],
                    'content' => ['required', 'string', 'max:2000'],
                    'article_category_id' => ['required', 'integer', Rule::in($articleCategories->pluck('id'))],
                ]);
                $slug = Str::slug($request->title);
                if (Article::where('slug', $slug)->exists()) {
                    $slug .= '-' . uniqid();
                }
            }

            $article = Article::create([
                // 'slug' => Str::slug($request->title),
                'slug' => $slug,
                'title' => $request->title,
                'content' => $request->content,
                'article_category_id' => $request->article_category_id,
            ]);

            if ($article) {
                return redirect()
                    ->route('article.list')
                    ->withSuccess('Artikel berhasil dibuat');
            }
            return back()
                ->withInput()
                ->withErrors(['alert' => 'Gagal menyimpan artikel']);
        }
        return view('article.form', [
            'article_categories' => $articleCategories,
        ]);
    }

    function single(string $slug, Request $request)
    {
        $article = Article::where('slug', $slug)->first();
        if (!$article) {
            return abort(404);
        }
        return view('article.single', ['article' => $article]);
    }

    function delete(string $id, Request $request)
    {
        $article = Article::where('id', $id)->first();
        if (!$article) {
            return abort(404);
        }
        if ($article->delete()) {
            return redirect()
                ->route('article.list')
                ->withSuccess('Artikel telah dihapus');
        }
        return back()
            ->withInput()
            ->withErrors([
                'alert' => 'Gagal menghapus artikel',
            ]);
    }

    function edit(string $id, Request $request)
    {
        $article = Article::where('id', $id)->first();

        $articleCategories = ArticleCategory::orderBy('name')->get();

        if (!$article) {
            return abort(404);
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'slug' => ['required', 'string', Rule::unique('articles')->ignore($article->id)],
                'title' => ['required', 'string', 'max:255', Rule::unique('articles')->ignore($article->$id)],
                'content' => ['required', 'string', 'max:2000'],
                'article_category_id' => ['required', 'integer', Rule::in($articleCategories->pluck('id'))],
            ]);
            $article->slug = $request->slug;
            $article->title = $request->title;
            $article->content = $request->content;
            $article->article_category_id = $request->article_category_id;

            $article->save();

            if ($article) {
                return redirect()
                    ->route('article.single', ['slug' => $article->slug])
                    ->withSuccess('Artikel berhasil diubah');
            }

            return back()
                ->withInput()
                ->withErrors(['alert' => 'Gagal menyimpan artikel']);
        }

        return view('article.form', [
            'article' => $article,
            'article_categories' => $articleCategories,
        ]);
    }
    function comment(string $id, Request $request)
    {
        $article = Article::where('id', $id)->first();

        if (!$article) {
            return abort(404);
        }
        $request->validate([
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        $comment = ArticleComment::create([
            'article_id' => $article->id,
            'content' => $request->comment,
        ]);

        if ($comment) {
            return redirect()
                ->route('article.single', ['slug' => $article->slug])
                ->withSucess('Komentar berhasil ditambahkan');
        }
        return back()
            ->withInput()
            ->withErrors([
                'message' => 'Gagal menambahkan komentar',
            ]);
    }
}
