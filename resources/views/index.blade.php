@extends('layout')

@section('content')

<!-- フラッシュメッセージ表示-->
@if(session('flash_message'))
  <div class="flash_message bg-success  text-light text-center py-3 my-0">
      {{ session('flash_message')}}
  </div>
@endif

<!-- 登録＆検索フォーム -->
<div class="container">
    <form class="form-inline" action="/" method="post">
        <div class="form-group">
          <input type="text" class="form-control" id="keyWordSearch" name="keyWord">
          <button class="btn-info" type="submit">キーワード検索</button>
        </div>
        <button class="btn btn-link formModal" data-remodal-target="modal">投稿</button>    
    </form>
</div>
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
  <div class="row">
  @foreach($lists as $data)
  <div class="col-sm-12 col-lg-4">
    <div class="card shadow-lg hoverBorder">
        <div class="row">
          <img class="col  row-eq-height" id="{{ 'foodImg'.$data->id }}" src="{{ $data->photo }}" alt="">
        </div>
        <div class="card-body">
          <h5 class="row">
            <a id="{{ 'editId'.$data->id }}" href="edit/{{$data->id}}"><div class="col">{{ $data->shopName }}</div></a>
          </h5>
          <div class="row">
            <div class="col">{{ $data->food }}</div>
          </div>
          <div class="row">
            <div class="col">{{ $data->comment }}</div>
          </div>
          <div class="row">
            <a href="{{ $data->url }}">
              @isset($data->url)
              <div class="col">くわしくはこちらへ☆彡</div>
              @endisset
            </a>
          </div>
          <div class="row">
            <iframe class="mapContents col d-none" id="{{ 'shopMap'.$data->id }}" width="600" height="450" frameborder="0" style="border:0;" src="{{'https://www.google.com/maps/embed/v1/place?key=AIzaSyCos3wGLXvwjoB91TVZilc9YFbsr3NNqt0&q='.$data->location.'&zoom=15'}}" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  </div>
    {{ $lists->links() }}
</div>
  
  
</div>
<!-- モーダル -->
<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <form id="modal" action="store" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="inputShopName" class="required">店の名前</label>
          <input type="text" class="form-control" id="inputShopName" name="shopName">
      </div>
      <div class="form-group">
          <label for="inputFood">食べたもの</label>
          <input type="text" class="form-control" id="inputFood" name="food">
      </div>
      <div class="form-group">
          <label for="inputLocation">場所</label>
          <input type="text" class="form-control" id="inputLocation" name="location">
      </div>
      <div class="form-group">
          <label>写真</label>
          <input type="file" class="form-control-file" name="photo">
      </div>
      <div class="form-group">
          <label for="inputUrl">URL</label>
          <input type="text" class="form-control" name="url">
      </div>
      <div class="form-group">
          <label for="inputComment">ひとこと</label>
          <textarea type="text" class="form-control" id="inputComment" name="comment"></textarea>
      </div>
      <!-- //ジャンルは未実装
      <div class="form-group">
          <label for="inputgenre">ジャンル</label>
          <input type="text" class="form-control" id="inputgenre" name="genre">
      </div> -->
      <button data-remodal-action="cancel" class="remodal-cancel">閉じる</button>
      <button data-remodal-action="confirm" class="remodal-confirm">登録</button>
</form>
</div>
@endsection