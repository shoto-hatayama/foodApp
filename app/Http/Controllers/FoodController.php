<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class FoodController extends Controller
{
    public function index(Request $request){
        //検索時あいまい検索処理
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
            $photoName = $request->file('photo')->store('/','dropbox');
        }else{
            $photoName = "no_image.jpg";
        }
        $storagePath = Storage::disk('dropbox')->url($photoName);
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
        $Food->photo_name = $photoName;
        $Food->storage_path = $storagePath;
        $Food->url = $request->url;
        $Food->comment = $request->comment;
        $Food->keyWord = $keyWord;
        $Food->save();

        return redirect('/')->with('success_message','登録が完了しました♪');
    }

    public function edit(Request $request){
        $data = Food::find($request->id);
        if($request->has('deleteSubmit')){
            $data->delete();
            return redirect('/')->with('delete_message','削除しました！');
        }else if($request->has('editSubmit')){
            //バリデーション
            $validate = $request->validate([
                'shopName' => 'required',
            ]) ;
            //アップロードされたファイルの保存・削除処理
            if($request->hasFile('photo')){
                $photoName = $request->file('photo')->store('/','dropbox');
                $storagePath = Storage::disk('dropbox')->url($photoName);
                
                //以前の画像ファイルの削除
                $oldFileName = $data->toArray()['photo_name'];
                if(!Str::contains($oldFileName,'no_image.jpg')){
                    Storage::disk('dropbox')->delete($oldFileName);
                }
                $data->fill([
                    'photo_name' => $photoName,
                    'storage_path' => $storagePath
                    ])->save();
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
            return redirect('/')->with('success_message','情報を更新しました。');
        }

        return view('edit',['data' => $data]);
    }
    public function genreSearch(Request $request){
        return redirect('/');
    }
}
