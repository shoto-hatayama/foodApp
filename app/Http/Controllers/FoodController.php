<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class FoodController extends Controller
{
    //
    public function index(Request $request){
        if($request->filled('keyWord')){
            $keyWord = mb_convert_kana($request->keyWord,"asHcV");
            $list = Food::where('keyWord','like',"%{$keyWord}%")->orderBy('id','desc')->paginate(6);
        }else{
            $list = Food::orderBy('id','desc')->paginate(6);
        }
        return view('index',['lists' => $list]);
    }

    public function store(Request $request){
        //バリデーション
        $validate = $request->validate([
            'shopName' =>'required',
        ]);
        //アップロードされたファイルの保存処理
        if($request->hasFile('photo')){
            $path = $request->photo->store('public/foodImg');
            $photoPath = str_replace('public/','storage/',$path);
        }else{
            $photoPath = "storage/foodImg/no_image.jpg";
        }
        //locationに入力がない場合shopNameの値を入れる
        if($request->filled('location')){
            $location = $request->location;
        }else{
            $location = $request->shopName;
        }
        $keyWord = mb_convert_kana($request->shopName,"asHcV");
        //フォームの値を保存
        $Food = new Food;
        $Food->shopName = $request->shopName;
        $Food->food = $request->food;
        $Food->location = $location;
        $Food->photo = $photoPath;
        $Food->url = $request->url;
        $Food->comment = $request->comment;
        $Food->keyWord = $keyWord;
        $Food->save();

        return redirect('/')->with('flash_message','登録が完了しました♪');
    }

    public function edit(Request $request){
        $data = Food::find($request->id);
        if($request->isMethod('post')){
            //バリデーション
            $validate = $request->validate([
                'shopName' => 'required',
            ]) ;
            //アップロードされたファイルの保存・削除処理
            if($request->hasFile('photo')){
                $path = $request->photo->store('public/foodImg');
                $photoPath = str_replace('public/','storage/',$path);
                //以前の画像ファイルの削除
                $oldFilePath = str_replace('storage/','public/',$data->toArray()['photo']);
                if(!Str::contains($oldFilePath,'no_image.jpg')){
                    Storage::delete($oldFilePath);
                }
                $data->fill(['photo' => $photoPath])->save();
            }
            //locationに入力がない場合shopNameの値を入れる
            if($request->filled('location')){
                $location = $request->location;
            }else{
                $location = $request->shopName;
            }
            $keyWord = mb_convert_kana($request->shopName,"asHcV");
            $data->fill([
                'shopName' => $request->shopName,
                'food' => $request->food,
                'location' => $location,
                'url' => $request->url,
                'comment' => $request->comment,
                'keyWord' => $keyWord
                ])->save();
                return redirect('/')->with('flash_message','情報を更新しました。');
        }
        // $data = $list->toArray();
        // dd($list->id);
        return view('edit',['data' => $data]);
    }
    public function genreSearch(Request $request){
        return redirect('/');
    }
}
