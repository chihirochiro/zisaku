@extends('layouts.app')

@section('content')

<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/management') }}" class="btn btn-primary ml-auto">戻る</a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">
                        <h3>全ての一般ユーザー</h3>
                    </div>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ユーザー名</th>
                                <th scope="col">アドレス</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($generals as $general)
                                <tr>
                                    <td>{{$general['name']}}</td>
                                    <td>{{$general['email']}}</td>
                                    @if($general->del_flg==0)
                                    <td><form action="{{route('user.destroy', $general->id)}}" method="post" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="アカウント停止" class="btn btn-danger" onclick='return confirm("本当にアカウント停止しますか？");'>
                                    </form></td>
                                    @else
                                    <td><button class="btn btn-danger">停止中</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


@endsection