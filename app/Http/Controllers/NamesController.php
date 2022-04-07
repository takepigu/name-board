<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Name;

class NamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //getでnames/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //名前一覧をidの降順で取得
        $names = Name::orderBy('id','desc')->paginate(25);
        
        //名前一覧ビューでそれを表示
        return view('names.index',[
            'names' => $names,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     //getでnames/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $name = new Name;
        
        //メッセージ作成ビューを表示
        return view('names.create',[
            'name' => $name,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //postでnames/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'self' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'email:rfc,dns',
            ]);
            
        //名前を作成
        $name = new Name;
        $name->self = $request->self;
        $name->title = $request->title;
        $name->content = $request->content;
        $name->save();
        
        //トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //getでnames/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //idの値で名前を検索して取得
        $name = Name::findOrFail($id);
        
        //名前詳細ビューでそれを表示
        return view('names.show',[
            'name' => $name,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //getでnames/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //idの値で名前を検索して取得
        $name = Name::findOrFail($id);
        
        //名前編集ビューでそれを表示
        return view('names.edit',[
            'name' => $name,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //putまたはpatchでnames/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'self' => 'required|max:255',
            'title' => 'required|max:255',
            'content' => 'email:rfc,dns',
            ]);
            
        //idの値で名前を検索して取得
        $name = Name::findOrFail($id);
        //名前を更新
        $name->self = $request->self;
        $name->title = $request->title;
        $name->content = $request->content;
        $name->save();
        
        //トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //deleteでnames/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //idの値で名前を検索して取得
        $name = Name::findOrFail($id);
        //名前を削除
        $name->delete();
        
        //トップページへリダイレクトさせる
        return redirect('/');
    }
}
