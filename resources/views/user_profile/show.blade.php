@extends('layouts.default')

@section('page-header')
    ユーザプロフィール
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>名前</h3>
            <p>{{ $user_profile->user->name }}</p>
            <h3>紹介文</h3>
            <p>{{ $user_profile->introduction }}</p>
            <h3>誕生日</h3>
            <p>{{ $user_profile->birthday }}</p>
        </div>
    </div>
@stop