<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
    
    /**
     * モデルに関連付けるテーブル
     *
     * @var string
     */
    protected $table = 'dictionary';
    
}