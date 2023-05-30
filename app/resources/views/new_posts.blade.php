@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h4>新規投稿画面</h4>
    </div>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/home') }}" class="btn btn-primary ml-auto">Home</a>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<body>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
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
                    <form action="{{ route('posts.store')}}" method="post">
                        @csrf
                        <div th:fragment="form">
                            <div class="form-group form-inline input-group-sm">
                                <span class="col-md-4 text-md-right">タイトル</span>
                                <input type="text" class="form-control col-sm-5" id="title" name="title" th:value="*{title}" >
                            </div>
                            <div class="form-group form-inline input-group-sm">
                                <span class="col-md-4 text-md-right">悩み</span>
                                <input type="text" class="form-control col-sm-5" id="worries" name="worries" th:value="*{worries}" >
                            </div>
                            <div class="form-group form-inline input-group-sm">
                                <span class="col-md-4 text-md-right">予算</span>
                                <input type="text" class="form-control col-sm-5" id="budget" name="budget" th:value="*{budget}" >
                            </div>
                            <div class="form-group form-inline input-group-sm">
                                <span class="col-md-4 text-md-right">移動可能な駅</span>
                                <input type="text" class="form-control col-sm-5" id="station" name="station" th:value="*{station}" >
                            </div>
                            <div class="form-group form-inline input-group-sm">
                                <span class="col-md-4 text-md-right">その他</span>
                                <textarea class="form-control col-sm-5" cols="22" rows="5" id="other" name="other" th:text="*{other}" ></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

    
    
    
    @endsection