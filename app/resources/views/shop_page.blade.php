@extends('layouts.app')

@section('content')
<!-- ホームに戻るボタン -->
<div class="container">
    <a href="{{ url('/home') }}" class="btn btn-primary ml-auto">Home</a>
</div>

<!-- アカウント編集などのボタン -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="text-center">
        <a class="btn btn-outline-success" href="{{ route('shop.edit', 1) }}" role="button">アカウント編集</a>
      </div>

<!-- スペース -->
<div class="container mt-4"></div>
      @if(!$shop)
      @else
        <div class="text-center">
          <img src="{{ $shop->image ? asset('storage/'.$shop->image) : asset('storage/noimage.jpeg') }}" style="width: 300px; height: auto;">
        </div>

<!-- スペース -->
<div class="container mt-4"></div>

        @endif
</div>
            <div class="text-center">
            <table>
                <tbody>
                <tr>
                    <td style="font-size: 24px;">{{$shop['name']}}</td>
                </tr>
                <tr>
                    <td style="font-size: 18px;">{{$shop['address']}}</td>
                </tr>
                <tr>
                    <td style="font-size: 18px;">{{$shop['tel']}}</td>
                </tr>
                <tr>
                    <td style="font-size: 18px;">{{$shop['pr']}}</td>
                </tr>
                </tbody>
            </table>
            </div>
  </div>
</div>

<!-- スペース -->
<div class="container mt-4"></div>

<!-- 予約一覧一覧 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>予約一覧</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>詳細</th>
                                <th>名前</th>
                                <th>日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reserve as $res)
                            <tr>
                                <td>
                                    <a href="{{ route('reserve.show', $res['id']) }}">#</a>
                                </td>
                                <td>{{$res['name']}}</td>
                                <td>{{$res['date']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('reserve.create') }}" class="btn btn-secondary">登録</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection