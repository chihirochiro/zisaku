@extends('layouts.app')

@section('content')

<form action="{{ route('reserve.update',$reserve->id)}}" method="post">
            @csrf
        <div th:fragment="form">
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">名前</span>
                <input type="text" class="form-control col-sm-10"  name="name" value="{{$reserve->name}}" >
                <span class="col-sm-2"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">日付</span>
                <input type="date" class="form-control col-sm-10"  name="date" value="{{$reserve->date}}" >
                <span class="col-sm-2"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">電話番号</span>
                <input type="text" class="form-control col-sm-10"  name="tel" value="{{$reserve->tel}}" >
                <span class="col-sm-2"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">その他</span>
                <textarea class="form-control col-sm-10" cols="22" rows="5" id="other" name="other"
                th:text="*{other}" >{{$reserve->other}}</textarea>
            </div>

        </div>
        <header th:replace="header::header"></header>
        <div class="container">
                <div th:replace="book/form::form"></div>
                <div class="text-center">
                    <button class="btn btn-sm btn-outline-primary" type="submit">編集</button>
                </div>
            </div>
        </form>

@endsection