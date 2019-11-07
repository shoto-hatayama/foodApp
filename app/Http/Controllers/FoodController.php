<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
class FoodController extends Controller
{
    //
    public function index(Request $request){
        $list = Food::all();
        return view('index',['list' => $list]);
    }

    public function store(Request $request){
        //アップロードされたファイルの保存処理
        $file_name = $request->file('photo')->getClientOriginalName();
        $request->file('photo')->storeAs('',$file_name);
        //フォームの値を保存
        $Food = new Food;
        $Food->shopName = $request->shopName;
        $Food->food = $request->food;
        $Food->location = $request->location;
        $Food->photo = $request->photo;
        $Food->comment = $request->comment;
        $Food->save();

        return redirect('/')->with('flash_message','登録が完了しました♪');
    }
}
