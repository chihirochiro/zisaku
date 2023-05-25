@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <h3>予約登録画面</h3>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('reserve.store')}}" method="post">
            @csrf
                <div th:fragment="form">
                    <div class="form-group form-inline input-group-sm">
                        <span class="col-md-2 text-md-right">名前</span>
                        <input type="text" class="form-control col-sm-8"  name="name"  >
                       
                    </div>
                    <div class="form-group form-inline input-group-sm">
                        <span class="col-md-2 text-md-right">日付</span>
                        <input type="date" class="form-control col-sm-8"  name="date"  >
                        
                    </div>
                    <div class="form-group form-inline input-group-sm">
                        <span class="col-md-2 text-md-right">電話番号</span>
                        <input type="text" class="form-control col-sm-8"  name="tel"  >
                       
                    </div>
                    <div class="form-group form-inline input-group-sm">
                        <span class="col-md-2 text-md-right">その他</span>
                        <textarea class="form-control col-sm-8"  name="other" ></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-sm btn-outline-primary" type="submit">登録</button>
                </div>
            
        </form>
            </div>
            </div>
            </div>

@endsection