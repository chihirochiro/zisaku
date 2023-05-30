@extends('layouts.app')

@section('content')

<!-- ログイン後のホーム画面 -->

 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <tr>
                @can('general')
                <th scope="col"><a class="btn btn-outline-success" href="{{ route('mypage.index') }}" role="button">マイページ</a></th>
                @elsecan('shop')
                <th scope="col"><a class="btn btn-outline-success" href="{{ route('shop.index') }}" role="button">店舗マイページ</a></th>      
                @elsecan('admin')          
                <th scope="col"><a class="btn btn-outline-success" href="{{ route('admin.index') }}" role="button">管理者ページ</a></th>    
                @endcan            
            </tr>
        </div>
    </div>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<!-- 検索機能 -->
<div class="container">
    <div class="row justify-content-center">
        <form method="GET" action="{{ route('post.serch') }}">
            <div class="input-group">
                <input type="search" name="search" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-warning">検索</button>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
