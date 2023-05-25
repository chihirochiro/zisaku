@extends('layouts.app')

@section('content')

<form action="{{ route('comment.store')}}" method="post">
            @csrf
        <div th:fragment="form">
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">内容</span>
                <input type="text" class="form-control col-sm-10" id="title" name="text" th:value="*{title}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('title')}" th:errors="*{title}"></span>
            </div>
            
            <input type="hidden" name="post_id" value="{{$id}}" >
        </div>
        <header th:replace="header::header"></header>
        <div class="container">
                <div th:replace="book/form::form"></div>
                <div class="text-center">
                    <button class="btn btn-sm btn-outline-primary" type="submit">送信</button>
                </div>
            </div>
        </form>

@endsection