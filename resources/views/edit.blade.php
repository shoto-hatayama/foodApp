@extends('layout')

@section('content')

<!-- フラッシュメッセージ表示-->
@if(session('flash_message'))
  <div class="flash_message bg-success  text-light text-center py-3 my-0">
      {{ session('flash_message')}}
  </div>
@endif
<!-- エラーメッセージ表示 -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
<div class="container">
  <form id="modal" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputShopName">店の名前</label>
            <input type="text" class="form-control" id="inputShopName" name="shopName" value="{{ $data->shopName }}">
        </div>
        <div class="form-group">
            <label for="inputFood">食べたもの</label>
            <input type="text" class="form-control" id="inputFood" name="food" value="{{$data->food}}">
        </div>
        <div class="form-group">
            <label for="inputLocation">場所</label>
            <input type="text" class="form-control" id="inputLocation" name="location" value="{{ $data->location}}">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="imgChangeCheck">
          <label class="form-check-label" for="imgChangeCheck" >画像を変更する</label>
        </div>
        <div class="form-group" id="changeImg">
            <label>写真</label>
            <input type="file" class="form-control-file" name="photo" value="{{ $data->photo}}" >
        </div>
        <div class="form-group">
            <label for="inputUrl">URL</label>
            <input type="text" class="form-control" name="url" value="{{ $data->url}}">
        </div>
        <div class="form-group">
            <label for="inputComment">ひとこと</label>
            <textarea type="text" class="form-control" id="inputComment" name="comment" value="{{ $data->comment}}"></textarea>
        </div>
        <!-- //ジャンルは未実装
        <div class="form-group">
            <label for="inputgenre">ジャンル</label>
            <input type="text" class="form-control" id="inputgenre" name="genre">
        </div> -->

          <button class="btn btn-danger col-md-2 offset-md-4">削除</button>
          <button type="submit" class="btn btn-success col-md-2 col-md-offset-1">登録</button>

        
  </form>
</div>
@endsection