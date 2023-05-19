@extends('layouts.app')

@section('content')

<form action="{{ route('user.update',Auth::id()) }}" method="post">
@csrf
@method('put')

<label for='name'>名前</label>
<input type='text' class='form-control' name='name' value="{{$user->name}}"/>
<label for='name'>メールアドレス</label>
<input type='text' class='form-control' name='email' value="{{$user->email}}"/>
<!-- 画像表示 -->

<button  type='submit' class='btn btn-secondary'>編集</button>
</form>

<form action="{{route('user.destroy', Auth::id())}}" method="post" class="float-right">
    @csrf
    @method('delete')
    <input type="submit" value="アカウント削除" class="btn btn-danger" onclick='return confirm("本当にアカウント削除しちゃっていいんですか？");'>
</form>
@endsection