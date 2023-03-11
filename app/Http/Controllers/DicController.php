<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dict;

class DicController extends Controller
{
    //
    public function ad()
    {
        return view('dic.add');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Dict::$rules);

        $dictionary = new Dict;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$dict->image_path に画像のパスを保存する
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
        
        // dic/addにリダイレクトする
        return redirect('dic/add');
    }
    
    public function disp()
    {
        return view('dic.display');
    }
    
    public function up()
    {
        return view('dic.update');
    }
    
    public function del()
    {
        return view('dic.deletion');
    }
    
    public function ind(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Dict::where('title', $cond_title)->get();
        } else {
            $posts = Dict::all();
        }
        return view('dic.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
