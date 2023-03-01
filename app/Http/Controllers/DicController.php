<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DicController extends Controller
{
    //
    public function add()
    {
        return view('dic.add');
    }
    
    public function display()
    {
        return view('dic.display');
    }
    
    public function update()
    {
        return view('dic.update');
    }
    
    public function deletion()
    {
        return view('dic.deletion');
    }
    
    
    
    
    
    
}
