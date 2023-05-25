@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/home') }}" class="btn btn-primary ml-auto">Home</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>投稿詳細</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>タイトル</th>
                                <td>{{$details->title}}</td>
                            </tr>
                            <tr>
                                <th>悩み</th>
                                <td>{{$details->worries}}</td>
                            </tr>
                            <tr>
                                <th>予算</th>
                                <td>{{$details->budget}}</td>
                            </tr>
                            <tr>
                                <th>移動可能な駅</th>
                                <td>{{$details->station}}</td>
                            </tr>
                            <tr>
                                <th>その他</th>
                                <td>{{$details->other}}</td>
                            </tr>
                        </tbody>
                        @if($like_model->like_exist(Auth::user()->id,$details->id))
                        <div class="favorite-mark">
                            <a class="js-like-toggle loved" href="" data-postid="{{ $details->id }}"><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{$details->likes_count}}</span>
                        </div>
                    @else
                        <div class="favorite-mark">
                            <a class="js-like-toggle" href="" data-postid="{{ $details->id }}"><i class="far fa-heart"></i></a>
                            <span class="likesCount">{{$details->likes_count}}</span>
                        </div>
                    @endif
                    </table>
                </div>
            </div>

            @if ($details->user_id == Auth::id())
                <a class="btn btn-success" href="{{route('posts.edit',$details->id)}}" role="button">編集</a>
                <form action="{{route('posts.destroy', $details->id)}}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                </form>
            @endif
            <a class="btn btn-success" href="{{ route('comment.edit',$details->id)}}" role="button">メッセージ</a>
        </div>
    </div>


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="table-responsive">
            <table class="table table-warning">
                <thead>
                    <tr>
                        <th>ユーザー名</th>
                        <th>コメント</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            @if($comment->user->role == 5)
                                <td>{{$comment->user->name}}</td>
                            @else
                                <td>{{$comment->shop_accounts->name}}</td>
                            @endif
                            <td>{{$comment['text']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   
</div>


@endsection




<!-- いいね機能 -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(function () {
var like = $('.js-like-toggle');
var likePostId;

like.on('click', function () {
    var $this = $(this);
    var heart = $(this).children('.fa-heart');
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
            heart.toggleClass('fas');
            heart.toggleClass('far');

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