@extends('layouts.app')

@section('content')
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">投稿詳細</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        モーダルの内容
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
        <button type="button" class="btn btn-primary">保存</button>
      </div>
    </div>
  </div>
</div>


 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <tr>
                <th scope="col"><a href="{{ route('mypage.index') }}">マイページ</a></th>
            </tr>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">1
      </button></th>
      @foreach($posts as $post)
      <td>{{$post['title']}}</td>
      <td>{{$post['worries']}}</td>
      @endforeach
    </tr>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>





@endsection
