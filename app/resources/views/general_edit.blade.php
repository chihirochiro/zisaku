@extends('layouts.app')

@section('content')

<div class ='panel-body'>
    @if($errors->any())
    <div class='alert alert-danger'>
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('user.update', Auth::id()) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group form-inline input-group-lg">
                    <span class="col-md-4 text-md-right">名前</span>
                    <input type="text" class="form-control col-lg-5" name="name" value="{{$user->name}}">
                </div>

                <div class="form-group form-inline input-group-lg">
                    <span class="col-md-4 text-md-right">メールアドレス</span>
                    <input type="text" class="form-control col-lg-5" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group form-inline input-group-lg">
                    <span class="col-md-4 text-md-right">アイコン</span>
                    <input type="file" class="form-control col-lg-5" name="image">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-secondary">編集完了</button>
                </div>
            </form>
                <form action="{{ route('user.destroy', Auth::id()) }}" method="post" class="float-right">
                    @csrf
                    @method('delete')
                    <input type="submit" value="アカウント削除" class="btn btn-danger" style="margin-right:250px; margin-top:-61px;" onclick='return confirm("本当にアカウント削除しちゃっていいんですか？");'>
                </form>
        </div>
    </div>
</div>


@endsection