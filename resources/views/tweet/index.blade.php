@extends('layouts.default')

@section('page-title')
    ツイート一覧
@endsection

@section('content')
<div class="row">
  <div class="col-md-2">
      <a class="btn btn-primary" href="/tweets/create">ツイート新規投稿</a>
  </div>
  <div class="col-md-10">
      <table class="table">
          <tbody>
              @foreach($tweets as $tweet)
              <tr>
                  <td>{{ $tweet->body }}</td>
                  <td class="text-right"></td>
                  <td> <a href="/tweets/{{ $tweet->id }}">詳細</a>

                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
