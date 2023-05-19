@extends('layouts.app')

@section('content')

<!-- 投稿詳細のモーダル -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">投稿詳細</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
    <table>
        @if(!$details)
         投稿はありません
        @else
      <tr><th>タイトル</th><td>{{$details->title}}</td></tr>
      <tr><th>悩み</th><td>{{$details->worries}}</td></tr>
      <tr><th>予算</th><td>{{$details->budget}}</td></tr>
      <tr><th>移動可能な駅</th><td>{{$details->station}}</td></tr>
      <tr><th>その他</th><td>{{$details->other}}</td></tr>
      @endif
    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">編集</button>
        <button type="button" class="btn btn-primary">削除</button>
      </div>
    </div>
  </div>
</div>

<!-- 新規投稿などのボタン -->
<div class="container">
  <div class="row justify-content-start">
    <div class="col-4">
       <a href="{{ route('posts.create') }}">新規投稿</a>
    </div>
    <div class="col-4">
      <a href="{{ route('user.edit',['user'=>Auth::id()]) }}">アカウント編集</a>
    </div>
    <div class="col-4">
      <a href>メッセージ一覧</a>
    </div>
  </div>


<!-- 自分の投稿した投稿一覧 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(!$posts)
                    投稿はありません
                    @else
                    <div class="card-header">Dashboard</div>

<table class="table">
  <tbody>
      @foreach($posts as $post)
    <tr>
      <th scope="row">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">1
      </button></th>
      <td>{{$post['title']}}</td>
      <td>{{$post['worries']}}</td>
    </tr>
    @endforeach
    
</tbody>
</table>
@endif
            </div>
        </div>
    </div>
</div>

@endsection