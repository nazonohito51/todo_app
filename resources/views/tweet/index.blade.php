@extends('layouts.default')

@section('page-header')
    ツイート一覧
@stop

@section('content')
    <div class="col-md-2">
        <a href="{!! route('tweet_create') !!}" class="btn btn-primary">新しいツイートを投稿する</a>
    </div>
    <div class="col-md-10">
        <table class="table">
            <tbody>
            @foreach($tweets as $tweet)
                <tr>
                    <td>{{ $tweet->body }}</td>
                    <td class="text-right">{{ $tweet->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
