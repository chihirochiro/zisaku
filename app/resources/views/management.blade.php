@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <a class="btn btn-outline-success btn-lg btn-block mb-3" href="{{ route('admin.post') }}" role="button">投稿一覧</a>
            <a class="btn btn-outline-success btn-lg btn-block mb-3" href="{{ route('admin.general') }}" role="button">一般ユーザー一覧</a>
            <a class="btn btn-outline-success btn-lg btn-block mb-3" href="{{ route('admin.shop') }}" role="button">店舗一覧</a>
        </div>
    </div>
</div>


@endsection