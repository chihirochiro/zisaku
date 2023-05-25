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
            <form action="{{ route('shop.update',Auth::id()) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                    <label for='name'>店名</label>
                        <input type='text' class='form-control' name='name' value="{{$shop->name}}"/>
                    <label for='name'>住所</label>
                        <input type='text' class='form-control' name='address' value="{{$shop->address}}"/>
                    <label for='name'>電話番号</label>
                        <input type='text' class='form-control' name='tel' value="{{$shop->tel}}"/>
                    <label for='name'>PR</label>
                        <input type='text' class='form-control' name='pr' value="{{$shop->pr}}"/>
                    <label for='name'>画像</label>
                        <input type='file' class='form-control' name='image' />

                    <button  type='submit' class='btn btn-secondary'>編集完了</button>
                    <form action="{{route('shop.destroy', Auth::id())}}" method="post" class="float-right">
                @csrf
                @method('delete')
                    <input type="submit" value="アカウント削除" class="btn btn-danger" onclick='return confirm("本当にアカウント削除しますか？");'>
                </form>
            </form>
        </div>
    </div>
</div>


@endsection