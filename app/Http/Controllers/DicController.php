<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dict;

class DicController extends Controller
{
    public function add()
    {
        return view('dic.create');
    }

    public function create(Request $request)
    {
        // Validationを行う
        $this->validate($request, Dict::$rules);

        $dictionary = new Dict;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$dictionary->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $dictionary->image_path = basename($path);
        } else {
            $dictionary->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $dictionary->fill($form);
        $dictionary->save();

        return redirect('dic/create');
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Dict::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Dict::all();
        }
        return view('dic.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    // 以下を追記

    public function edit(Request $request)
    {
        // Dict Modelからデータを取得する
        $dictionary = Dict::find($request->id);
        if (empty($dictionary)) {
            abort(404);
        }
        return view('dic.edit', ['dictionary_form' => $dictionary]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Dict::$rules);
        // Dict Modelからデータを取得する
        $dictionary = Dict::find($request->id);
        // 送信されてきたフォームデータを格納する
        $dictionary_form = $request->all();
        unset($dictionary_form['_token']);

        // 該当するデータを上書きして保存する
        $dictionary->fill($dictionary_form)->save();

        return redirect('dic');
    }
    
    public function delete(Request $request)
    {
        // 該当するDict Modelを取得
        $dictionary = Dict::find($request->id);

        // 削除する
        $dictionary->delete();

        return redirect('dic/');
    }
}