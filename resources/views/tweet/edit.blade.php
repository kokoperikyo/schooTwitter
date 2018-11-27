@extends('layouts.default')

@section('page-title')
    ツイート編集
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
      <form action="{{ route('user_profile.update', ['id' => $user->id]) }}" method="post">
        {{-- HTMLフォームはPUT、PATCH、DELETEアクションをサポートしいない。本来はgetとpostしか受け付けない。そこで隠しパラメーターで以下のようにPUTを渡す --}}
        <input type="hidden" name="_method" value="PUT">
          {!! csrf_field() !!}

          <div class="form-group row">
              <label class="col-xs-2 col-form-label">ツイート本文</label>
              <div class="col-xs-10">
                  <input type="text" name="body" class="form-control" placeholder="ツイート本文を入力してください。" value="{{ $tweet->body }}"/>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-xs-offset-2 col-xs-10">
                  <button type="submit" class="btn btn-primary">投稿する</button>
              </div>
          </div>
      </form>
  </div>
</div>
@endsection
