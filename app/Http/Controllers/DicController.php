<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DicController extends Controller
{
    //
    public function ad()
    {
        return view('dic.add');
    }
    
    public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
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
}
