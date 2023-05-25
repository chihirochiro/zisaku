@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/management') }}" class="btn btn-primary ml-auto">戻る</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <h3>全ての一般ユーザー</h3>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ユーザー名</th>
                                <th scope="col">住所</th>
                                <th scope="col">電話番号</th>
                                <th scope="col">PR</th>
                                <th scope="col">違反報告数</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{$shop['name']}}</td>
                                    <td>{{$shop['address']}}</td>
                                    <td>{{$shop['tel']}}</td>
                                    <td>{{$shop['pr']}}</td>
                                    <td>{{$shop['bad_count']}}</td>
                                    <td><form action="{{route('shop.destroy', $shop['id'])}}" method="post" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="アカウント削除" class="btn btn-danger" onclick='return confirm("本当にアカウント削除しちゃっていいんですか？");'>
                                    </form></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


@endsection

