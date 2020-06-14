<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
   
    //後にcreate()メソッドで保存するカラムを指定
    protected $fillable = [
        'image_file_name', 'image_title',
    ];
}
