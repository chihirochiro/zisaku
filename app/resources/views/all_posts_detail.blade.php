@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<a href="{{ url('/mypage') }}">マイページに戻る</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">投稿詳細</div>
                <table class="table table-striped table-hover">
                    <tbody>
                            <!-- <tr><th>名前</th><td>{{$details->name}}</td></tr> -->
                            <tr><th>タイトル</th><td>{{$details->title}}</td></tr>
                            <tr><th>悩み</th><td>{{$details->worries}}</td></tr>
                            <tr><th>予算</th><td>{{$details->budget}}</td></tr>
                            <tr><th>移動可能な駅</th><td>{{$details->station}}</td></tr>
                            <tr><th>その他</th><td>{{$details->other}}</td></tr>     
                    </tbody>
                </table>
            </div>
            @can('shop')
                <a class="btn btn-success" href="{{ route('comment.edit',$details->id)}}" role="button">メッセージ</a>
            @endcan
        </div>
    </div>
</div>




<!-- いいね機能 -->
    @if($like_model->like_exist(Auth::user()->id,$details->id))
    <p class="favorite-marke">
    <a class="js-like-toggle loved" href="" data-postid="{{ $details->id }}"><i class="fas fa-heart"></i></a>
    <span class="likesCount">{{$details->likes_count}}</span>
    </p>
    @else
    <p class="favorite-marke">
    <a class="js-like-toggle" href="" data-postid="{{ $details->id }}"><i class="fas fa-heart"></i></a>
    <span class="likesCount">{{$details->likes_count}}</span>
    </p>
    @endif

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
var like = $('.js-like-toggle');
var likePostId;

like.on('click', function () {
    var $this = $(this);
    likePostId = $this.data('postid');
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'post_id': likePostId //コントローラーに渡すパラメーター
            },
    })

        // Ajaxリクエストが成功した場合
        .done(function (data) {
//lovedクラスを追加
            $this.toggleClass('loved'); 

//.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
            $this.next('.likesCount').html(data.postLikesCount); 

        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
//ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
//とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
    
    return false;
});
});
</script>