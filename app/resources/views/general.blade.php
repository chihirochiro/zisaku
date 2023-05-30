@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/home') }}" class="btn btn-primary ml-auto">Home</a>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<!-- 新規投稿などのボタン -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            @if(Auth::user()->del_flg == 0)
                <a class="btn btn-success" href="{{ route('posts.create') }}" role="button">新規投稿</a>
            @else
                <span>制限がかかっています</span>
            @endif
        </div>
        <div class="col-md-4 text-center">
            <a class="btn btn-success" href="{{ route('user.edit',['user'=>Auth::id()]) }}" role="button">アカウント編集</a>
        </div>
        <div class="col-md-4 text-center">
            <a class="btn btn-success" href="{{ route('comment.index') }}" role="button">メッセージ一覧</a>
        </div>
    </div>

    <!-- スペース -->
    <div class="container mt-4"></div>

        <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="{{ Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('storage/noimage.jpeg')}}" style="width: 300px; height: auto;">
        </div>
    </div>
</div>

    <!-- スペース -->
    <div class="container mt-4"></div>

<!-- 自分の投稿した投稿一覧 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                @if(!$posts)
                    投稿はありません
                @else
                <div class="card-header">投稿履歴</div>
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <th scope="col" style="width: 70px;">詳細</th>

                                <th scope="col">タイトル</th>
                                <th scope="col">悩み</th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <th scope="row">
                                    <a href="{{ route('posts.show' , $post['id']) }}">#</a>
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