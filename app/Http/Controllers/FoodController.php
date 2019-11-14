<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
class FoodController extends Controller
{
    //
    public function index(Request $request){
        $list = Food::all();
        return view('index',['lists' => $list]);
    }

    public function store(Request $request){
        //アップロードされたファイルの保存処理
        if($request->hasFile('photo')){
            $path = $request->photo->store('public/foodImg');
            $photoPath = str_replace('public/','storage/',$path);
        }else{
            $photoPath = "storage/foodImg/no_image.jpg";
        }
        //locationに入力がない場合shopNameの値を入れる
        if($request->has('location')){
            $location = $request->location;
        }else{
            $location = $request->shopName;
        }
        //フォームの値を保存
        $Food = new Food;
        $Food->shopName = $request->shopName;
        $Food->food = $request->food;
        $Food->location = $location;
        $Food->photo = $photoPath;
        $Food->comment = $request->comment;
        $Food->save();

        return redirect('/')->with('flash_message','登録が完了しました♪');
    }
}
