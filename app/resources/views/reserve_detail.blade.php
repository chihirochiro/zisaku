@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>詳細情報</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>名前</th>
                            <td>{{$details->name}}</td>
                        </tr>
                        <tr>
                            <th>日時</th>
                            <td>{{$details->date}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{$details->tel}}</td>
                        </tr>
                        <tr>
                            <th>その他</th>
                            <td>{{$details->other}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer text-center">          
    </table>
    <button  type='button' class='btn btn-secondary'><a href="{{route('reserve.edit',$details->id)}}">編集</a></button>
    <form action="{{route('reserve.destroy', $details->id)}}" method="post" class="float-right">
          @csrf
          @method('delete')
          <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("削除しますか？");'>
      </form>

@endsection