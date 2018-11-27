@extends('layouts.default')

@section('page-title')
    ツイート一覧
@endsection

@section('content')
<div class="row">
  <div class="col-md-2">
    @if(Auth::check())
    {{ Auth::user()->name }}
      <a class="btn btn-primary" href="/tweets/create">ツイート新規投稿</a>
    @endif
  </div>
  <div class="col-md-10">
    {{-- flash_messageという名前のフラッシュデータがあるならば呼び出す --}}
    @if(Session::has('flash_message'))
      <div class="alert alert-success"> 
          {{ Session::get('flash_message') }} 
      </div>
    @endif
      <table class="table">
          <tbody>
              @foreach($tweets as $tweet)
              <tr>
                <td>
                    <ul class="list-unstyled">
                        <li>
                            <a href="user/{{ $tweet->user->id }}/profile">{{ $tweet->user->name }}</a>: {{ $tweet->body }}
                        </li>
                        @if(count($tweet->hashTags) > 0)
                            <li>
                                <ul class="list-inline">
                                    @foreach($tweet->hashTags as $hash_tag)
                                        <li>
                                            <a href="{{ route('hash_tags.tweets',['id' => $hash_tag->id]) }}">
                                                <span class="label label-info">
                                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ $hash_tag->name }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    </ul>
                </td>
                <td class="text-right"><a href="{{ route('tweets.show', ['id' => $tweet->id]) }}">詳細</a></td>
            </tr>
              @endforeach
          </tbody>
      </table>
  </div>
</div>
@endsection
