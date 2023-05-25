@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/management') }}" class="btn btn-primary ml-auto">戻る</a>
</div>

<!-- 検索機能 -->
<div class="container">
    <div class="row justify-content-center">
        <form method="GET" action="{{ route('post.serch') }}">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<!-- 全てのユーザーの投稿一覧 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>新規投稿一覧</h3></div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">詳細</th>
                            <th scope="col">タイトル</th>
                            <th scope="col">悩み</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td><a href="{{ route('posts.show', $post['id']) }}">#</a></td>
                            <td>{{$post['title']}}</td>
                            <td>{{$post['worries']}}</td>
                            <td><form action="{{route('posts.destroy', $post['id'])}}" method="post" class="float-right">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                            </form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection