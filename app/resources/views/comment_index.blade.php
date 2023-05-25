@extends('layouts.app')

@section('content')
@if (session('flash_message'))
    <div class="flash_message">
        {{ session('flash_message') }}
    </div>
@endif







<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">コメント一覧</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>店舗名</th>
                                <th scope="col">コメント</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            @foreach($comment as $cm)
                            <tr>
                                <td>{{$cm->shop_accounts->name}}</td>
                                <td>{{$cm->text}}</td>
                                <td><a href="{{route('shop.bad_count',$cm->user_id)}}" onclick='return confirm("本当に違反報告しますか？");'>違反報告</a></td>
                                <td><a href="{{route('comment.rep',$cm->post_id)}}">返信</a></td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection