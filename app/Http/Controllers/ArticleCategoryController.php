<?php

namespace App\Http\Controllers;
use App\Models\ArticleCategory;

use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    function list(Request $request)
    {
        $categories = ArticleCategory::get();

        return view('article_category.list', [
            'categories' => $categories,
        ]);
    }
    function create(Request $request)
    {
        if ($request->isMethod('post')) {
            // Database
            $category = ArticleCategory::create([
                'name' => $request->name,
            ]);

            if ($category) {
                return redirect()
                    ->route('article_category.list')
                    ->withSuccess('Category berhasil dibuat');
            }
            return back()
                ->withInput()
                ->withErrors(['alert' => 'Gagal menyimpan Category']);
        }
        return view('article_category.form');
    }


    function delete(string $id, Request $request)
    {
        $category = ArticleCategory::where('id', $id)->first();
        if (!$category) {
            return abort(404);
        }
        if ($category->delete()) {
            return redirect()
                ->route('article_category.list')
                ->withSuccess('Category telah dihapus');
        }
        return back()
            ->withInput()
            ->withErrors([
                'alert' => 'Gagal menghapus Category',
            ]);
    }

    function edit(string $id, Request $request)
    {
        $category = ArticleCategory::where('id', $id)->first();

        if (!$category) {
            return abort(404);
        }

        if ($request->isMethod('post')) {
            $category->name = $request->name;

            $category->save();

            if ($category) {
                return redirect()
                    ->route('article_category.list', ['name' => $category->name])
                    ->withSuccess('Artikel berhasil diubah');
                }

                return back()
                    ->withInput()
                    ->withErrors(['alert' => 'Gagal menyimpan artikel'
                ]);
            }

            return view('article_category.form', [
                'category' => $category,
            ]);
    }

}
