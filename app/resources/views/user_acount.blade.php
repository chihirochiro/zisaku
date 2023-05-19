@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form action="{{ route('user')}}" method="post">
            @csrf
        <div th:fragment="form">
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">ユーザー名</span>
                <input type="text" class="form-control col-sm-10" id="title" name="title" th:value="*{title}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('title')}" th:errors="*{title}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">メールアドレス</span>
                <input type="text" class="form-control col-sm-10" id="worries" name="worries" th:value="*{worries}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('worries')}" th:errors="*{worries}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">パスワード</span>
                <input type="text" class="form-control col-sm-10" id="budget" name="budget" th:value="*{budget}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('budget')}" th:errors="*{budget}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">パスワード確認</span>
                <input type="text" class="form-control col-sm-10" id="station" name="station" th:value="*{station}" >
                <span class="col-sm-2"></span>
                <span class="col-sm-10 text-danger small" th:if="${#fields.hasErrors('station')}" th:errors="*{station}"></span>
            </div>
            <div class="form-group form-inline input-group-sm">
                <span class="col-md-2 text-md-right">アイコン</span>
                <textarea class="form-control col-sm-10" cols="22" rows="5" id="other" name="other"
                th:text="*{other}" ></textarea>
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
    </body>

    </html>
    
    
    
    @endsection