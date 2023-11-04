<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profile;

class SelfProfileController extends Controller
{
    //以下を追加
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(ProfileRequest $request)
    {
       // Varidationを行う
       $this->validate($request,  Profile::$rules); 
       //Profileモデルをインスタンス化
       $profile = new Profile();
       //フォームで入力された内容を全て$formに格納
       $form = $request->all();
       
       //性別のデフォルト値を設定
       $gender = $request->input('gender', 'men');
        
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }

// 以下を追記
public function index(Request $request)
{
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
        // 検索されたら検索結果を取得する
        $posts = Profile::where('name', $cond_title)->get();
    } else {
        // それ以外はすべてのニュースを取得する
        $posts = Profile::all();
    }
    return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
}


    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(ProfileRequest $request)
    {
        return redirect('admin/profile/edit');
    }
}