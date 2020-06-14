<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Art;
use Illuminate\Support\Facades\Validator;

class ArtController extends Controller
{

  //画像およびコメントアップロード
public function upload(Request $request){


        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'comment' => 'required|max:191'
        ]);

        if ($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
//カラムに画像のパスとタイトルを保存
        Post::create([
            'image_file_name' => $path,
            'image_title' => $request->comment
        ]);
        return redirect('/');
    }
//ページ表示
    public function index(){
        $posts = \App\Post::all();

        $data = [
            'posts' => $posts,
        ];

        return view('welcome',$data);
    }
  
    public function add()
  {
      return view('admin.art.create');
  }
  
  
  
    public function create(Request $request)
  {
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $art->image_path = basename($path);
      } else {
          $art->image_path = null;
      }
       unset($form['_token']);
       unset($form['image']);

      // データベースに保存する
      $art->fill($form);
      $art->save();

        return redirect('admin/art/create');
  }
  
  
  
  
   public function index(Request $request)
   {
       $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Art::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Art::all();
      }
       return view('admin.art.index', ['posts' => $posts, 'cond_title' => $cond_title]);
   }
   
}
