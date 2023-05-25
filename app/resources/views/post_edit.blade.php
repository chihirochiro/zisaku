@extends('layouts.app')

@section('content')

<form action="{{ route('posts.update',$post->id)}}" method="post">
            @csrf
            @method('put')
        <div th:fragment="form">
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">タイトル</span>
                <input type="text" class="form-control col-sm-10" id="title" name="title" value="{{$post->title}}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('title')}" th:errors="*{title}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">悩み</span>
                <input type="text" class="form-control col-sm-10" id="worries" name="worries" value="{{$post->worries}}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('worries')}" th:errors="*{worries}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">予算</span>
                <input type="text" class="form-control col-sm-10" id="budget" name="budget" value="{{$post->budget}}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('budget')}" th:errors="*{budget}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">移動可能な駅</span>
                <input type="text" class="form-control col-sm-10" id="station" name="station" value="{{$post->station}}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('station')}" th:errors="*{station}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">その他</span>
                <textarea class="form-control col-sm-10" cols="22" rows="5" id="other" name="other"
                th:text="*{other}" >{{$post->other}}</textarea>
            </div>
            <input type="hidden" name="id" th:value="*{id}" >
            <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('id')}" th:errors="*{id}"></span>
            <input type="hidden" name="version" th:value="*{version}" >
        </div>
        <header th:replace="header::header"></header>
        <div class="container">
                <div th:replace="book/form::form"></div>
                <div class="text-center">
                    <button class="btn btn-sm btn-outline-primary" type="submit">登録</button>
                </div>
            </div>
        </form>

@endsection