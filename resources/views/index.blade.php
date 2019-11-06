@extends('layout')

@section('content')
<button class="btn btn-link formModal" data-remodal-target="modal">登録</button>
<div class="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <form id="modal" action="store" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="inputShopName">店の名前</label>
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
          <label for="inputComment">ひとこと</label>
          <input type="text" class="form-control" id="inputComment" name="comment">
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